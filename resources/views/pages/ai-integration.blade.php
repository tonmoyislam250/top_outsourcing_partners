@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <img src="{{ asset('images/ai/ai-icon.svg') }}" alt="AI Icon" class="section-icon">
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

  <div class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/business.svg') }}" alt="Icon">
        <span>Business Performance<br><small>Before & After AI Analytics</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/ai/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>AI Powered Data Analytics</h2>
      <p>Transform raw data into actionable insights with AI-driven analytics and machine learning models. Make smarter decisions with real-time reporting and trend predictions.</p>
      <button>Schedule a Data Analytics Consultation</button>
    </div>
  </div>

  <!-- CFO Services -->
  <div class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/reduction.svg') }}" alt="Icon">
        <span>Reduction in Customer Support<br><small>Response time with AI</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/finance/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>AI-Powered Chatbots & Customer Support</h2>
      <p>Enhance customer experience with AI-driven chatbots and virtual assistants that provide 24/7 support, instant responses, and multilingual interactions.</p>
      <button>Book an AI Chatbot Consultation</button>
    </div>
  </div>

  <!-- Accounts Payable (AP) Management -->
  <div class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/sales.svg') }}" alt="Icon">
        <span>Sales Growth Forecast<br><small>with AI vs. Without AI</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/ai/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Predictive Business Intelligence</h2>
      <p>Use AI to forecast market trends, customer behavior, and financial performance, helping businesses make proactive, data-driven decisions.</p>
      <button>Schedule a Predictive Analytics Session</button>
    </div>
  </div>

  <!-- Accounts Receivable (AR) & Billing Services -->
  <div class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/reduction2.svg') }}" alt="Icon">
        <span>Reduction in Accounting Errors<br><small>with AI Automation</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/ai/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>AI in Finance & Accounting Automation</h2>
      <p>Increase efficiency in invoicing, expense tracking, payroll, and reconciliation with AI-powered automation, reducing errors and manual effort.</p>
      <button>Book an AI Finance Strategy Call</button>
    </div>
  </div>

  <div class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/prod.svg') }}" alt="Icon">
        <span>Productivity Increase<br><small>with AI-Driven Workflow Automation</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/ai/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>AI-Driven Process Automation & Workflow
      Optimization</h2>
      <p>AI automates repetitive business tasks, workflows, and approvals, streamlining
      operations and boosting productivity by up to 40%.</p>
      <button>Talk to an AI Automation Specialist</button>
    </div>
  </div>

  <div class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/ai/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/ai/fraud.svg') }}" alt="Icon">
        <span>Fraud Detection Effectiveness<br><small>with AI Automation</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/ai/tl3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Cybersecurity & AI Risk Management</h2>
      <p>Protect your business with AI-powered fraud detection, automated security monitoring, and real-time threat prevention against cyber risks.</p>
      <button>Schedule a Cybersecurity Consultation</button>
    </div>
  </div>
</section>

@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
@endsection
