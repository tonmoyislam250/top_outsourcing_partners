@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <img src="{{ asset('images/third-party/third-party.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">Third-Party Business Support</h1>
  </div>

  <div class="grid">
    <div class="card" data-target="#hro">
      <img src="{{ asset('images/third-party/frame1.svg') }}" alt="analytics">
      <p>Human Resource Outsourcing (HRO)</p>
    </div>
    <div class="card" data-target="#lpo">
      <img src="{{ asset('images/third-party/frame2.svg') }}" alt="chatbot">
      <p>Legal Process Outsourcing (LPO)</p>
    </div>
    <div class="card" data-target="#marketing">
      <img src="{{ asset('images/third-party/frame3.svg') }}" alt="predictive">
      <p>Marketing & Brand Management</p>
    </div>
    <div class="card" data-target="#finance">
      <img src="{{ asset('images/third-party/frame4.svg') }}" alt="automation">
      <p>Accounting & Financial Process Outsourcing</p>
    </div>
    <div class="card" data-target="#customer-support">
      <img src="{{ asset('images/third-party/frame5.svg') }}" alt="workflow">
      <p>Customer Support & Call Center Services</p>
    </div>
    <div class="card" data-target="#ecommerce">
      <img src="{{ asset('images/third-party/frame5.svg') }}" alt="cyber">
      <p>E-commerce & Marketplace Support</p>
    </div>
  </div>

  <div id="hro" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/cost.svg') }}" alt="Icon">
        <span>Cost Savings<br><small>from HR Outsourcing </small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/third-party/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Human Resource Outsourcing (HRO)</h2>
      <p>Simplify workforce management with end-to-end recruitment, payroll processing,
      employee benefits administration, and compliance handling for your business.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'"> Talk to an HR Outsourcing Expert</button>
    </div>
  </div>

  <div id="lpo" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/reduction.svg') }}" alt="Icon">
        <span>Increase in Customer Engagement<br><small>with Outsourced Marketing</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/third-party/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Legal Process Outsourcing (LPO)</h2>
      <p>Access expert contract drafting, compliance management, legal documentation, and risk assessment services without hiring an in-house legal team.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Legal Outsourcing Consultation</button>
    </div>
  </div>

  <div id="marketing" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/sales.svg') }}" alt="Icon">
        <span>Sales Growth Forecast<br><small>with AI vs. Without AI</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/third-party/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Marketing & Brand Management</h2>
      <p>Enhance your brand visibility with SEO, digital marketing, social media management, and content strategy to attract more customers.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Marketing Consultation</button>
    </div>
  </div>

  <div id="finance" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/efficiency.svg') }}" alt="Icon">
        <span>Efficiency Gains<br><small>with Outsourced Financial Services</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/third-party/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Accounting & Financial Process Outsourcing</h2>
      <p>Ensure accurate bookkeeping, tax filing, financial reporting, and cash flow
      management with expert financial outsourcing services.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Finance Outsourcing Call</button>
    </div>
  </div>

  <div id="customer-support" class="finance-service">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/customer.svg') }}" alt="Icon">
        <span>Customer Satisfaction Improvement<br><small>After Call Center Outsourcing</small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/third-party/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>Customer Support & Call Center Services</h2>
      <p>Provide 24/7 multilingual customer support, live chat services, and technical
      assistance to improve customer satisfaction and retention.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Customer Support Strategy Call</button>
    </div>
  </div>

  <div id="ecommerce" class="finance-service reverse">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/faster.svg') }}" alt="Icon">
        <span>Faster Order Fulfillment<br><small>with E-commerce Outsourcing</small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/third-party/tl3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2>E-commerce & Marketplace Support</h2>
      <p>Manage your order processing, inventory control, product listings, and customer
      interactions efficiently with expert outsourcing solutions.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule an E-commerce Support Consultation</button>
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
