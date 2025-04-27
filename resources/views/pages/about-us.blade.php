@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="container my-5 py-4">
    <h1 class="text-center mb-5 team-title">Meet Our Wonderful Team</h1>

    <!-- Principal Section -->
    @php
        // Define Principal's data (similar structure to members for modal)
        $principal = [
            'id' => 1, // Unique ID
            'image' => 'images/about/user1.png',
            'modal_image' => 'images/about/user1_large.png', // Optional larger image
            'name' => 'Dr. Rajib Hasan',
            'title' => 'Advisor | Top Outsourcing Partners',
            'description' => 'As an advisor, he leverages his extensive experience in financial analysis and corporate compliance to guide Top Outsourcing Partners in delivering efficient outsourcing solutions. His insights help organizations streamline their financial operations, ensuring cost-effective compliance and transparency in outsourced services.',
            'education' => [ // Example data - replace with actual
                'Degree in Business Administration',
                'Executive Leadership Program'
            ],
            'expertise' => [ // Example data - replace with actual
                'Strategic Leadership & Growth',
                'Operational Efficiency Optimization',
                'Client Relationship Management',
                'Customized Outsourcing Strategies'
            ],
            'vision' => 'To empower businesses worldwide through innovative and tailored outsourcing solutions, fostering long-term partnerships and driving sustainable growth.' // Example data
        ];
        // Fallback for modal image if large version doesn't exist
        if (!file_exists(public_path($principal['modal_image']))) {
            $principal['modal_image'] = $principal['image'];
        }
    @endphp

    <div class="row justify-content-center mb-5">
        <div class="col-lg-10 col-md-12">
            {{-- Principal Card - Now triggers modal --}}
            <div class="team-card team-card-principal"
                 data-bs-toggle="modal"
                 data-bs-target="#teamMemberModal"
                 data-member-id="{{ $principal['id'] }}"
                 data-member-name="{{ $principal['name'] }}"
                 data-member-title="{{ $principal['title'] }}"
                 data-member-image="{{ asset($principal['modal_image']) }}"
                 data-member-description="{{ $principal['description'] }}"
                 data-member-education="{{ json_encode($principal['education']) }}"
                 data-member-expertise="{{ json_encode($principal['expertise']) }}"
                 data-member-vision="{{ $principal['vision'] }}">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        {{-- Use the standard card image here --}}
                        <img src="{{ asset($principal['image']) }}" alt="{{ $principal['name'] }}" class="principal-img img-fluid">
                    </div>
                    <div class="col-md-8 principal-details">
                        <h3>{{ $principal['name'] }}</h3>
                        <p class="text-muted">{{ $principal['title'] }}</p>
                        {{-- Keep short description or excerpt here if desired --}}
                        <p>{{ Str::limit($principal['description'], 1000) }}</p> {{-- Example: Show limited text --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Members Section -->
    <div class="row justify-content-center equal-height">
        @php
            // Example detailed member data - replace with your actual data source (e.g., database query)
            $members = [];
            for ($i = 2; $i <= 17; $i++) {
                // Placeholder data - replace with actual team data
                $members[] = [
                    'id' => $i, // Unique ID for each member
                    'image' => 'images/about/user'.$i.'.png',
                    'modal_image' => 'images/about/user'.$i.'_large.png', // Potentially larger image for modal
                    'name' => 'Shubhankar Shil ' . ($i-1), // Example Name
                    'title' => 'Advisor | Finance, Compliance & Strategy', // Example Title
                    'description' => 'Dr. Rajib Hasan serves as an Advisor at Top BPO Partners, bringing a wealth of academic expertise and industry experience to the role. He provides strategic guidance on financial reporting, compliance, and performance measurement. With a background in corporate finance, regulatory best practices, and risk management, he ensures that TBP upholds industry-leading outsourcing standards.',
                    'education' => [
                        'PhD - Accounting, USA',
                        'MBA - Accounting, USA',
                        'MBA - Finance, IBA - Dhaka University',
                        'Certified Management Accountant (CMA)'
                    ],
                    'expertise' => [
                        'Corporate Financial Governance & Risk Management',
                        'Outsourced CFO & Financial Advisory Services',
                        'Business Performance & Regulatory Compliance'
                    ],
                    'vision' => 'As a Governing Board Member of the Institute of Management Accountants (IMA), Dr. Hasan ensures that TBP remains ahead of industry trends in offering reliable outsourced financial services to global enterprises.'
                ];
            }
            // Use a different image for the modal if available, otherwise fallback to card image
            foreach ($members as &$member) {
                if (!file_exists(public_path($member['modal_image']))) {
                    $member['modal_image'] = $member['image'];
                }
            }
            unset($member); // Unset reference
        @endphp

        @foreach($members as $member)
        <div class="col-lg-4 col-md-6 mb-4">
            {{-- Member Card - Add data attributes for modal --}}
            <div class="team-card team-card-member p-0"
                 data-bs-toggle="modal"
                 data-bs-target="#teamMemberModal"
                 data-member-id="{{ $member['id'] }}"
                 data-member-name="{{ $member['name'] }}"
                 data-member-title="{{ $member['title'] }}"
                 data-member-image="{{ asset($member['modal_image']) }}"
                 data-member-description="{{ $member['description'] }}"
                 data-member-education="{{ json_encode($member['education']) }}"
                 data-member-expertise="{{ json_encode($member['expertise']) }}"
                 data-member-vision="{{ $member['vision'] }}">
                 <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="member-img img-fluid">
                 <div class="card-content member-details">
                    <h5>{{ $member['name'] }}</h5>
                    <p class="text-muted mb-0">{{ $member['title'] }}</p>
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
        {{-- Title will be set by JS --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-4 text-center text-md-start">
                <img src="" alt="Team Member" id="modalProfileImage" class="modal-profile-img img-fluid mb-3 mb-md-0">
                <div class="modal-details d-none d-md-block"> {{-- Hide on small screens, show on medium+ --}}
                    <h5 class="modal-section-title"><i class="fas fa-graduation-cap"></i> Education & Certifications</h5>
                    <ul id="modalEducationList">
                        {{-- Content added by JS --}}
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
                        {{-- Content added by JS --}}
                    </ul>
                </div>

                 <div class="modal-details">
                    <h5 class="modal-section-title"><i class="fas fa-bullseye"></i> Approach & Vision</h5>
                    <p id="modalVision" style="font-size: 0.9rem; color: #555;text-align: left;"></p>
                 </div>

                 {{-- Show Education section here for smaller screens --}}
                 <div class="modal-details d-block d-md-none mt-3">
                    <h5 class="modal-section-title"><i class="fas fa-graduation-cap"></i> Education & Certifications</h5>
                    <ul id="modalEducationListSmall">
                        {{-- Content added by JS --}}
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
{{-- Ensure Bootstrap JS is loaded (usually in layouts.app) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    var teamMemberModal = document.getElementById('teamMemberModal');
    if (teamMemberModal) {
        teamMemberModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var card = event.relatedTarget;

            // Extract info from data-* attributes
            var name = card.getAttribute('data-member-name');
            var title = card.getAttribute('data-member-title');
            var image = card.getAttribute('data-member-image');
            var description = card.getAttribute('data-member-description');
            var education = JSON.parse(card.getAttribute('data-member-education'));
            var expertise = JSON.parse(card.getAttribute('data-member-expertise'));
            var vision = card.getAttribute('data-member-vision');

            // Update the modal's content.
            var modalProfileImage = teamMemberModal.querySelector('#modalProfileImage');
            var modalName = teamMemberModal.querySelector('#modalName');
            var modalTitle = teamMemberModal.querySelector('#modalTitle');
            var modalDescription = teamMemberModal.querySelector('#modalDescription');
            var modalEducationList = teamMemberModal.querySelector('#modalEducationList');
            var modalEducationListSmall = teamMemberModal.querySelector('#modalEducationListSmall'); // For small screens
            var modalExpertiseList = teamMemberModal.querySelector('#modalExpertiseList');
            var modalVision = teamMemberModal.querySelector('#modalVision');

            modalProfileImage.src = image;
            modalProfileImage.alt = name;
            modalName.textContent = name;
            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalVision.textContent = vision;

            // Populate lists
            function populateList(listElement, items) {
                listElement.innerHTML = ''; // Clear previous items
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
                     li.style.paddingLeft = '0'; // No bullet needed
                     li.style.listStyle = 'none';
                     li.style.color = '#999';
                     li.classList.add('text-muted');
                     listElement.appendChild(li);
                }
            }

            populateList(modalEducationList, education);
            populateList(modalEducationListSmall, education); // Populate the small screen list too
            populateList(modalExpertiseList, expertise);

        });
    }
});
</script>
@endpush
