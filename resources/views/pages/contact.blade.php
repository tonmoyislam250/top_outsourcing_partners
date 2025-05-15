@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="contact-container" style="max-width: 1100px; margin: 20px auto; padding: 0 15px; box-sizing: border-box; border: 2px solid blue;">
    <div class="form-section animate__animated animate__fadeInLeft">
        <h2 class="animate__animated animate__fadeInDown" style="text-align: left;"><strong>Contact us</strong></h2>
        <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group animate__animated animate__fadeIn animate__delay-1s">
                    <label for="name" style="text-align: left;" >Name</label>
                    <input type="text" id="name" name="name" placeholder="eg. Abdun Nur Wasit" style="background-color: #F5F5F5;">
                </div>
                <div class="form-group animate__animated animate__fadeIn animate__delay-1s">
                    <label for="email" style="text-align: left;">Email</label>
                    <input type="email" id="email" name="email" placeholder="eg. abdunnurwasit@gmail.com" style="background-color: #F5F5F5;">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group animate__animated animate__fadeIn animate__delay-1s">
                    <label for="phone" style="text-align: left;">Phone-number</label>
                    <input type="tel" id="phone" name="phone" placeholder="eg. +8801753807123" style="background-color: #F5F5F5;">
                </div>
                <div class="form-group animate__animated animate__fadeIn animate__delay-1s">
                    <label for="fax" style="text-align: left;">Fax</label>
                    <input type="text" id="fax" name="fax" placeholder="eg. +8809554711263" style="background-color: #F5F5F5;">
                </div>
            </div>

            <div class="form-group full-width animate__animated animate__fadeIn animate__delay-1s">
                <label for="message" style="text-align: left;">Shortly explain why you want to connect</label>
                <textarea id="message" name="message" placeholder="eg. you can explain your query and ask in here by this" style="background-color: #F5F5F5;"></textarea>
            </div>

            <div class="checkbox-group animate__animated animate__fadeIn animate__delay-2s">
                <input type="checkbox" style="text-align: left;" id="terms" name="terms">
                <label for="terms">I agree on the terms and conditions</label>
            </div>

            <div class="submit-btn full text-center">
                <button type="submit" class="submit-btn animate__animated animate__pulse animate__infinite animate__slower" id="submitButton">
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

    <div class="contact-info animate__animated animate__fadeInRight">
        <h3 class="animate__animated animate__fadeInDown" style="text-align: left;"><strong>Contact Via</strong></h3>
        <div class="info-block animate__animated animate__fadeIn animate__delay-2s" style="text-align: left;">
            <strong>EMAIL</strong>
            <p>
                <i class="fas fa-envelope"></i>
                contact@topoutsourcingpartners.com
            </p>
        </div>
        <div class="info-block animate__animated animate__fadeIn animate__delay-2s" style="text-align: left;">
            <strong>PHONE</strong>
            <p>
                <i class="fas fa-phone"></i>
                +1 346 777 4586
            </p>
        </div>
        <div class="info-block animate__animated animate__fadeIn animate__delay-3s" style="text-align: left;">
            <strong>ADDRESS</strong>
            <div class="additional-addresses" style="max-height: 275px; overflow-y: auto; margin-top: 10px; padding: 10px; border: 0px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                <p><strong>Bangladesh Offices</strong></p>
                <p><strong>Dhaka (Head Office)</strong>
                Office Suites 906 & 1005, 9th & 10th Floor
                SEL Trident Tower, 57 Purana Paltan Line, VIP Road
                Dhaka 1000, Bangladesh</p>
                <p><strong>Dhaka (Green Road Office)</strong>
                Suite 326, RH Home Center, 74/B/1 Green Road
                Dhaka 1215, Bangladesh</p>
                <p><strong>Chittagong Office</strong>
                Suite C-4, 7th Floor, 13 SS Khaled Road, Kajer Dewri<br>
                Chittagong 4000, Bangladesh</p>
                <p><strong>Khulna Office</strong>
                Suite 2B, Plot 399, Road 4, Sonadanga 2nd Phase<br>
                Khulna 9100, Bangladesh</p>
                <p><strong>North America Office</strong></p>
                <p><strong>Houston Office</strong>
                801 Travis Street, Suite 2101<br>
                Houston, Texas 77002, USA</p>
            </div>
        </div>
    </div>
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
    document.getElementById('contactForm').addEventListener('submit', function (e) {
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
                text: 'An error occurred while sending your message.',
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