@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <img src="{{ asset('images/corporate/coporate.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">Corporate Training needed</h1>
  </div>

  <div class="grid">
    <div class="card" onclick="document.getElementById('legal-compliance').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame1.svg') }}" alt="analytics">
      <p>Legal & Compliance Training</p>
    </div>
    <div class="card" onclick="document.getElementById('itp-training').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame2.svg') }}" alt="chatbot">
      <p>Income Tax Practitioner (ITP) Training</p>
    </div>
    <div class="card" onclick="document.getElementById('leadership-development').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame3.svg') }}" alt="predictive">
      <p>Leadership & Management Development</p>
    </div>
    <div class="card" onclick="document.getElementById('cross-cultural').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame4.svg') }}" alt="automation">
      <p>Cross-Cultural & Communication Training</p>
    </div>
    <div class="card" onclick="document.getElementById('cybersecurity').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame5.svg') }}" alt="workflow">
      <p>Cybersecurity Awareness & Data Protection</p>
    </div>
    <div class="card" onclick="document.getElementById('sales-mastery').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/corporate/frame5.svg') }}" alt="cyber">
      <p>Sales & Negotiation Mastery</p>
    </div>
  </div>

  <div id="legal-compliance" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/reduction.svg') }}" alt="Icon">
        <span>Reduction in Compliance Violations<br><small>with Outsourced </small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Legal & Compliance Training</h2>
      <p>Stay compliant with industry regulations, corporate governance policies, and labor
      laws through expert-led training programs</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Compliance Training Consultation</button>
    </div>
  </div>

  <div id="itp-training" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/imp.svg') }}" alt="Icon">
        <span>Book an ITP Training Session<br><small>After Training</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/corporate/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Income Tax Practitioner (ITP) Training</h2>
      <p>Equip finance professionals with taxation expertise, corporate tax filing strategies, and compliance best practices to improve accuracy.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book an ITP Training Session</button>
    </div>
  </div>

  <div id="leadership-development" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/increase.svg') }}" alt="Icon">
        <span>Increase in Employee Retention<br><small>with Strong Leadership Training</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Leadership & Management Development</h2>
      <p>Enhance leadership capabilities with decision-making, strategic thinking, and conflict
      resolution training for executives and managers.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Leadership Training Consultation</button>
    </div>
  </div>

  <div id="cross-cultural" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/workspace.svg') }}" alt="Icon">
        <span>Improvement in Workplace Collaboration<br><small>After Training</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/corporate/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Cross-Cultural & Communication Training</h2>
      <p>Improve team collaboration, business negotiations, and customer interactions with tailored communication training for global business environments. </p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Cross-Cultural Training Call</button>
    </div>
  </div>

  <div id="cybersecurity" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/reduct2.svg') }}" alt="Icon">
        <span>Reduction in Cybersecurity Breaches<br><small>After Training</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Cybersecurity Awareness & Data Protection</h2>
      <p>Protect your business from cyber threats with training on data security, phishing
prevention, and risk management strategies.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Cybersecurity Awareness Session</button>
    </div>
  </div>

  <div id="sales-mastery" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/growth.svg') }}" alt="Icon">
        <span>Business Profitability Growth<br><small>After Financial Training</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/corporate/tl3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Financial Management & Budgeting Training</h2>
      <p>Train your employees in budget planning, financial forecasting, and cash flow
      optimization to ensure financial stability.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Financial Training Session</button>
    </div>
  </div>

  <div class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/corporate/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/corporate/rates.svg') }}" alt="Icon">
        <span>Increase in Conversion Rates<br><small>After Sales Training</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/corporate/tr4.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Sales & Negotiation Mastery</h2>
      <p>Boost sales performance with strategic negotiation techniques, client relationship
      management, and persuasion training to close more deals.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Sales & Negotiation Training Call</button>
    </div>
  </div>
</section>

@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
@endsection
