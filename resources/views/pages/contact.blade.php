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

            <button style="text-align: left; display: block; margin-left: 0;" type="submit" class="submit-btn animate__animated animate__pulse animate__infinite animate__slower">Submit</button>
        </form>
    </div>

    <div class="contact-info animate__animated animate__fadeInRight">
        <h3 class="animate__animated animate__fadeInDown" style="text-align: left;"><strong>Contact Via</strong></h3>
        <div class="info-block animate__animated animate__fadeIn animate__delay-2s" style="text-align: left;">
            <strong>EMAIL</strong>
            <p>
                <i class="fas fa-envelope"></i>
                info@Topoutsourcingpartners.com
            </p>
        </div>
        <div class="info-block animate__animated animate__fadeIn animate__delay-2s" style="text-align: left;">
            <strong>PHONE</strong>
            <p>
                <i class="fas fa-phone"></i>
                +1-800-123-4567
            </p>
        </div>
        <div class="info-block animate__animated animate__fadeIn animate__delay-3s" style="text-align: left;">
            <strong>ADDRESS</strong>
            <p>
                <i class="fas fa-map-marker-alt"></i>
                123 Top Solutions Drive, Innovation City, USA
            </p>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('components.footer')
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

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
        });
    });
</script>
@endsection
