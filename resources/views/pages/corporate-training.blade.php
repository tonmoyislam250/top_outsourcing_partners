@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header animate__animated animate__fadeInDown">
    <img src="{{ asset('images/corporate/corporate.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">Corporate Training & Development</h1>
  </div>

  <div class="grid">
    <div class="card animate__animated animate__bounceIn animate__delay-1s" onclick="document.getElementById('legal-compliance').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame1.svg') }}" alt="analytics">
      <p><b>Legal & Compliance Training</b></p>
    </div>
    <div class="card animate__animated animate__bounceIn animate__delay-1s" onclick="document.getElementById('itp-training').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame2.svg') }}" alt="chatbot">
      <p><b>Income Tax Practitioner (ITP) Training</b></p>
    </div>
    <div class="card animate__animated animate__bounceIn animate__delay-1s" onclick="document.getElementById('leadership-development').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame3.svg') }}" alt="predictive">
      <p><b>Leadership & Management Development</b></p>
    </div>
    <div class="card animate__animated animate__bounceIn animate__delay-2s" onclick="document.getElementById('cross-cultural').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame4.svg') }}" alt="automation">
      <p><b>Cross-Cultural & Communication Training</b></p>
    </div>
    <div class="card animate__animated animate__bounceIn animate__delay-2s" onclick="document.getElementById('cybersecurity').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame5.svg') }}" alt="workflow">
      <p><b>Cybersecurity Awareness & Data Protection</b></p>
    </div>
    <div class="card animate__animated animate__bounceIn animate__delay-2s" onclick="document.getElementById('sales-mastery').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame5.svg') }}" alt="cyber">
      <p><b>Sales & Negotiation Mastery</b></p>
    </div>
  </div>

  <div id="legal-compliance" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/reduction.svg') }}" alt="Icon">
        <span><b>Reduction in Compliance Violations</b><br><small><b>with Outsourced</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Legal & Compliance Training</b></h2>
      <p style="text-align: left;">Stay compliant with industry regulations, corporate governance policies, and labor
      laws through expert-led training programs</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Schedule a Compliance Training Consultation</button>
    </div>
  </div>

  <div id="itp-training" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/imp.svg') }}" alt="Icon">
        <span><b>Book an ITP Training Session</b><br><small><b>After Training</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/corporate/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Income Tax Practitioner (ITP) Training</b></h2>
      <p style="text-align: left;">Equip finance professionals with taxation expertise, corporate tax filing strategies, and compliance best practices to improve accuracy.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Book an ITP Training Session</button>
    </div>
  </div>

  <div id="leadership-development" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/increase.svg') }}" alt="Icon">
        <span><b>Increase in Employee Retention</b><br><small><b>with Strong Leadership Training</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Leadership & Management Development</b></h2>
      <p style="text-align: left;">Enhance leadership capabilities with decision-making, strategic thinking, and conflict
      resolution training for executives and managers.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Book a Leadership Training Consultation</button>
    </div>
  </div>

  <div id="cross-cultural" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/workspace.svg') }}" alt="Icon">
        <span><b>Improvement in Workplace Collaboration</b><br><small><b>After Training</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/corporate/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Cross-Cultural & Communication Training</b></h2>
      <p style="text-align: left;">Improve team collaboration, business negotiations, and customer interactions with tailored communication training for global business environments.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Schedule a Cross-Cultural Training Call</button>
    </div>
  </div>

  <div id="cybersecurity" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/reduct2.svg') }}" alt="Icon">
        <span><b>Reduction in Cybersecurity Breaches</b><br><small><b>After Training</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Cybersecurity Awareness & Data Protection</b></h2>
      <p style="text-align: left;">Protect your business from cyber threats with training on data security, phishing
      prevention, and risk management strategies.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Book a Cybersecurity Awareness Session</button>
    </div>
  </div>

  <div id="sales-mastery" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/growth.svg') }}" alt="Icon">
        <span><b>Business Profitability Growth</b><br><small><b>After Financial Training</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/corporate/tl3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Financial Management & Budgeting Training</b></h2>
      <p style="text-align: left;">Train your employees in budget planning, financial forecasting, and cash flow
      optimization to ensure financial stability.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Schedule a Financial Training Session</button>
    </div>
  </div>

  <div class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/rates.svg') }}" alt="Icon">
        <span><b>Increase in Conversion Rates</b><br><small><b>After Sales Training</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr4.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2 style="text-align: left;"><b>Sales & Negotiation Mastery</b></h2>
      <p style="text-align: left;">Boost sales performance with strategic negotiation techniques, client relationship
      management, and persuasion training to close more deals.</p>
      <button style="text-align: left; display: block; margin-left: 0;" onclick="window.location.href='{{ url('/consult') }}'">Book a Sales & Negotiation Training Call</button>
    </div>
  </div>
</section>

@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
@endsection
