@extends('layouts.app')

@section('title', 'Solutions - Top Outsourcing Partners | Customized Business Outsourcing Solutions')
@section('meta_description', 'Discover flexible outsourcing solutions at Top Outsourcing Partners. We provide customized teams, dedicated workforce management, and scalable business solutions tailored to your unique requirements. Choose from in-house teams or dedicated managed teams.')
@section('meta_keywords', 'outsourcing solutions, customized teams, dedicated workforce, flexible outsourcing, scalable solutions, business requirements, in-house teams, managed teams, workforce solutions')

@section('content')
<section class="solutions-section">
    <div class="container">
        <div class="solutions-header animate__animated animate__fadeInDown">
            <img src="{{ asset('images/solutions/frame.svg') }}" alt="Solutions Icon">
            <h1>Solutions</h1>
        </div>
        <div class="solutions-description animate__animated animate__fadeIn animate__delay-1s">
            <p>
                At TopOutsourcingPartners, we specialize in providing customized solutions to meet the unique requirements of each client. Our flexible approach ensures that businesses receive the exact support they need, whether it's hiring our in-house team or having us manage a dedicated team tailored to their needs.
            </p>
        </div>
    </div>
</section>
<section class="solutions-cta">
    <div class="container">
        <div class="solutions-content">
            <div class="feature-box animate__animated animate__fadeInLeft animate__delay-2s">
                <img src="{{ asset('images/solutions/image1.png') }}" alt="Customized Teams" class="feature-image">
                <h4>Customized Teams</h4>
                <ul>
                    <li>Hire our highly trained in-house professionals to handle your specific business functions.</li>
                    <li>Choose from a pool of experts with skills tailored to your industry and project demands.</li>
                </ul>
            </div>
            <div class="feature-box animate__animated animate__fadeInLeft animate__delay-2s">
                <img src="{{ asset('images/solutions/image2.png') }}" alt="Remote Teams" class="feature-image">
                <h4>Remote Teams</h4>
                <ul>
                    <li>Let us build and manage a team exclusively for your projects.</li>
                    <li>We handle recruitment, training, and daily operations while ensuring seamless collaboration with your internal teams.</li>
                </ul>
            </div>
            <div class="feature-box animate__animated animate__fadeInLeft animate__delay-2s">
                <img src="{{ asset('images/solutions/image3.png') }}" alt="Training for Excellence" class="feature-image">
                <h4>Training for Excellence</h4>
                <ul>
                    <li>We train our in-house team to align with your business processes, ensuring they meet your exact requirements.</li>
                    <li>Gain the benefits of a well-trained workforce without the overhead of training costs or time commitments.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer')
@endsection