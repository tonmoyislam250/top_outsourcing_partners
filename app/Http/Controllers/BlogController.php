<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Jobs\SendNewsletterNotification;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }
    /**
     * Display a listing of blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::latest();
        
        // Handle keyword search
        if ($request->has('keyword') && $request->keyword) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('content', 'like', '%' . $keyword . '%')
                  ->orWhereJsonContains('keywords', $keyword);
            });
        }
        
        // Handle type filter
        if ($request->has('type') && in_array($request->type, ['blog', 'case_study'])) {
            $query->where('type', $request->type);
        }
        
        $blogs = $query->get();
        
        // Get all unique keywords for the filter
        $allKeywords = Blog::whereNotNull('keywords')
            ->pluck('keywords')
            ->flatten()
            ->unique()
            ->filter()
            ->sort()
            ->values();
        
        // Check if user is authenticated for admin view
        if (Auth::check()) {
            return view('blogs.blogs-professional', compact('blogs', 'allKeywords'));
        }
        
        // Guest view with modern design
        return view('blogs.guest-blogs', compact('blogs', 'allKeywords'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        return view('blogs.blogs');
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required|in:blog,case_study',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        $imagePublicId = null;
        
        if ($request->hasFile('image')) {
            $uploadResult = $this->cloudinaryService->uploadBlogImage(
                $request->file('image'),
                $request->title,
                $request->type
            );
            
            if ($uploadResult['success']) {
                $imagePath = $uploadResult['url'];
                $imagePublicId = $uploadResult['public_id'];
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload image: ' . $uploadResult['error']);
            }
        }

        try {
            $blog = Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'type' => $request->type,
                'image' => $imagePath,
                'image_public_id' => $imagePublicId,
                'user_id' => Auth::id(),
                'keywords' => $request->keywords ? explode(',', $request->keywords) : null
            ]);

            // Dispatch newsletter notification job
            SendNewsletterNotification::dispatch($blog);

            return redirect()->route('admin.blogs.index')
                ->with('success', 'Content created successfully and newsletter notifications are being sent!');
        } catch (\Exception $e) {
            // If blog creation fails but image was uploaded, delete the image from Cloudinary
            if ($imagePublicId) {
                $this->cloudinaryService->deleteImage($imagePublicId);
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create content: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        $blogs = Blog::latest()->get();
        return view('blogs.blogs', compact('blog', 'blogs'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required|in:blog,case_study',
            'keywords' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $blog->image;
        $imagePublicId = $blog->image_public_id;
        
        if ($request->hasFile('image')) {
            // Delete old image from Cloudinary if exists
            if ($blog->image_public_id) {
                $this->cloudinaryService->deleteImage($blog->image_public_id);
            }
            
            $uploadResult = $this->cloudinaryService->uploadBlogImage(
                $request->file('image'),
                $request->title,
                $request->type
            );
            
            if ($uploadResult['success']) {
                $imagePath = $uploadResult['url'];
                $imagePublicId = $uploadResult['public_id'];
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload image: ' . $uploadResult['error']);
            }
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'image' => $imagePath,
            'image_public_id' => $imagePublicId,
            'keywords' => $request->keywords ? array_map('trim', explode(',', $request->keywords)) : null
        ]);

        // Check if it's an AJAX request
        if ($request->ajax()) {
            $freshBlog = $blog->fresh();
            return response()->json([
                'success' => true,
                'message' => 'Blog updated successfully',
                'blog' => $freshBlog,
                'imageUrl' => $freshBlog->image
            ]);
        }

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete associated image from Cloudinary if exists
        if ($blog->image_public_id) {
            $this->cloudinaryService->deleteImage($blog->image_public_id);
        }
        
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog deleted successfully');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog, Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'blog' => $blog,
                'imageUrl' => $blog->image,
                'createdAt' => $blog->created_at->format('M d, Y')
            ]);
        }
        return view('blogs.show', compact('blog'));
    }
    
    /**
     * Get blog data for editing in modal
     */
    public function getForEdit(Blog $blog)
    {
        return response()->json([
            'blog' => $blog,
            'imageUrl' => $blog->image,
        ]);
    }

    /**
     * Delete blog via AJAX
     */
    public function ajaxDestroy(Blog $blog)
    {
        try {
            // Delete associated image from Cloudinary if exists
            if ($blog->image_public_id) {
                $this->cloudinaryService->deleteImage($blog->image_public_id);
            }
            
            $blog->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Blog deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete blog: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle image uploads for TinyMCE editor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            if ($request->hasFile('file')) {
                $uploadResult = $this->cloudinaryService->uploadImage(
                    $request->file('file'),
                    'tinymce-images'
                );
                
                if ($uploadResult['success']) {
                    return response()->json([
                        'location' => $uploadResult['url']
                    ]);
                } else {
                    return response()->json([
                        'error' => 'Failed to upload image: ' . $uploadResult['error']
                    ], 500);
                }
            }
            
            return response()->json([
                'error' => 'No file uploaded'
            ], 400);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to upload image: ' . $e->getMessage()
            ], 500);
        }
    }
}