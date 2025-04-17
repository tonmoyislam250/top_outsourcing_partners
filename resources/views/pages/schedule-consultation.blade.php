@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/schedule-consultation.css') }}">

<div class="container">
    <div class="Schedule_header text-center animate__animated animate__fadeInDown">
        <h1>Schedule Consultation</h1>
    </div>
    <form id="consultationForm" action="{{ route('consultation.send') }}" method="POST" class="form animate__animated animate__fadeIn animate__delay-1s">
        @csrf
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="first_name" style="text-align: left; display: block;">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="e.g., Abdun Nur" required>
            @error('first_name')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="last_name" style="text-align: left; display: block;">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="e.g., Wasit" required>
            @error('last_name')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="company_name" style="text-align: left; display: block;">Company Name</label>
            <input type="text" id="company_name" name="company_name" placeholder="e.g., ABC Corp">
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="business_phone" style="text-align: left; display: block;">Business Phone</label>
            <input type="text" id="business_phone" name="business_phone" placeholder="e.g., +1234567890" required>
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="business_email" style="text-align: left; display: block;">Business Email</label>
            <input type="email" id="business_email" name="business_email" placeholder="e.g., example@domain.com" required>
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="services" style="text-align: left; display: block;">*What services are you looking for?</label>
            <select id="services" name="services" required>
            <option value="" disabled selected>Select</option>
            <option value="accounting_finance_outsourcing">Accounting & Finance Outsourcing</option>
            <option value="ai_integration">AI Integration for Businesses</option>
            <option value="corporate_training">Corporate Training & Development</option>
            <option value="third_party_support">Third-Party Business Support</option>
            <option value="hr_payroll_services">HR & Payroll Services</option>
            </select>
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="start_time" style="text-align: left; display: block;">*How soon are you looking to get started?</label>
            <select id="start_time" name="start_time" required>
            <option value="" disabled selected>Select</option>
            <option value="immediately">Immediately</option>
            <option value="next_month">Next Month</option>
            <option value="next_quarter">Next Quarter</option>
            </select>
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="team_members" style="text-align: left; display: block;">*How many new team members do you need?</label>
            <select id="team_members" name="team_members" required>
            <option value="" disabled selected>Select</option>
            <option value="1-5">1-5</option>
            <option value="6-10">6-10</option>
            <option value="10+">10+</option>
            </select>
        </div>
        <div class="form-group animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="outsourcing_journey" style="text-align: left; display: block;">*What best describes your journey in outsourcing?</label>
            <select id="outsourcing_journey" name="outsourcing_journey" required>
            <option value="" disabled selected>Select</option>
            <option value="new">New to Outsourcing</option>
            <option value="experienced">Experienced</option>
            </select>
        </div>
        <div class="form-group full animate__animated animate__fadeInLeft animate__delay-1s">
            <label for="additional_info" style="text-align: left; display: block;">Anything else you'd like to share before the meeting?</label>
            <textarea id="additional_info" name="additional_info" rows="4" placeholder="You can explain your query and ask here"></textarea>
            @error('additional_info')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="submit-btn full text-center">
            <button type="submit" class="btn btn-primary animate__animated animate__pulse animate__infinite animate__slower" id="submitButton">
                Submit
            </button>
            <div id="loadingSpinner" class="netflix-spinner" style="display: none;">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
    </form>
</div>

<style>
.netflix-spinner {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    margin-top: 10px;
}

.netflix-spinner .circle {
    width: 10px;
    height: 10px;
    background-color: #e50914;
    border-radius: 50%;
    animation: netflix-bounce 1.2s infinite ease-in-out;
}

.netflix-spinner .circle:nth-child(2) {
    animation-delay: -1.1s;
}

.netflix-spinner .circle:nth-child(3) {
    animation-delay: -1.0s;
}

.netflix-spinner .circle:nth-child(4) {
    animation-delay: -0.9s;
}

.netflix-spinner .circle:nth-child(5) {
    animation-delay: -0.8s;
}

.netflix-spinner .circle:nth-child(6) {
    animation-delay: -0.7s;
}

@keyframes netflix-bounce {
    0%, 80%, 100% {
        transform: scale(0);
    }
    40% {
        transform: scale(1);
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('consultationForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        const submitButton = document.getElementById('submitButton');
        const loadingSpinner = document.getElementById('loadingSpinner');

        // Show Netflix-style loading animation
        submitButton.disabled = true;
        submitButton.style.display = 'none';
        loadingSpinner.style.display = 'flex';

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                    confirmButtonColor: '#3085d6',
                });
                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while sending your consultation request.',
            });
        })
        .finally(() => {
            // Hide Netflix-style loading animation
            submitButton.disabled = false;
            submitButton.style.display = 'inline-block';
            loadingSpinner.style.display = 'none';
        });
    });
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
