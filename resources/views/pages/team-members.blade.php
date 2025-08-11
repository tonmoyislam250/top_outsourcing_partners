@extends('layouts.a    @php
        $principal = $teamMembers->where('is_principal', true)->first();
        if ($principal && !$principal->modal_image) {
            $principal->modal_image = $principal->image;
        }
    @endphp@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

<div class="container my-5 py-4">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="team-title">Meet Our Wonderful Team</h1>
        @auth
            <div>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-cog"></i> Manage Team
                </a>
            </div>
        @endauth
    </div>

    <!-- Principal Section -->
    @php
        $principal = App\Models\TeamMember::where('is_principal', true)->first();
        if ($principal && !file_exists(public_path($principal->modal_image))) {
            $principal->modal_image = $principal->image;
        }
    @endphp

    @if($principal)
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-md-12">
            <div class="team-card team-card-principal position-relative"
                 data-bs-toggle="modal"
                 data-bs-target="#teamMemberModal"
                 data-member-id="{{ $principal->id }}"
                 data-member-name="{{ $principal->name }}"
                 data-member-title="{{ $principal->title }}"
                 data-member-image="{{ $principal->modal_image }}"
                 data-member-description="{{ $principal->description }}"
                 data-member-education="{{ json_encode($principal->education) }}"
                 data-member-expertise="{{ json_encode($principal->expertise) }}"
                 data-member-vision="{{ $principal->vision }}">
                
                @auth
                <div class="admin-actions position-absolute top-0 end-0 m-2" style="z-index: 10;">
                    <button type="button" class="btn btn-sm btn-warning me-1" 
                            onclick="event.stopPropagation(); editTeamMemberInline({{ $principal->id }})"
                            data-bs-toggle="modal" 
                            data-bs-target="#editTeamMemberModal">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" 
                            onclick="event.stopPropagation(); deleteTeamMemberInline({{ $principal->id }}, '{{ $principal->name }}')">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                @endauth
                
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <img src="{{ asset($principal->image) }}" alt="{{ $principal->name }}" class="principal-img img-fluid">
                    </div>
                    <div class="col-md-8 principal-details">
                        <h3>{{ $principal->name }}</h3>
                        <p class="text-muted">{{ $principal->title }}</p>
                        <p>{{ Str::limit($principal->description, 1000) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        @auth
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 col-md-12">
                <div class="team-card team-card-principal d-flex flex-column justify-content-center align-items-center border-2 border-dashed text-center" 
                     style="min-height: 200px; cursor: pointer; border-color: #007bff !important;"
                     data-bs-toggle="modal" 
                     data-bs-target="#createTeamMemberModal">
                    <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
                    <h5 class="text-primary">Add Principal Team Member</h5>
                    <p class="text-muted">No principal found. Click to add one.</p>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 col-md-12">
                <div class="alert alert-info text-center">
                    <h4>No Principal Team Member</h4>
                    <p>Please contact the administrator to add team members.</p>
                </div>
            </div>
        </div>
        @endauth
    @endif

    <!-- Team Members Section -->
    <div class="row justify-content-center equal-height">
        @php
            $members = App\Models\TeamMember::where('is_principal', false)->get();
            foreach ($members as $member) {
                if (!$member->modal_image) {
                    $member->modal_image = $member->image;
                }
            }
        @endphp

        @auth
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card team-card-member p-0 d-flex flex-column justify-content-center align-items-center border-2 border-dashed text-center" 
                 style="min-height: 350px; cursor: pointer; border-color: #007bff !important;"
                 data-bs-toggle="modal" 
                 data-bs-target="#createTeamMemberModal">
                <i class="fas fa-plus fa-3x text-primary mb-3"></i>
                <h5 class="text-primary">Add New Team Member</h5>
            </div>
        </div>
        @endauth

        @forelse($members as $member)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card team-card-member p-0 position-relative"
                 data-bs-toggle="modal"
                 data-bs-target="#teamMemberModal"
                 data-member-id="{{ $member->id }}"
                 data-member-name="{{ $member->name }}"
                 data-member-title="{{ $member->title }}"
                 data-member-image="{{ $member->modal_image }}"
                 data-member-description="{{ $member->description }}"
                 data-member-education="{{ json_encode($member->education) }}"
                 data-member-expertise="{{ json_encode($member->expertise) }}"
                 data-member-vision="{{ $member->vision }}">
                 
                 @auth
                 <div class="admin-actions position-absolute top-0 end-0 m-2" style="z-index: 10;">
                     <button type="button" class="btn btn-sm btn-warning me-1" 
                             onclick="event.stopPropagation(); editTeamMemberInline({{ $member->id }})"
                             data-bs-toggle="modal" 
                             data-bs-target="#editTeamMemberModal">
                         <i class="fas fa-edit"></i>
                     </button>
                     <button type="button" class="btn btn-sm btn-danger" 
                             onclick="event.stopPropagation(); deleteTeamMemberInline({{ $member->id }}, '{{ $member->name }}')">
                         <i class="fas fa-trash"></i>
                     </button>
                 </div>
                 @endauth
                 
                 <img src="{{ $member->image }}" alt="{{ $member->name }}" class="member-img img-fluid">
                 <div class="card-content member-details">
                    <h5>{{ $member->name }}</h5>
                    <p class="text-muted mb-0">{{ $member->title }}</p>
                </div>
            </div>
        </div>
        @empty
            @guest
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <h4>No Team Members Available</h4>
                    <p>Team members will be displayed here once they are added.</p>
                </div>
            </div>
            @endguest
        @endforelse
    </div>
</div>

<!-- Team Member Modal -->
<div class="modal fade" id="teamMemberModal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4 text-center text-md-start">
                <img src="" alt="Team Member" id="modalProfileImage" class="modal-profile-img img-fluid mb-3 mb-md-0">
                <div class="modal-details d-none d-md-block">
                    <h5 class="modal-section-title"><i class="fas fa-graduation-cap"></i> Education & Certifications</h5>
                    <ul id="modalEducationList">
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <h4 id="modalName" class="modal-title-name"></h4>
                <p id="modalTitle" class="modal-title-role"></p>
                <p id="modalDescription" class="modal-description"></p>

                <div class="modal-details">
                    <h5 class="modal-section-title"><i class="fas fa-cogs"></i> Area of expertise</h5>
                    <ul id="modalExpertiseList">
                    </ul>
                </div>

                 <div class="modal-details">
                    <h5 class="modal-section-title"><i class="fas fa-bullseye"></i> Approach & Vision</h5>
                    <p id="modalVision" style="font-size: 0.9rem; color: #555;text-align: left;"></p>
                 </div>

                 <div class="modal-details d-block d-md-none mt-3">
                    <h5 class="modal-section-title"><i class="fas fa-graduation-cap"></i> Education & Certifications</h5>
                    <ul id="modalEducationListSmall">
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@auth
<!-- Create Team Member Modal -->
<div class="modal fade" id="createTeamMemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Image *</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="modal_image" class="form-label">Modal Image (Optional)</label>
                                <input type="file" class="form-control" id="modal_image" name="modal_image" accept="image/*">
                                <small class="form-text text-muted">Leave empty to use profile image</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="vision" class="form-label">Vision & Approach</label>
                        <textarea class="form-control" id="vision" name="vision" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Education & Certifications</label>
                        <div id="education-container">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="education[]" placeholder="Enter education/certification">
                                <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addEducationField()">
                            <i class="fas fa-plus"></i> Add Education
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Areas of Expertise</label>
                        <div id="expertise-container">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="expertise[]" placeholder="Enter area of expertise">
                                <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addExpertiseField()">
                            <i class="fas fa-plus"></i> Add Expertise
                        </button>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_principal" name="is_principal" value="1">
                        <label class="form-check-label" for="is_principal">
                            Mark as Principal
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Team Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Team Member Modal -->
<div class="modal fade" id="editTeamMemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editTeamMemberForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Name *</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_title" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="edit_title" name="title" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description *</label>
                        <textarea class="form-control" id="edit_description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                                <div id="current_image_preview" class="mt-2"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_modal_image" class="form-label">Modal Image</label>
                                <input type="file" class="form-control" id="edit_modal_image" name="modal_image" accept="image/*">
                                <div id="current_modal_image_preview" class="mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_vision" class="form-label">Vision & Approach</label>
                        <textarea class="form-control" id="edit_vision" name="vision" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Education & Certifications</label>
                        <div id="edit-education-container">
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addEditEducationField()">
                            <i class="fas fa-plus"></i> Add Education
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Areas of Expertise</label>
                        <div id="edit-expertise-container">
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addEditExpertiseField()">
                            <i class="fas fa-plus"></i> Add Expertise
                        </button>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="edit_is_principal" name="is_principal" value="1">
                        <label class="form-check-label" for="edit_is_principal">
                            Mark as Principal
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Team Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endauth

@endsection

@section('footer')
    @include('components.footer')
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var teamMemberModal = document.getElementById('teamMemberModal');
    if (teamMemberModal) {
        teamMemberModal.addEventListener('show.bs.modal', function (event) {
            var card = event.relatedTarget;

            var name = card.getAttribute('data-member-name');
            var title = card.getAttribute('data-member-title');
            var image = card.getAttribute('data-member-image');
            var description = card.getAttribute('data-member-description');
            var education = JSON.parse(card.getAttribute('data-member-education'));
            var expertise = JSON.parse(card.getAttribute('data-member-expertise'));
            var vision = card.getAttribute('data-member-vision');

            var modalProfileImage = teamMemberModal.querySelector('#modalProfileImage');
            var modalName = teamMemberModal.querySelector('#modalName');
            var modalTitle = teamMemberModal.querySelector('#modalTitle');
            var modalDescription = teamMemberModal.querySelector('#modalDescription');
            var modalEducationList = teamMemberModal.querySelector('#modalEducationList');
            var modalEducationListSmall = teamMemberModal.querySelector('#modalEducationListSmall');
            var modalExpertiseList = teamMemberModal.querySelector('#modalExpertiseList');
            var modalVision = teamMemberModal.querySelector('#modalVision');

            modalProfileImage.src = image;
            modalProfileImage.alt = name;
            modalName.textContent = name;
            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalVision.textContent = vision;

            function populateList(listElement, items) {
                listElement.innerHTML = '';
                if (items && items.length > 0) {
                    items.forEach(function(item) {
                        var li = document.createElement('li');
                        li.textContent = item;
                        listElement.appendChild(li);
                    });
                } else {
                     var li = document.createElement('li');
                     li.textContent = 'Details not available.';
                     li.style.fontStyle = 'italic';
                     li.style.paddingLeft = '0';
                     li.style.listStyle = 'none';
                     li.style.color = '#999';
                     li.classList.add('text-muted');
                     listElement.appendChild(li);
                }
            }

            populateList(modalEducationList, education);
            populateList(modalEducationListSmall, education);
            populateList(modalExpertiseList, expertise);

        });
    }
});

// Admin functions
function addEducationField() {
    const container = document.getElementById('education-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="education[]" placeholder="Enter education/certification">
        <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function addExpertiseField() {
    const container = document.getElementById('expertise-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="expertise[]" placeholder="Enter area of expertise">
        <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function addEditEducationField() {
    const container = document.getElementById('edit-education-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="education[]" placeholder="Enter education/certification">
        <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function addEditExpertiseField() {
    const container = document.getElementById('edit-expertise-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" class="form-control" name="expertise[]" placeholder="Enter area of expertise">
        <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeField(button) {
    button.parentElement.remove();
}

function editTeamMemberInline(id) {
    fetch(`/admin/team-members/${id}/edit-data`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_title').value = data.title;
            document.getElementById('edit_description').value = data.description;
            document.getElementById('edit_vision').value = data.vision || '';
            document.getElementById('edit_is_principal').checked = data.is_principal;
            
            // Set form action
            document.getElementById('editTeamMemberForm').action = `/admin/team-members/${id}`;
            
            // Show current images
            if (data.image) {
                document.getElementById('current_image_preview').innerHTML = 
                    `<small class="text-muted">Current: </small><img src="/${data.image}" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">`;
            }
            if (data.modal_image) {
                document.getElementById('current_modal_image_preview').innerHTML = 
                    `<small class="text-muted">Current: </small><img src="${data.modal_image}" style="max-width: 100px; max-height: 100px;" class="img-thumbnail">`;
            }
            
            // Populate education fields
            const educationContainer = document.getElementById('edit-education-container');
            educationContainer.innerHTML = '';
            if (data.education && data.education.length > 0) {
                data.education.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'input-group mb-2';
                    div.innerHTML = `
                        <input type="text" class="form-control" name="education[]" value="${item}" placeholder="Enter education/certification">
                        <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
                            <i class="fas fa-minus"></i>
                        </button>
                    `;
                    educationContainer.appendChild(div);
                });
            } else {
                addEditEducationField();
            }
            
            // Populate expertise fields
            const expertiseContainer = document.getElementById('edit-expertise-container');
            expertiseContainer.innerHTML = '';
            if (data.expertise && data.expertise.length > 0) {
                data.expertise.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'input-group mb-2';
                    div.innerHTML = `
                        <input type="text" class="form-control" name="expertise[]" value="${item}" placeholder="Enter area of expertise">
                        <button class="btn btn-outline-danger" type="button" onclick="removeField(this)">
                            <i class="fas fa-minus"></i>
                        </button>
                    `;
                    expertiseContainer.appendChild(div);
                });
            } else {
                addEditExpertiseField();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading team member data');
        });
}

function deleteTeamMemberInline(id, name) {
    if (confirm(`Are you sure you want to delete ${name}? This action cannot be undone.`)) {
        fetch(`/admin/team-members/${id}/ajax-delete`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting team member: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting team member');
        });
    }
}
</script>
@endpush
