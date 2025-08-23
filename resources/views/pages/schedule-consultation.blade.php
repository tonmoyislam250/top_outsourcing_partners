@extends('layouts.app')

@section('title', 'Schedule Free Consultation - Top Outsourcing Partners | Transform Your Business Today')
@section('meta_description', 'Schedule your free consultation with Top Outsourcing Partners today. Discover how our expert outsourcing solutions can reduce costs, improve efficiency, and accelerate your business growth. Get personalized recommendations from our business experts.')
@section('meta_keywords', 'free consultation, schedule consultation, business consultation, outsourcing consultation, cost reduction, efficiency improvement, business growth, expert recommendations')

@section('content')

<section class="consultation-hero">
    <div class="container">
        <div class="consultation-hero__inner">
            <span class="consultation-hero__icon" aria-hidden="true">
                <img src="{{ asset('images/solar_call-chat-bold.svg') }}" alt="Schedule Icon">
            </span>
            <h1>Schedule Consultation</h1>
        </div>
    </div>
</section>

<section class="consultation-section">
    <div class="container">
        <div class="consultation-card">
            <form id="consultationForm" action="{{ route('consultation.send') }}" method="POST" novalidate>
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="e.g., Abdun Nur" value="{{ old('first_name') }}" required>
                        @error('first_name') <p class="error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="e.g., Wasit" value="{{ old('last_name') }}" required>
                        @error('last_name') <p class="error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="services">*What services are you looking for?</label>
                        <select id="services" name="services" required>
                            <option value="" disabled selected>Select</option>
                            <option value="accounting_finance_outsourcing">Accounting & Finance Outsourcing</option>
                            <option value="ai_integration">AI Integration for Businesses</option>
                            <option value="corporate_training">Corporate Training & Development</option>
                            <option value="third_party_support">Third-Party Business Support</option>
                            <option value="hr_payroll_services">HR & Payroll Services</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_time">*How soon are you looking to get started?</label>
                        <select id="start_time" name="start_time" required>
                            <option value="" disabled selected>Select</option>
                            <option value="immediately">Immediately</option>
                            <option value="next_month">Next Month</option>
                            <option value="next_quarter">Next Quarter</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company Name</label>
                        <input type="text" id="company_name" name="company_name" placeholder="e.g., ABC Corp" value="{{ old('company_name') }}">
                    </div>

                    <div class="form-group">
                        <label for="team_members">*How many new team members do you need?</label>
                        <select id="team_members" name="team_members" required>
                            <option value="" disabled selected>Select</option>
                            <option value="1-5">1-5</option>
                            <option value="6-10">6-10</option>
                            <option value="10+">10+</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="business_phone">Business Phone</label>
                        <input type="tel" id="business_phone" name="business_phone" placeholder="e.g., +1234567890" value="{{ old('business_phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="outsourcing_journey">*What best describes your journey in outsourcing?</label>
                        <select id="outsourcing_journey" name="outsourcing_journey" required>
                            <option value="" disabled selected>Select</option>
                            <option value="new">New to Outsourcing</option>
                            <option value="experienced">Experienced</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="business_email">Business Email</label>
                        <input type="email" id="business_email" name="business_email" placeholder="e.g., example@domain.com" value="{{ old('business_email') }}" required>
                    </div>

                    <div class="form-group form-group--full">
                        <label for="additional_info">Anything else you'd like to share before the meeting?</label>
                        <textarea id="additional_info" name="additional_info" rows="4" placeholder="You can explain your query here">{{ old('additional_info') }}</textarea>
                        @error('additional_info') <p class="error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary" id="submitButton">
                        <span class="btn__spinner" aria-hidden="true"></span>
                        <span class="btn__label">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('footer')
    @include('components.footer')
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('consultationForm');
    const submitButton = document.getElementById('submitButton');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        submitButton.disabled = true;
        submitButton.classList.add('is-loading');

        const formData = new FormData(form);

        try {
            const res = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();

            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Your consultation request has been sent.',
                    confirmButtonColor: '#3085d6'
                });
                form.reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message || 'Something went wrong!'
                });
            }
        } catch (err) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while sending your request.'
            });
        } finally {
            submitButton.disabled = false;
            submitButton.classList.remove('is-loading');
        }
    });
});
</script>
@endpush
