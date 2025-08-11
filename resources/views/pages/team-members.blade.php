@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container my-5 py-4">
    <h1 class="text-center mb-5 team-title">Meet Our Wonderful Team</h1>

    <!-- Principal Section -->
    @php
        $principal = App\Models\TeamMember::where('is_principal', true)->first();
        if (!file_exists(public_path($principal->modal_image))) {
            $principal->modal_image = $principal->image;
        }
    @endphp

    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-md-12">
            <div class="team-card team-card-principal"
                 data-bs-toggle="modal"
                 data-bs-target="#teamMemberModal"
                 data-member-id="{{ $principal->id }}"
                 data-member-name="{{ $principal->name }}"
                 data-member-title="{{ $principal->title }}"
                 data-member-image="{{ asset($principal->modal_image) }}"
                 data-member-description="{{ $principal->description }}"
                 data-member-education="{{ json_encode($principal->education) }}"
                 data-member-expertise="{{ json_encode($principal->expertise) }}"
                 data-member-vision="{{ $principal->vision }}">
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

    <!-- Team Members Section -->
    <div class="row justify-content-center equal-height">
        @php
            $members = App\Models\TeamMember::where('is_principal', false)->get();
            foreach ($members as $member) {
                if (!file_exists(public_path($member->modal_image))) {
                    $member->modal_image = $member->image;
                }
            }
        @endphp

        @foreach($members as $member)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card team-card-member p-0"
                 data-bs-toggle="modal"
                 data-bs-target="#teamMemberModal"
                 data-member-id="{{ $member->id }}"
                 data-member-name="{{ $member->name }}"
                 data-member-title="{{ $member->title }}"
                 data-member-image="{{ asset($member->modal_image) }}"
                 data-member-description="{{ $member->description }}"
                 data-member-education="{{ json_encode($member->education) }}"
                 data-member-expertise="{{ json_encode($member->expertise) }}"
                 data-member-vision="{{ $member->vision }}">
                 <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="member-img img-fluid">
                 <div class="card-content member-details">
                    <h5>{{ $member->name }}</h5>
                    <p class="text-muted mb-0">{{ $member->title }}</p>
                </div>
            </div>
        </div>
        @endforeach
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
</script>
@endpush
