@extends('layouts.app')

@section('content')
<section class="solutions-section">
    <div class="solution-container" style="width: 90%; max-width: 1200px; margin: 0 auto; text-align: center;">
        <div class="solutions-header text-center animate__animated animate__fadeInDown">
            <img src="{{ asset('images/solutions/frame.svg') }}" >
            <h1>Solutions</h1>
        </div>
        <div class="description text-center animate__animated animate__fadeIn animate__delay-1s">
            <p>At Top Outsourcing Partners, we specialize in providing customized solutions to meet the unique requirements of each client. Our flexible approach ensures that businesses receive the exact support they need, whether it’s hiring our in-house team or having us manage a dedicated team tailored to their needs.</p>
        </div>
        <div class="solutions-content features d-flex justify-content-center">
            <div class="feature-box text-center animate__animated animate__fadeInLeft animate__delay-2s mx-3" style="flex: 1; max-width: 30%; min-width: 250px;">
                <img src="{{ asset('images/solutions/image1.png') }}" alt="Customized Teams" class="feature-image" style="width: 100%; max-width: 400px;">
                <h4><strong>Customized Teams</strong></h4>
                <ul style="text-align: left; list-style-type: disc; list-style-position: inside;">
                    <li>Hire our highly trained in-house professionals to handle your specific business functions.</li>
                    <li>Choose from a pool of experts with skills tailored to your industry and project demands.</li>
                </ul>
            </div>
            <div class="feature-box text-center animate__animated animate__fadeInLeft animate__delay-2s mx-3" style="flex: 1; max-width: 30%; min-width: 250px;">
                <img src="{{ asset('images/solutions/image2.png') }}" alt="Remote Teams" class="feature-image" style="width: 80%; max-width: 400px;">
                <h4><strong>Remote Teams</strong></h4>
                <ul style="text-align: left; list-style-type: disc; list-style-position: inside;">
                    <li>Let us build and manage a team exclusively for your projects.</li>
                    <li>We handle recruitment, training, and daily operations while ensuring seamless collaboration with your internal teams.</li>
                </ul>
            </div>
            <div class="feature-box text-center animate__animated animate__fadeInLeft animate__delay-2s mx-3" style="flex: 1; max-width: 30%; min-width: 250px;">
                <img src="{{ asset('images/solutions/image3.png') }}" alt="Training for Excellence" class="feature-image" style="width: 80%; max-width: 400px;">
                <h4><strong>Training for Excellence</strong></h4>
                <ul style="text-align: left; list-style-type: disc; list-style-position: inside;">
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
