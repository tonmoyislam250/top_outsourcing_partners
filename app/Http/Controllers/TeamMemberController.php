<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TeamMemberController extends Controller
{
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
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/team/' . $imageName;
            $image->move(public_path('images/team'), $imageName);
            $data['image'] = $imagePath;
        }

        // Handle modal image upload
        if ($request->hasFile('modal_image')) {
            $modalImage = $request->file('modal_image');
            $modalImageName = time() . '_modal_' . $modalImage->getClientOriginalName();
            $modalImagePath = 'images/team/' . $modalImageName;
            $modalImage->move(public_path('images/team'), $modalImageName);
            $data['modal_image'] = $modalImagePath;
        } else {
            $data['modal_image'] = $data['image'];
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

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Team member created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember)
    {
        return view('admin.team-members.show', compact('teamMember'));
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
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($teamMember->image && File::exists(public_path($teamMember->image))) {
                File::delete(public_path($teamMember->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/team/' . $imageName;
            $image->move(public_path('images/team'), $imageName);
            $data['image'] = $imagePath;
        }

        // Handle modal image upload
        if ($request->hasFile('modal_image')) {
            // Delete old modal image if it exists and is different from main image
            if ($teamMember->modal_image && $teamMember->modal_image !== $teamMember->image && File::exists(public_path($teamMember->modal_image))) {
                File::delete(public_path($teamMember->modal_image));
            }
            
            $modalImage = $request->file('modal_image');
            $modalImageName = time() . '_modal_' . $modalImage->getClientOriginalName();
            $modalImagePath = 'images/team/' . $modalImageName;
            $modalImage->move(public_path('images/team'), $modalImageName);
            $data['modal_image'] = $modalImagePath;
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
        // Delete associated images
        if ($teamMember->image && File::exists(public_path($teamMember->image))) {
            File::delete(public_path($teamMember->image));
        }
        
        if ($teamMember->modal_image && $teamMember->modal_image !== $teamMember->image && File::exists(public_path($teamMember->modal_image))) {
            File::delete(public_path($teamMember->modal_image));
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
            // Delete associated images
            if ($teamMember->image && File::exists(public_path($teamMember->image))) {
                File::delete(public_path($teamMember->image));
            }
            
            if ($teamMember->modal_image && $teamMember->modal_image !== $teamMember->image && File::exists(public_path($teamMember->modal_image))) {
                File::delete(public_path($teamMember->modal_image));
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
