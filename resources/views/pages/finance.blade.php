@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <img src="{{ asset('images/finance/finance.svg') }}" alt="fin Icon" class="section-icon">
        <h1>Finance & Accounting</h1>
    </div>
    <div class="grid">
        <div class="card">
            <img src="{{ asset('images/finance/frame1.svg') }}" alt="Bookkeeping">
            <p>Bookkeeping & Payroll Management</p>
        </div>
        <div class="card">
            <img src="{{ asset('images/finance/frame2.svg') }}" alt="CFO Services">
            <p>CFO Services (Virtual & On-Demand)</p>
        </div>
        <div class="card">
            <img src="{{ asset('images/finance/frame3.svg') }}" alt="AP Management">
            <p>Accounts Payable (AP) Management</p>
        </div>
        <div class="card">
            <img src="{{ asset('images/finance/frame4.svg') }}" alt="AR Billing">
            <p>Accounts Receivable (AR) & Billing Services</p>
        </div>
        <div class="card">
            <img src="{{ asset('images/finance/frame5.svg') }}" alt="Tax Compliance">
            <p>Tax Preparation & Compliance</p>
        </div>
    </div>

    <div class="stats">
        <div class="stat-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart">
                <line x1="12" y1="20" x2="12" y2="10"></line>
                <line x1="18" y1="20" x2="18" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="16"></line>
            </svg>
            <h2>56%</h2>
            <p>of CFOs say that finance outsourcing improves strategic decision-making</p>
        </div>
        <div class="stat-box">
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7H15a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
            <h2>44%</h2>
            <p>reduction in operational costs is achieved through finance outsourcing</p>
        </div>
    </div>

    <div class="finance-service">
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
            <button>Schedule a Bookkeeping Consultation</button>
        </div>
    </div>

    <!-- CFO Services -->
    <div class="finance-service reverse">
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
            <button>Book a CFO Advisory Session</button>
        </div>
    </div>

    <!-- Accounts Payable (AP) Management -->
    <div class="finance-service">
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
            <button>Speak with an AP Specialist</button>
        </div>
    </div>

    <!-- Accounts Receivable (AR) & Billing Services -->
    <div class="finance-service reverse">
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
            <button>Book an AR Strategy Call</button>
        </div>
    </div>

    <div class="finance-service">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image5.png') }}" alt="AP Management">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/tax.svg') }}" alt="Icon">
                <span>Reduction in Late Payments<br><small>with AP Automation</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr3.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2>Accounts Payable (AP) Management</h2>
            <p>Stay ahead of your finances with accurate, real-time bookkeeping. Our experts handle ledger maintenance, bank reconciliations, and financial reporting so you can focus on growing your business.</p>
            <button>Speak with an AP Specialist</button>
        </div>
    </div>
</section>
@include('components.why-choose-us')
@endsection

@section('footer')
    @include('components.footer') 
@endsection
