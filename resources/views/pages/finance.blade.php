@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header animate__animated animate__fadeInDown">
        <img src="{{ asset('images/finance/finance.svg') }}" alt="fin Icon" class="section-icon">
        <h1 class="section-title">Finance & Accounting</h1>
    </div>
    <div class="grid">
        <div class="card animate__animated animate__flipInY animate__delay-1s" onclick="document.getElementById('bookkeeping').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame1.svg') }}" alt="Bookkeeping">
            <p><strong>Bookkeeping & Payroll Management</strong></p>
        </div>
        <div class="card animate__animated animate__flipInY animate__delay-1s" onclick="document.getElementById('cfo-services').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame2.svg') }}" alt="CFO Services">
            <p><strong>CFO Services (Virtual & On-Demand)</strong></p>
        </div>
        <div class="card animate__animated animate__flipInY animate__delay-1s" onclick="document.getElementById('ap-management').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame3.svg') }}" alt="AP Management">
            <p><strong>Accounts Payable (AP) Management</strong></p>
        </div>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; max-width: 800px; margin: 0 auto 50px;">
        <div class="card animate__animated animate__flipInY animate__delay-2s" onclick="document.getElementById('ar-billing').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame4.svg') }}" alt="AR Billing">
            <p><strong>Accounts Receivable (AR) & Billing Services</strong></p>
        </div>
        <div class="card animate__animated animate__flipInY animate__delay-2s" onclick="document.getElementById('tax-compliance').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame5.svg') }}" alt="Tax Compliance">
            <p><strong>Tax Preparation & Compliance</strong></p>
        </div>
    </div>

    <div id="bookkeeping" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image1.png') }}" alt="Bookkeeping">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/clock.svg') }}" alt="Icon">
                <span><strong>Time Saved</strong><br><small><strong>with Outsourced</strong></small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr1.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Bookkeeping & Payroll Management</strong></h2>
            <p>Stay ahead of your finances with accurate, real-time bookkeeping. Our experts handle ledger maintenance, bank reconciliations, and financial reporting so you can focus on growing your business.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Bookkeeping Consultation</button>
        </div>
    </div>

    <!-- CFO Services -->
    <div id="cfo-services" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image2.png') }}" alt="CFO Services">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/idea.svg') }}" alt="Icon">
                <span><strong>Profitability Increase</strong><br><small><strong>After Implementing CFO Strategies</strong></small></span>
            </div>
            <div class="finance-badge top-left">
                <img src="{{ asset('images/finance/tl1.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>CFO Services (Virtual & On-Demand)</strong></h2>
            <p>Access high-level financial strategy without the cost of a full-time CFO. We provide cash flow forecasting, profitability analysis, and financial planning tailored to your business goals.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Book a CFO Advisory Session</button>
        </div>
    </div>

    <!-- Accounts Payable (AP) Management -->
    <div id="ap-management" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image3.png') }}" alt="AP Management">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/reduction.svg') }}" alt="Icon">
                <span><strong>Reduction in Late Payments</strong><br><small><strong>with AP Automation</strong></small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr2.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Accounts Payable (AP) Management</strong></h2>
            <p>Stay ahead of your finances with accurate, real-time bookkeeping. Our experts handle ledger maintenance, bank reconciliations, and financial reporting so you can focus on growing your business.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Speak with an AP Specialist</button>
        </div>
    </div>

    <!-- Accounts Receivable (AR) & Billing Services -->
    <div id="ar-billing" class="finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image4.png') }}" alt="AR & Billing Services">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/faster.svg') }}" alt="Icon">
                <span><strong>Faster Invoice Collection</strong><br><small><strong>with AR Automation</strong></small></span>
            </div>
            <div class="finance-badge top-left">
                <img src="{{ asset('images/finance/tl2.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Accounts Receivable (AR) & Billing Services</strong></h2>
            <p>Speed up payments and enhance cash flow with automated invoicing, payment tracking, and collections management. Get paid faster with reduced outstanding balances.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Book an AR Strategy Call</button>
        </div>
    </div>

    <div id="tax-compliance" class="finance-service animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image5.png') }}" alt="AP Management">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/tax.svg') }}" alt="Icon">
                <span><strong>Tax Error Reduction</strong><br><small><strong>with Professional Outsourcing</strong></small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr3.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Tax Preparation & Compliance</strong></h2>
            <p>Ensure hassle-free tax compliance with corporate tax filing, VAT/GST reporting, and
            regulatory adherence. Stay tax-ready while we handle the complexities for you.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Speak with an AP Specialist</button>
        </div>
    </div>
</section>
@include('components.why-choose-us')
@endsection

@section('footer')
    @include('components.footer') 
@endsection
