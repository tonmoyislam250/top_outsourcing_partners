@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <img src="{{ asset('images/finance/finance.svg') }}" alt="fin Icon" class="section-icon">
        <h1 class="section-title">Finance & Accounting</h1>
    </div>
    <div class="grid">
        <div class="card" onclick="document.getElementById('bookkeeping').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame1.svg') }}" alt="Bookkeeping">
            <p>Bookkeeping & Payroll Management</p>
        </div>
        <div class="card" onclick="document.getElementById('cfo-services').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame2.svg') }}" alt="CFO Services">
            <p>CFO Services (Virtual & On-Demand)</p>
        </div>
        <div class="card" onclick="document.getElementById('ap-management').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame3.svg') }}" alt="AP Management">
            <p>Accounts Payable (AP) Management</p>
        </div>
        <div class="card" onclick="document.getElementById('ar-billing').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame4.svg') }}" alt="AR Billing">
            <p>Accounts Receivable (AR) & Billing Services</p>
        </div>
        <div class="card" onclick="document.getElementById('tax-compliance').scrollIntoView({ behavior: 'smooth' })">
            <img src="{{ asset('images/finance/frame5.svg') }}" alt="Tax Compliance">
            <p>Tax Preparation & Compliance</p>
        </div>
    </div>

    <div id="bookkeeping" class="finance-service">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image1.png') }}" alt="Bookkeeping">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/clock.svg') }}" alt="Icon">
                <span>Time Saved<br><small>with Outsourced</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr1.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2>Bookkeeping & Payroll Management</h2>
            <p>Stay ahead of your finances with accurate, real-time bookkeeping. Our experts handle ledger maintenance, bank reconciliations, and financial reporting so you can focus on growing your business.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Schedule a Bookkeeping Consultation</button>
        </div>
    </div>

    <!-- CFO Services -->
    <div id="cfo-services" class="finance-service reverse">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image2.png') }}" alt="CFO Services">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/idea.svg') }}" alt="Icon">
                <span>Profitability Increase<br><small>After Implementing CFO Strategies</small></span>
            </div>
            <div class="finance-badge top-left">
                <img src="{{ asset('images/finance/tl1.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2>CFO Services (Virtual & On-Demand)</h2>
            <p>Access high-level financial strategy without the cost of a full-time CFO. We provide cash flow forecasting, profitability analysis, and financial planning tailored to your business goals.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Book a CFO Advisory Session</button>
        </div>
    </div>

    <!-- Accounts Payable (AP) Management -->
    <div id="ap-management" class="finance-service">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image3.png') }}" alt="AP Management">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/reduction.svg') }}" alt="Icon">
                <span>Reduction in Late Payments<br><small>with AP Automation</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr2.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2>Accounts Payable (AP) Management</h2>
            <p>Stay ahead of your finances with accurate, real-time bookkeeping. Our experts handle ledger maintenance, bank reconciliations, and financial reporting so you can focus on growing your business.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Speak with an AP Specialist</button>
        </div>
    </div>

    <!-- Accounts Receivable (AR) & Billing Services -->
    <div id="ar-billing" class="finance-service reverse">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image4.png') }}" alt="AR & Billing Services">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/faster.svg') }}" alt="Icon">
                <span>Faster Invoice Collection<br><small>with AR Automation</small></span>
            </div>
            <div class="finance-badge top-left">
                <img src="{{ asset('images/finance/tl2.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2>Accounts Receivable (AR) & Billing Services</h2>
            <p>Speed up payments and enhance cash flow with automated invoicing, payment tracking, and collections management. Get paid faster with reduced outstanding balances.</p>
            <button onclick="window.location.href='{{ url('/consult') }}'">Book an AR Strategy Call</button>
        </div>
    </div>

    <div id="tax-compliance" class="finance-service">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image5.png') }}" alt="AP Management">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/tax.svg') }}" alt="Icon">
                <span>Tax Error Reduction<br><small>with Professional Outsourcing</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr3.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2>Tax Preparation & Compliance</h2>
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
