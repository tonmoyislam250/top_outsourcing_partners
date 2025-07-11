<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs.blogs', compact('blogs'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog-images', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blog-images', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete associated image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
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
                'imageUrl' => $blog->image ? asset('storage/' . $blog->image) : null,
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
            'imageUrl' => $blog->image ? asset('storage/' . $blog->image) : null,
        ]);
    }

    /**
     * Delete blog via AJAX
     */
    public function ajaxDestroy(Blog $blog)
    {
        try {
            // Delete associated image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
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
}
