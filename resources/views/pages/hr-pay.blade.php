@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <img src="{{ asset('images/hr/hr.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">HR & Payroll Services</h1>
  </div>

  <div class="grid">
    <div class="card" data-target="#payroll">
      <img src="{{ asset('images/hr/frame1.svg') }}" alt="analytics">
      <p>Payroll Management Services</p>
    </div>
    <div class="card" data-target="#benefits">
      <img src="{{ asset('images/hr/frame2.svg') }}" alt="chatbot">
      <p>Employee Benefits Administration</p>
    </div>
    <div class="card" data-target="#recruitment">
      <img src="{{ asset('images/hr/frame3.svg') }}" alt="predictive">
      <p>Recruitment & Talent Acquisition</p>
    </div>
    <div class="card" data-target="#compliance">
      <img src="{{ asset('images/hr/frame4.svg') }}" alt="automation">
      <p>HR Outsourcing & Compliance Management</p>
    </div>
    <div class="card" data-target="#automation">
      <img src="{{ asset('images/hr/frame5.svg') }}" alt="workflow">
      <p>Workforce Management & HR Automation</p>
    </div>
  </div>

  <div id="payroll" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/time.svg') }}" alt="Icon">
        <span>Time Saved<br><small>by Automating Payroll Management</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/hr/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Payroll Management Services</h2>
      <p>Ensure accurate, on-time payroll processing, tax calculations, and compliance with
local and international labor laws. We handle salary disbursement, deductions, and
reporting seamlessly.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Talk to a Payroll Specialist</button>
    </div>
  </div>

  <div id="benefits" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/rate.svg') }}" alt="Icon">
        <span>Employee Retention Rate<br><small>with Structured Benefits Plans</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/hr/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Employee Benefits Administration</h2>
      <p>Manage employee benefits, health insurance, leave policies, and retirement plans
      effortlessly, ensuring compliance with global labor laws and company policies.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Benefits Strategy Call</button>
    </div>
  </div>

  <div id="recruitment" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/hire.svg') }}" alt="Icon">
        <span>Hiring Efficiency<br><small>After Outsourcing Recruitment</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/hr/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Recruitment & Talent Acquisition</h2>
      <p>Find and hire the best talent globally with data-driven recruitment strategies, candidate
screening, and interview management to ensure the perfect fit for your business
needs.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Hiring Consultation</button>
    </div>
  </div>

  <div id="compliance" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/reduct.svg') }}" alt="Icon">
        <span>Reduction in HR Legal Risks<br><small>After Outsourcing Compliance</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/hr/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>HR Outsourcing & Compliance Management</h2>
      <p>Ensure HR operations align with legal standards by outsourcing policy creation, labor
      law compliance, contract management, and workplace issue resolution to experts.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule an HR Consultation</button>
    </div>
  </div>

  <div id="automation" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/hr/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/hr/gains.svg') }}" alt="Icon">
        <span>Efficiency Gains<br><small>with HR Process Automation</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/hr/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Workforce Management & HR Automation</h2>
      <p>Boost productivity with AI-driven HR solutions for employee scheduling, attendance
      tracking, and performance management, ensuring efficiency and transparency.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule an HR Automation Consultation</button>
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
