@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <img src="{{ asset('images/icons/ai-icon.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">AI Integration in Business</h1>
  </div>
<div class="grid">
    <div class="card">
        <img src="{{ asset('images/ai/frame1.svg') }}" alt="analytics">
        <p>AI Powered Data Analytics</p>
    </div>
    <div class="card">
        <img src="{{ asset('images/ai/frame2.svg') }}" alt="chatbot">
        <p>AI-Powered Chatbots & Customer Support</p>
    </div>
    <div class="card">
        <img src="{{ asset('images/ai/frame3.svg') }}" alt="predictive">
        <p>Predictive Business Intelligence</p>
    </div>
    <div class="card">
        <img src="{{ asset('images/ai/frame4.svg') }}" alt="automation">
        <p>AI in Finance & Accounting Automation</p>
    </div>
    <div class="card">
        <img src="{{ asset('images/ai/frame5.svg') }}" alt="workflow">
        <p>AI-Driven Process Automation & Workflow Optimization</p>
    </div>
    <div class="card">
        <img src="{{ asset('images/ai/frame5.svg') }}" alt="cyber">
        <p>Cybersecurity & AI Risk Management</p>
    </div>
</div>

  </div>
  <div class="finance-service">
      <div class="finance-image-wrapper">
        <img src="{{ asset('images/ai/image1.png') }}" alt="Bookkeeping">
        <div class="finance-badge">
          <img src="{{ asset('images/finance/clock.svg') }}" alt="Icon">
          <span>Business Performance<br><small>Before & After AI Analytics</small></span>
        </div>
    <div class="finance-badge top-right">
      <img src="{{ asset('images/finance/tr1.svg') }}" alt="Icon">
    </div>
      </div>
      <div class="finance-content">
        <h2>AI Powered Data Analytics</h2>
        <p>Transform raw data into actionable insights with AI-driven analytics and machine
        learning models. Make smarter decisions with real-time reporting and trend predictions.</p>
        <button>Schedule a Data Analytics Consultation</button>
      </div>
    </div>

    <!-- CFO Services -->
    <div class="finance-service reverse">
      <div class="finance-image-wrapper">
        <img src="{{ asset('images/ai/image2.png') }}" alt="CFO Services">
        <div class="finance-badge">
          <img src="{{ asset('images/finance/idea.svg') }}" alt="Icon">
          <span>Profitability Increase<br><small>After Implementing CFO Strategies</small></span>
        </div>
    <div class="finance-badge top-left">
      <img src="{{ asset('images/finance/tl1.svg') }}" alt="Icon">
    </div>
      </div>
      <div class="finance-content">
        <h2>AI-Powered Chatbots & Customer Support</h2>
        <p>Enhance customer experience with AI-driven chatbots and virtual assistants that provide
        24/7 support, instant responses, and multilingual interactions.</p>
        <button> Book an AI Chatbot Consultation</button>
      </div>
    </div>
<!-- Accounts Payable (AP) Management -->
<div class="finance-service">
  <div class="finance-image-wrapper">
    <img src="{{ asset('images/ai/image3.png') }}" alt="AP Management"> <!-- Replace with actual AP image -->
    <div class="finance-badge">
      <img src="{{ asset('images/finance/reduction.svg') }}" alt="Icon">
      <span>Reduction in Late Payments<br><small>with AP Automation</small></span>
    </div>
    <div class="finance-badge top-right">
      <img src="{{ asset('images/finance/tr2.svg') }}" alt="Icon">
    </div>
  </div>
  <div class="finance-content">
    <h2>Predictive Business Intelligence</h2>
    <p>Use AI to forecast market trends, customer behavior, and financial performance, helping
    businesses make proactive, data-driven decisions.</p>
    <button>Schedule a Predictive Analytics Session</button>
  </div>
</div>

<!-- Accounts Receivable (AR) & Billing Services -->
<div class="finance-service reverse">
  <div class="finance-image-wrapper">
    <img src="{{ asset('images/ai/image4.png') }}" alt="AR & Billing Services"> <!-- Replace with actual AR image -->
    <div class="finance-badge">
      <img src="{{ asset('images/finance/faster.svg') }}" alt="Icon">
      <span>Faster Invoice Collection<br><small>with AR Automation</small></span>
    </div>
    <div class="finance-badge top-left">
      <img src="{{ asset('images/finance/tl2.svg') }}" alt="Icon">
    </div>
  </div>
  <div class="finance-content">
    <h2>AI in Finance & Accounting Automation</h2>
    <p>Increase efficiency in invoicing, expense tracking, payroll, and reconciliation with
    AI-powered automation, reducing errors and manual effort.</p>
    <button>Book an AI Finance Strategy Call</button>
  </div>
</div>

<div class="finance-service">
  <div class="finance-image-wrapper">
    <img src="{{ asset('images/finance/image5.png') }}" alt="AP Management"> <!-- Replace with actual AP image -->
    <div class="finance-badge">
      <img src="{{ asset('images/finance/tax.svg') }}" alt="Icon">
      <span>Reduction in Late Payments<br><small>with AP Automation</small></span>
    </div>
    <div class="finance-badge top-right">
      <img src="{{ asset('images/finance/tr3.svg') }}" alt="Icon">
    </div>
  </div>
  <div class="finance-content">
    <h2>Cybersecurity & AI Risk Management</h2>
    <p>Protect your business with AI-powered fraud detection, automated security monitoring,
    and real-time threat prevention against cyber risks.</p>
    <button>Schedule a Cybersecurity Consultation</button>
  </div>
</div>
</section>
@include('components.why-choose-us')
@endsection
@section('footer')
    @include('components.footer') 
@endsection
