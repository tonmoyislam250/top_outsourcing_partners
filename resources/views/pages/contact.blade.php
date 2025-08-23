@extends('layouts.app')

@section('title', 'Contact Us - Top Outsourcing Partners | Get Your Free Consultation Today')
@section('meta_description', 'Contact Top Outsourcing Partners for your business outsourcing needs. Get a free consultation and discover how our expert solutions in finance, AI integration, corporate training, and third-party support can transform your business operations.')
@section('meta_keywords', 'contact top outsourcing partners, free consultation, business outsourcing consultation, outsourcing inquiry, business solutions contact, get quote outsourcing')

@section('content')
<section class="contact-hero">
    <div class="container">
        <div class="contact-hero__inner">
            <span class="contact-hero__icon" aria-hidden="true">
                <i class="fas fa-phone"></i>
            </span>
            <h1>Contact Us</h1>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-card">

            <div class="contact-card__left">
                <h4>Contact us</h4>

                <form id="contactForm" action="{{ route('contact.send') }}" method="POST" novalidate>
                    @csrf

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="eg. Abdun Nur Wasit"
                                value="{{ old('name') }}"
                            >
                            @error('name') <p class="error">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="eg. abdunnurwasit@gmail.com"
                                value="{{ old('email') }}"
                            >
                            @error('email') <p class="error">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone-number</label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="eg. +8801753807123"
                                value="{{ old('phone') }}"
                            >
                            @error('phone') <p class="error">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input
                                type="text"
                                id="fax"
                                name="fax"
                                placeholder="eg. +8809554711263"
                                value="{{ old('fax') }}"
                            >
                            @error('fax') <p class="error">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group form-group--full">
                            <label for="message">Shortly explain why you want to connect</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="4"
                                placeholder="eg. you can explain your query and ask in here by this"
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-footer">
                        <label class="checkbox">
                            <input
                                type="checkbox"
                                id="terms"
                                name="terms"
                                value="1"
                                {{ old('terms') ? 'checked' : '' }}
                                required
                            >
                            <span>I agree on the terms and conditions</span>
                        </label>
                        @error('terms') <p class="error">{{ $message }}</p> @enderror

                        <button type="submit" class="btn btn-primary" id="submitButton">
                            <span class="btn__spinner" aria-hidden="true"></span>
                            <span class="btn__label">Submit</span>
                        </button>
                    </div>
                </form>
            </div>

            <aside class="contact-card__right contact-info">
                <h4>Contact Via</h4>

                <div class="info-block">
                    <span class="info-label">Email</span>
                    <p class="info-value">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:contact@topoutsourcingpartners.com">contact@topoutsourcingpartners.com</a>
                    </p>
                </div>

                <div class="info-block">
                    <span class="info-label">Phone</span>
                    <p class="info-value">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+13467774586">+1 346 777 4586</a>
                    </p>
                </div>

                <div class="info-block">
                    <span class="info-label">Address</span>

                    <div class="address-list">
                        <h5>Bangladesh Offices</h5>

                        <p>
                            <strong>Dhaka (Head Office)</strong><br>
                            Office Suites 906 & 1005, 9th & 10th Floor<br>
                            SEL Trident Tower, 57 Purana Paltan Line, VIP Road<br>
                            Dhaka 1000, Bangladesh
                        </p>

                        <p>
                            <strong>Dhaka (Green Road Office)</strong><br>
                            Suite 326, RH Home Center, 74/B/1 Green Road<br>
                            Dhaka 1215, Bangladesh
                        </p>

                        <p>
                            <strong>Chittagong Office</strong><br>
                            Suite C-4, 7th Floor, 13 SS Khaled Road, Kajer Dewri<br>
                            Chittagong 4000, Bangladesh
                        </p>

                        <p>
                            <strong>Khulna Office</strong><br>
                            Suite 2B, Plot 399, Road 4, Sonadanga 2nd Phase<br>
                            Khulna 9100, Bangladesh
                        </p>

                        <h5>North America Office</h5>

                        <p>
                            <strong>Houston Office</strong><br>
                            801 Travis Street, Suite 2101<br>
                            Houston, Texas 77002, USA
                        </p>
                    </div>
                </div>
            </aside>

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
        const form = document.getElementById('contactForm');
        const submitButton = document.getElementById('submitButton');
        const label = submitButton.querySelector('.btn__label');

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
                        text: data.message || 'Your message has been sent.',
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
                    text: 'An error occurred while sending your message.'
                });
            } finally {
                submitButton.disabled = false;
                submitButton.classList.remove('is-loading');
            }
        });
    });
</script>
@endpush