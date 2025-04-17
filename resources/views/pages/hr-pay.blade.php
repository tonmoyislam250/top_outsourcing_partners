@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header animate__animated animate__fadeInDown">
    <img src="{{ asset('images/hr/hr.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">HR & Payroll Services</h1>
  </div>

  <div class="grid">
    <div class="card animate__animated animate__fadeInUp animate__delay-1s" data-target="#payroll">
      <img src="{{ asset('images/hr/frame1.svg') }}" alt="analytics">
      <p><b>Payroll Management Services</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-1s" data-target="#benefits">
      <img src="{{ asset('images/hr/frame2.svg') }}" alt="chatbot">
      <p><b>Employee Benefits Administration</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-1s" data-target="#recruitment">
      <img src="{{ asset('images/hr/frame3.svg') }}" alt="predictive">
      <p><b>Recruitment & Talent Acquisition</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-2s" data-target="#compliance" style="left: 182px;">
      <img src="{{ asset('images/hr/frame4.svg') }}" alt="automation">
      <p><b>HR Outsourcing & Compliance Management</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-2s" data-target="#automation" style="left: 182px;">
      <img src="{{ asset('images/hr/frame5.svg') }}" alt="workflow">
      <p><b>Workforce Management & HR Automation</b></p>
    </div>
  </div>

  <div id="payroll" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/time.svg') }}" alt="Icon">
        <span><b>Time Saved</b><br><small><b>by Automating Payroll Management</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/hr/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Payroll Management Services</b></h2>
      <p style="text-align: left;">Ensure accurate, on-time payroll processing, tax calculations, and compliance with
local and international labor laws. We handle salary disbursement, deductions, and
reporting seamlessly.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Talk to a Payroll Specialist</button>
    </div>
  </div>

  <div id="benefits" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/rate.svg') }}" alt="Icon">
        <span><b>Employee Retention Rate</b><br><small><b>with Structured Benefits Plans</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/hr/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Employee Benefits Administration</b></h2>
      <p style="text-align: left;">Manage employee benefits, health insurance, leave policies, and retirement plans
      effortlessly, ensuring compliance with global labor laws and company policies.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Book a Benefits Strategy Call</button>
    </div>
  </div>

  <div id="recruitment" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/hire.svg') }}" alt="Icon">
        <span><b>Hiring Efficiency</b><br><small><b>After Outsourcing Recruitment</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/hr/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Recruitment & Talent Acquisition</b></h2>
      <p style="text-align: left;">Find and hire the best talent globally with data-driven recruitment strategies, candidate screening, and interview management to ensure the perfect fit for your business needs.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Schedule a Hiring Consultation</button>
    </div>
  </div>

  <div id="compliance" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/reduct.svg') }}" alt="Icon">
        <span><b>Reduction in HR Legal Risks</b><br><small><b>After Outsourcing Compliance</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/hr/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>HR Outsourcing & Compliance Management</b></h2>
      <p style="text-align: left;">Ensure HR operations align with legal standards by outsourcing policy creation, labor
      law compliance, contract management, and workplace issue resolution to experts.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Schedule an HR Consultation</button>
    </div>
  </div>

  <div id="automation" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/gains.svg') }}" alt="Icon">
        <span><b>Efficiency Gains</b><br><small><b>with HR Process Automation</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/hr/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Workforce Management & HR Automation</b></h2>
      <p style="text-align: left;">Boost productivity with AI-driven HR solutions for employee scheduling, attendance
      tracking, and performance management, ensuring efficiency and transparency.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Schedule an HR Automation Consultation</button>
    </div>
  </div>
</section>

@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
<script>
  document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', () => {
      const target = document.querySelector(card.getAttribute('data-target'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
</script>
@endsection
