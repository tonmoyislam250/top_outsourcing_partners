@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/out.css') }}">
@section('content')

<!-- Hero Section -->
<section class="hero-outsourcing">
  <div class="container hero-outsourcing-content">
    <div class="hero-outsourcing-text">
      <h2>Outsourcing Solutions for Accounting Firms - Scale Your Operations with Confidence</h2>
      <p>We act as an extension of your firm, handling bookkeeping, accounting, and financial operations so you can focus on client advisory and revenue-generating activities.</p>
      <button onclick="window.location.href='/consult'">Book a Free Consultation</button>
    </div>
    <div class="hero-outsourcing-image">
      <img src="{{ asset('images/out/hero.png') }}" alt="Accounting Illustration">
    </div>
  </div>
</section>

<!-- Why Partner Section -->
<section class="partner-section">
  <div class="container">
    <div class="partner-wrapper">
        <div class="partner-image">
        <img src="{{ asset('images/out/hero2.png') }}" alt="Graph Image">
      </div>
      <div class="partner-text">
        <h2><strong>Why Partner with Us?</strong></h2>
        <ul>
          <li>✔️ <strong>Free Up Your Team’s Time</strong> – Delegate routine accounting tasks and focus on client strategy.</li>
          <li>✔️ <strong>Scale Without Expanding In-House Staff</strong> – Grow your capacity without recruitment and training costs.</li>
          <li>✔️ <strong>Enhance Accuracy & Compliance</strong> – Reduce audit risks with expert-led financial operations.</li>
          <li>✔️ <strong>Seamless Integration</strong> – We work with QuickBooks, Sage, Xero, Tally, and other accounting platforms.</li>
        </ul>
        <button onclick="window.location.href='/consult'">Schedule a Free Strategy Call</button>
      </div>
    </div>
  </div>
</section>

<!-- Service Offerings -->
<section class="service-offerings">
  <div class="container">
    <h2><strong>Our Service Offerings</strong></h2>
    <div class="offerings-grid">
      <div class="offering-card">
        <img src="{{ asset('images/out/frame1.svg') }}" alt="Bookkeeping">
        <h3><strong>Bookkeeping Services</strong></h3>
        <ul>
          <li>Month-end & year-end closing</li>
          <li>Transaction categorization & financial reporting</li>
          <li>Bank & credit card reconciliations</li>
        </ul>
      </div>
      <div class="offering-card">
        <img src="{{ asset('images/out/frame2.svg') }}" alt="Accounts Payable">
        <h3><strong>Accounts Payable & Receivable</strong></h3>
        <ul>
          <li>Payment scheduling & reconciliation</li>
          <li>Vendor management & expense tracking</li>
          <li>Client invoicing & payment tracking</li>
        </ul>
      </div>
      <div class="offering-card">
        <img src="{{ asset('images/out/frame3.svg') }}"alt="CFO Services">
        <h3><strong>CFO Services</strong></h3>
        <ul>
          <li>Cash flow management & forecasting</li>
          <li>Profitability analysis & strategy</li>
          <li>Risk assessment & compliance advisory</li>
        </ul>
      </div>
    </div>
    <div style="margin: 2rem 0;"></div>
    <div class="offerings-grid">
      <div class="offering-card">
        <img src="{{ asset('images/out/frame4.svg') }}" alt="Finance">
        <h3><strong>Finance & Accounting</strong></h3>
        <ul>
          <li>Expense tracking & cost-control strategies</li>
          <li>Financial statement preparation & reporting</li>
          <li>Internal audits & fraud detection</li>
        </ul>
      </div>
      <div class="offering-card">
        <img src="{{ asset('images/out/frame5.svg') }}" alt="Process Automation">
        <h3><strong>Financial Process Automation</strong></h3>
        <ul>
          <li>Workflow automation for faster reporting</li>
          <li>AI-powered fraud detection & internal controls</li>
          <li>Real-time dashboard analytics</li>
        </ul>
      </div>
      <div class="offering-card">
        <img src="{{ asset('images/out/frame6.svg') }}" alt="QuickBooks">
        <h3><strong>Sage to QuickBooks Migration</strong></h3>
        <ul>
          <li>Full data migration & system setup</li>
          <li>Historical data validation & accuracy checks</li>
          <li>Custom QuickBooks configuration</li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- ROI Section -->
<section class="roi-section">
  <div class="container">
    <h2><strong>The ROI of Outsourcing</strong></h2>
    
    <!-- Three Cards Row -->
    <div class="roi-grid">
      <div class="roi-card">
        <img src="{{ asset('images/out/roi1.svg') }}" alt="Cost Savings">
        <h4><strong>Cost Savings</strong></h4>
        <p>Cut operational costs by up to 50% by reducing in-house staffing expenses.</p>
      </div>
      <div class="roi-card">
        <img src="{{ asset('images/out/roi2.svg') }}" alt="Efficiency">
        <h4><strong>Efficiency Boost</strong></h4>
        <p>Automate routine financial processes and eliminate inefficiencies.</p>
      </div>
      <div class="roi-card">
        <img src="{{ asset('images/out/roi3.svg') }}" alt="Scalability">
        <h4><strong>Scalability</strong></h4>
        <p>Expand service offerings without recruiting and training new employees.</p>
      </div>
    </div>

    <!-- Add spacing between rows -->
    <div style="margin: 2rem 0;"></div>
    
    <!-- Two Cards Row -->
    <div class="roi-grid">
      <div class="roi-card">
        <img src="{{ asset('images/out/roi4.svg') }}" alt="Security">
        <h4><strong>Data Security & Compliance</strong></h4>
        <p>We adhere to U.S. financial regulations (GAAP, IRS, GDPR, and CCPA).</p>
      </div>
      <div class="roi-card">
        <img src="{{ asset('images/out/roi5.svg') }}" alt="Support">
        <h4><strong>24/7 Dedicated Support</strong></h4>
        <p>Our expert team is available whenever you need us.</p>
      </div>
    </div>
    <button onclick="window.location.href='/consult'">Book a Free Financial Consultation</button>
  </div>
</section>

<!-- Engagement Model Section -->
<section class="engagement-model">
  <div class="container">
    <h2><strong>How It Works: Our Engagement Model</strong></h2>
    <div class="steps-wrapper">
      <div class="step-box zigzag-left">
        <div class="step-icon purple">
          <img src="{{ asset('images/out/eng1.svg') }}" alt="Consultation">
        </div>
        <div class="step-content">
          <h3>Consultation & Needs Assessment</h3>
          <p>We analyze your firm's workload and outsourcing goals.</p>
        </div>
      </div>
      <div class="connector purple-line"></div>
      <div class="step-box zigzag-right">
        <div class="step-icon green">
          <img src="{{ asset('images/out/eng2.svg') }}" alt="Onboarding">
        </div>
        <div class="step-content">
          <h3>Seamless Onboarding & Secure Data Handling</h3>
          <p>Ensuring smooth transitions with complete confidentiality.</p>
        </div>
      </div>
      <div class="connector green-line"></div>
      <div class="step-box zigzag-left">
        <div class="step-icon maroon">
          <img src="{{ asset('images/out/eng3.svg') }}" alt="Service Plan">
        </div>
        <div class="step-content">
          <h3>Customized Service Plan</h3>
          <p>Outsourcing solutions that integrate seamlessly with your firm’s workflow.</p>
        </div>
      </div>
      <div class="connector maroon-line"></div>
      <div class="step-box zigzag-right">
        <div class="step-icon blue">
          <img src="{{ asset('images/out/eng4.svg') }}" alt="Support">
        </div>
        <div class="step-content">
          <h3>Ongoing Support & Reporting</h3>
          <p>Real-time updates, KPI tracking, and transparent communication.</p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('footer')
    @include('components.footer') 
@endsection