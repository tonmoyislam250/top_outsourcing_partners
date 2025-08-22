<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TeamMemberController extends Controller
{
    protected $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers = TeamMember::all();
        return view('admin.team-members.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'modal_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'education' => 'nullable|array',
            'education.*' => 'string',
            'expertise' => 'nullable|array',
            'expertise.*' => 'string',
            'vision' => 'nullable|string',
            'is_principal' => 'boolean'
        ]);

        $data = $request->all();
        
        // Handle main image upload
        if ($request->hasFile('image')) {
            $uploadResult = $this->cloudinaryService->uploadTeamMemberImage(
                $request->file('image'),
                $request->name,
                'main'
            );
            
            if ($uploadResult['success']) {
                $data['image'] = $uploadResult['url'];
                $data['image_public_id'] = $uploadResult['public_id'];
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload main image: ' . $uploadResult['error']);
            }
        }

        // Handle modal image upload
        if ($request->hasFile('modal_image')) {
            $uploadResult = $this->cloudinaryService->uploadTeamMemberImage(
                $request->file('modal_image'),
                $request->name,
                'modal'
            );
            
            if ($uploadResult['success']) {
                $data['modal_image'] = $uploadResult['url'];
                $data['modal_image_public_id'] = $uploadResult['public_id'];
            } else {
                // If modal image upload fails but main image succeeded, delete the main image
                if (isset($data['image_public_id'])) {
                    $this->cloudinaryService->deleteImage($data['image_public_id']);
                }
                
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload modal image: ' . $uploadResult['error']);
            }
        } else {
            // Use main image as modal image if no separate modal image provided
            $data['modal_image'] = $data['image'];
            $data['modal_image_public_id'] = $data['image_public_id'];
        }

        // Filter out empty education and expertise entries
        if (isset($data['education'])) {
            $data['education'] = array_filter($data['education'], function($item) {
                return !empty(trim($item));
            });
        }
        
        if (isset($data['expertise'])) {
            $data['expertise'] = array_filter($data['expertise'], function($item) {
                return !empty(trim($item));
            });
        }

        try {
            TeamMember::create($data);
            return redirect()->route('admin.team-members.index')->with('success', 'Team member created successfully!');
        } catch (\Exception $e) {
            // If team member creation fails, delete uploaded images from Cloudinary
            if (isset($data['image_public_id'])) {
                $this->cloudinaryService->deleteImage($data['image_public_id']);
            }
            if (isset($data['modal_image_public_id']) && $data['modal_image_public_id'] !== $data['image_public_id']) {
                $this->cloudinaryService->deleteImage($data['modal_image_public_id']);
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create team member: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember = null)
    {
        if ($teamMember) {
            return view('admin.team-members.show', compact('teamMember'));
        } else {
            // Public page showing all team members
            $teamMembers = TeamMember::all();
            return view('pages.team-members', compact('teamMembers'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'modal_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'education' => 'nullable|array',
            'education.*' => 'string',
            'expertise' => 'nullable|array',
            'expertise.*' => 'string',
            'vision' => 'nullable|string',
            'is_principal' => 'boolean'
        ]);

        $data = $request->all();
        
        // Handle main image upload
        if ($request->hasFile('image')) {
            // Delete old main image from Cloudinary if exists
            if ($teamMember->image_public_id) {
                $this->cloudinaryService->deleteImage($teamMember->image_public_id);
            }
            
            $uploadResult = $this->cloudinaryService->uploadTeamMemberImage(
                $request->file('image'),
                $request->name,
                'main'
            );
            
            if ($uploadResult['success']) {
                $data['image'] = $uploadResult['url'];
                $data['image_public_id'] = $uploadResult['public_id'];
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload main image: ' . $uploadResult['error']);
            }
        }

        // Handle modal image upload
        if ($request->hasFile('modal_image')) {
            // Delete old modal image from Cloudinary if exists and different from main image
            if ($teamMember->modal_image_public_id && $teamMember->modal_image_public_id !== $teamMember->image_public_id) {
                $this->cloudinaryService->deleteImage($teamMember->modal_image_public_id);
            }
            
            $uploadResult = $this->cloudinaryService->uploadTeamMemberImage(
                $request->file('modal_image'),
                $request->name,
                'modal'
            );
            
            if ($uploadResult['success']) {
                $data['modal_image'] = $uploadResult['url'];
                $data['modal_image_public_id'] = $uploadResult['public_id'];
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to upload modal image: ' . $uploadResult['error']);
            }
        }

        // Filter out empty education and expertise entries
        if (isset($data['education'])) {
            $data['education'] = array_filter($data['education'], function($item) {
                return !empty(trim($item));
            });
        }
        
        if (isset($data['expertise'])) {
            $data['expertise'] = array_filter($data['expertise'], function($item) {
                return !empty(trim($item));
            });
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Team member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        // Delete associated images from Cloudinary
        if ($teamMember->image_public_id) {
            $this->cloudinaryService->deleteImage($teamMember->image_public_id);
        }
        
        if ($teamMember->modal_image_public_id && $teamMember->modal_image_public_id !== $teamMember->image_public_id) {
            $this->cloudinaryService->deleteImage($teamMember->modal_image_public_id);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('success', 'Team member deleted successfully!');
    }

    /**
     * AJAX delete method
     */
    public function ajaxDestroy(TeamMember $teamMember)
    {
        try {
            // Delete associated images from Cloudinary
            if ($teamMember->image_public_id) {
                $this->cloudinaryService->deleteImage($teamMember->image_public_id);
            }
            
            if ($teamMember->modal_image_public_id && $teamMember->modal_image_public_id !== $teamMember->image_public_id) {
                $this->cloudinaryService->deleteImage($teamMember->modal_image_public_id);
            }

            $teamMember->delete();

            return response()->json(['success' => true, 'message' => 'Team member deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting team member.'], 500);
        }
    }

    /**
     * Get team member data for editing via AJAX
     */
    public function getForEdit(TeamMember $teamMember)
    {
        return response()->json([
            'id' => $teamMember->id,
            'name' => $teamMember->name,
            'title' => $teamMember->title,
            'description' => $teamMember->description,
            'education' => $teamMember->education,
            'expertise' => $teamMember->expertise,
            'vision' => $teamMember->vision,
            'is_principal' => $teamMember->is_principal,
            'image' => $teamMember->image,
            'modal_image' => $teamMember->modal_image
        ]);
    }
}
