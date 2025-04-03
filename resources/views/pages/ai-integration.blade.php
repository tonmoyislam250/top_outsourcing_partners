@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header animate__animated animate__fadeInDown">
    <img src="{{ asset('images/ai/ai-icon.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">AI Integration in Business</h1>
  </div>

  <div class="grid">
    <div class="card animate__animated animate__tada animate__delay-1s" onclick="document.getElementById('data-analytics').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/ai/frame1.svg') }}" alt="analytics">
      <p><b>AI Powered Data Analytics</b></p>
    </div>
    <div class="card animate__animated animate__tada animate__delay-1s" onclick="document.getElementById('chatbots').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/ai/frame2.svg') }}" alt="chatbot">
      <p><b>AI-Powered Chatbots & Customer Support</b></p>
    </div>
    <div class="card animate__animated animate__tada animate__delay-1s" onclick="document.getElementById('predictive-intelligence').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/ai/frame3.svg') }}" alt="predictive">
      <p><b>Predictive Business Intelligence</b></p>
    </div>
    <div class="card animate__animated animate__tada animate__delay-2s" onclick="document.getElementById('finance-automation').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/ai/frame4.svg') }}" alt="automation">
      <p><b>AI in Finance & Accounting Automation</b></p>
    </div>
    <div class="card animate__animated animate__tada animate__delay-2s" onclick="document.getElementById('workflow-optimization').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/ai/frame5.svg') }}" alt="workflow">
      <p><b>AI-Driven Process Automation & Workflow Optimization</b></p>
    </div>
    <div class="card animate__animated animate__tada animate__delay-2s" onclick="document.getElementById('cybersecurity').scrollIntoView({ behavior: 'smooth' })">
      <img src="{{ asset('images/ai/frame5.svg') }}" alt="cyber">
      <p><b>Cybersecurity & AI Risk Management</b></p>
    </div>
  </div>

  <div id="data-analytics" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/business.svg') }}" alt="Icon">
        <span><b>Business Performance</b><br><small><b>Before & After AI Analytics</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/ai/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>AI Powered Data Analytics</b></h2>
      <p>Transform raw data into actionable insights with AI-driven analytics and machine learning models. Make smarter decisions with real-time reporting and trend predictions.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Data Analytics Consultation</button>
    </div>
  </div>

  <div id="chatbots" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/reduction.svg') }}" alt="Icon">
        <span><b>Reduction in Customer Support</b><br><small><b>Response time with AI</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/ai/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>AI-Powered Chatbots & Customer Support</b></h2>
      <p>Enhance customer experience with AI-driven chatbots and virtual assistants that provide 24/7 support, instant responses, and multilingual interactions.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book an AI Chatbot Consultation</button>
    </div>
  </div>

  <div id="predictive-intelligence" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/sales.svg') }}" alt="Icon">
        <span><b>Sales Growth Forecast</b><br><small><b>with AI vs. Without AI</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/ai/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Predictive Business Intelligence</b></h2>
      <p>Use AI to forecast market trends, customer behavior, and financial performance, helping businesses make proactive, data-driven decisions.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Predictive Analytics Session</button>
    </div>
  </div>

  <div id="finance-automation" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/reduction2.svg') }}" alt="Icon">
        <span><b>Reduction in Accounting Errors</b><br><small><b>with AI Automation</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/ai/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>AI in Finance & Accounting Automation</b></h2>
      <p>Increase efficiency in invoicing, expense tracking, payroll, and reconciliation with AI-powered automation, reducing errors and manual effort.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book an AI Finance Strategy Call</button>
    </div>
  </div>

  <div id="workflow-optimization" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/prod.svg') }}" alt="Icon">
        <span><b>Productivity Increase</b><br><small><b>with AI-Driven Workflow Automation</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/ai/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>AI-Driven Process Automation & Workflow Optimization</b></h2>
      <p>AI automates repetitive business tasks, workflows, and approvals, streamlining operations and boosting productivity by up to 40%.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Talk to an AI Automation Specialist</button>
    </div>
  </div>

  <div id="cybersecurity" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image6.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/fraud.svg') }}" alt="Icon">
        <span><b>Fraud Detection Effectiveness</b><br><small><b>with AI Automation</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/ai/tl3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Cybersecurity & AI Risk Management</b></h2>
      <p>Protect your business with AI-powered fraud detection, automated security monitoring, and real-time threat prevention against cyber risks.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Cybersecurity Consultation</button>
    </div>
  </div>
</section>

@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
@endsection
