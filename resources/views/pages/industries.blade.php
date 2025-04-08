@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header animate__animated animate__fadeInDown">
    <img src="{{ asset('images/industries/industry.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">Industries We serve</h1>
  </div>
  <p class="">Our experience spans various sectors, and we're proud to offer our expert services to all industries. If your industry isn't listed, don't worry! We are open to collaborating and are confident we can create the perfect solution for your unique needs. Reach out to discuss how we can work together and help you achieve success.</p>


  <div class="grid">
    <div class="card animate__animated animate__zoomIn animate__delay-1s">
      <img src="{{ asset('images/industries/frame1.svg') }}" alt="analytics">
      <b>Healthcare</b>
      <p>Claims management, pharmacy benefits, and revenue cycle optimization.</p>
    </div>
    <div class="card animate__animated animate__zoomIn animate__delay-1s">
      <img src="{{ asset('images/industries/frame2.svg') }}" alt="chatbot">
      <b>Insurance</b>
      <p>Solutions for general, life, and commercial insurance providers.</p>
    </div>
    <div class="card animate__animated animate__zoomIn animate__delay-1s">
      <img src="{{ asset('images/industries/frame3.svg') }}" alt="predictive">
      <b>Retail & E-Commerce </b>
      <p>Enhance customer engagement and streamline supply chains.</p>
    </div>
    <div class="card animate__animated animate__zoomIn animate__delay-2s">
      <img src="{{ asset('images/industries/frame4.svg') }}" alt="automation">
      <b>Real Estate</b>
      <p>Property management, sales, and back-office support.</p>
    </div>
    <div class="card animate__animated animate__zoomIn animate__delay-2s">
      <img src="{{ asset('images/industries/frame5.svg') }}" alt="workflow">
      <b>Banking & Fintech</b>
      <p>Secure, scalable solutions for retail banking, credit cards, and financial services.</p>
    </div>
    <div class="card animate__animated animate__zoomIn animate__delay-2s">
      <img src="{{ asset('images/industries/frame6.svg') }}" alt="cyber">
      <b>Logistics & Manufacturing</b>
      <p>Process automation and supply chain management.</p>
    </div>
    <div class="card animate__animated animate__zoomIn animate__delay-2s">
      <img src="{{ asset('images/industries/frame7.svg') }}" alt="cyber">
      <b>Technology & Media</b>
      <p>Digital content management and IT support. </p>
    </div>
  </div>

</section>
@include('components.success-stories')
@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
@endsection
