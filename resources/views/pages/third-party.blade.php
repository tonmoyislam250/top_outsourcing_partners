@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header animate__animated animate__fadeInDown">
    <img src="{{ asset('images/third-party/third-party.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">Third-Party Business Support</h1>
  </div>

  <div class="grid">
    <div class="card animate__animated animate__fadeInUp animate__delay-1s" data-target="#hro">
      <img src="{{ asset('images/third-party/frame1.svg') }}" alt="analytics">
      <p><b>Human Resource Outsourcing (HRO)</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-1s" data-target="#lpo">
      <img src="{{ asset('images/third-party/frame2.svg') }}" alt="chatbot">
      <p><b>Legal Process Outsourcing (LPO)</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-1s" data-target="#marketing">
      <img src="{{ asset('images/third-party/frame3.svg') }}" alt="predictive">
      <p><b>Marketing & Brand Management</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-2s" data-target="#finance">
      <img src="{{ asset('images/third-party/frame4.svg') }}" alt="automation">
      <p><b>Accounting & Financial Process Outsourcing</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-2s" data-target="#customer-support">
      <img src="{{ asset('images/third-party/frame5.svg') }}" alt="workflow">
      <p><b>Customer Support & Call Center Services</b></p>
    </div>
    <div class="card animate__animated animate__fadeInUp animate__delay-2s" data-target="#ecommerce">
      <img src="{{ asset('images/third-party/frame5.svg') }}" alt="cyber">
      <p><b>E-commerce & Marketplace Support</b></p>
    </div>
  </div>

  <div id="hro" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image1.png') }}" alt="Bookkeeping">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/cost.svg') }}" alt="Icon">
        <span><b>Cost Savings</b><br><small><b>from HR Outsourcing</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/third-party/tr1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Human Resource Outsourcing (HRO)</b></h2>
      <p>Simplify workforce management with end-to-end recruitment, payroll processing,
      employee benefits administration, and compliance handling for your business.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'"> Talk to an HR Outsourcing Expert</button>
    </div>
  </div>

  <div id="lpo" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image2.png') }}" alt="CFO Services">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/reduction.svg') }}" alt="Icon">
        <span><b>Increase in Customer Engagement</b><br><small><b>with Outsourced Marketing</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/third-party/tl1.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Legal Process Outsourcing (LPO)</b></h2>
      <p>Access expert contract drafting, compliance management, legal documentation, and risk assessment services without hiring an in-house legal team.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Legal Outsourcing Consultation</button>
    </div>
  </div>

  <div id="marketing" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image3.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/sales.svg') }}" alt="Icon">
        <span><b>Sales Growth Forecast</b><br><small><b>with AI vs. Without AI</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/third-party/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Marketing & Brand Management</b></h2>
      <p>Enhance your brand visibility with SEO, digital marketing, social media management, and content strategy to attract more customers.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Marketing Consultation</button>
    </div>
  </div>

  <div id="finance" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/efficiency.svg') }}" alt="Icon">
        <span><b>Efficiency Gains</b><br><small><b>with Outsourced Financial Services</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/third-party/tl2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Accounting & Financial Process Outsourcing</b></h2>
      <p>Ensure accurate bookkeeping, tax filing, financial reporting, and cash flow
      management with expert financial outsourcing services.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Finance Outsourcing Call</button>
    </div>
  </div>

  <div id="customer-support" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image5.png') }}" alt="AP Management">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/customer.svg') }}" alt="Icon">
        <span><b>Customer Satisfaction Improvement</b><br><small><b>After Call Center Outsourcing</b></small></span>
      </div>
      <div class="finance-badge top-right">
        <img src="{{ asset('images/third-party/tr2.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>Customer Support & Call Center Services</b></h2>
      <p>Provide 24/7 multilingual customer support, live chat services, and technical
      assistance to improve customer satisfaction and retention.</p>
      <button onclick="window.location.href='{{ url('/consult') }}'">Book a Customer Support Strategy Call</button>
    </div>
  </div>

  <div id="ecommerce" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
    <div class="finance-image-wrapper">
      <img src="{{ asset('images/third-party/image4.png') }}" alt="AR & Billing Services">
      <div class="finance-badge">
        <img src="{{ asset('images/third-party/faster.svg') }}" alt="Icon">
        <span><b>Faster Order Fulfillment</b><br><small><b>with E-commerce Outsourcing</b></small></span>
      </div>
      <div class="finance-badge top-left">
        <img src="{{ asset('images/third-party/tl3.svg') }}" alt="Icon">
      </div>
    </div>
    <div class="finance-content">
      <h2><b>E-commerce & Marketplace Support</b></h2>
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
