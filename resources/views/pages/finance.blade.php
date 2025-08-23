@extends('layouts.app')

@section('title', 'Finance & Accounting Outsourcing Services | Top Outsourcing Partners')
@section('meta_description', 'Streamline your financial operations with Top Outsourcing Partners expert finance and accounting outsourcing services. From bookkeeping and payroll to AR/AP management and financial reporting - reduce costs, improve accuracy, and focus on strategic growth.')
@section('meta_keywords', 'finance outsourcing, accounting outsourcing, bookkeeping services, payroll outsourcing, accounts receivable, accounts payable, financial reporting, cost reduction, accounting accuracy')

@section('content')

<section class="section finance-section">
    <div class="container">
        <div class="finance-header animate__animated animate__fadeInDown">
            <img src="{{ asset('images/finance/finance.svg') }}" alt="Finance Icon" class="section-icon">
            <h1>Finance & Accounting</h1>
        </div>
        <div class="finance-description animate__animated animate__fadeIn animate__delay-1s">
            <p>
                At TopOutsourcingPartners, we specialize in providing customized solutions to meet the unique requirements of each client. Our flexible approach ensures that businesses receive the exact support they need, whether it's hiring our in-house team or having us manage a dedicated team tailored to their needs.
            </p>
        </div>
    </div>
</section>

<section class="services-cards">
    <!-- Service Cards Grid -->
    <div class="container services-grid">
        <div class="feature-box animate__animated animate__flipInY animate__delay-1s" data-target="#bookkeeping">
            <img src="{{ asset('images/finance/frame1.svg') }}" alt="Bookkeeping">
            <h4>Bookkeeping & Payroll Management</h5>
        </div>
        <div class="feature-box animate__animated animate__flipInY animate__delay-1s" data-target="#cfo-services">
            <img src="{{ asset('images/finance/frame2.svg') }}" alt="CFO Services">
            <h4>CFO Services (Virtual & On-Demand)</h5>
        </div>
        <div class="feature-box animate__animated animate__flipInY animate__delay-1s" data-target="#ap-management">
            <img src="{{ asset('images/finance/frame3.svg') }}" alt="AP Management">
            <h4>Accounts Payable (AP) Management</h5>
        </div>
        <div class="feature-box animate__animated animate__flipInY animate__delay-2s" data-target="#ar-billing">
            <img src="{{ asset('images/finance/frame4.svg') }}" alt="AR Billing">
            <h4>Accounts Receivable (AR) & Billing Services</h5>
        </div>
        <div class="feature-box animate__animated animate__flipInY animate__delay-2s" data-target="#tax-compliance">
            <img src="{{ asset('images/finance/frame5.svg') }}" alt="Tax Compliance">
            <h4>Tax Preparation & Compliance</h5>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stat-card">
            <img src="{{ asset('images/finance/stat1.svg') }}" alt="Stat Icon" class="stat-icon">
            <div class="stat-content">
                <div class="stat-percentage">56%</div>
                <p class="stat-description">of CFOs say that finance outsourcing improves strategic decision-making</p>
            </div>
        </div>
        <div class="stat-card">
            <img src="{{ asset('images/finance/stat2.svg') }}" alt="Stat Icon" class="stat-icon">
            <div class="stat-content">
                <div class="stat-percentage">44%</div>
                <p class="stat-description">reduction in operational costs is achieved through finance outsourcing</p>
            </div>
        </div>
    </div>
</section>

<!-- Bookkeeping -->
<section class="service-details">
    <div id="bookkeeping" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image1.png') }}" alt="Bookkeeping">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/clock.svg') }}" alt="Icon">
                <span><strong>Time Saved</strong><br><small>with Outsourced</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr1.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Bookkeeping & Payroll Management</strong></h2>
            <p>Stay ahead of your finances with accurate, real-time bookkeeping. Our experts handle ledger maintenance, bank reconciliations, and financial reporting so you can focus on growing your business.</p>
            <a href="{{ url('/consult') }}" class="btn-primary">Schedule a Bookkeeping Consultation</a>
        </div>
    </div>
</section>

<!-- CFO Services -->
<section class="service-details alt">
    <div id="cfo-services" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image2.png') }}" alt="CFO Services">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/idea.svg') }}" alt="Icon">
                <span><strong>Profitability Increase</strong><br><small>After Implementing CFO Strategies</small></span>
            </div>
            <div class="finance-badge top-left">
                <img src="{{ asset('images/finance/tl1.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>CFO Services (Virtual & On-Demand)</strong></h2>
            <p>Access high-level financial strategy without the cost of a full-time CFO. We provide cash flow forecasting, profitability analysis, and financial planning tailored to your business goals.</p>
            <a href="{{ url('/consult') }}" class="btn-primary">Book a CFO Advisory Session</a>
        </div>
    </div>
</section>

<!-- AP Management -->
<section class="service-details">
    <div id="ap-management" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image3.png') }}" alt="AP Management">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/reduction.svg') }}" alt="Icon">
                <span><strong>Reduction in Late Payments</strong><br><small>with AP Automation</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr2.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Accounts Payable (AP) Management</strong></h2>
            <p>Ensure bills are paid on time with efficient AP processing. Our automation reduces late payment risks and streamlines your vendor relationships.</p>
            <a href="{{ url('/consult') }}" class="btn-primary">Speak with an AP Specialist</a>
        </div>
    </div>
</section>

<!-- AR & Billing -->
<section class="service-details alt">
    <div id="ar-billing" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image4.png') }}" alt="AR & Billing Services">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/faster.svg') }}" alt="Icon">
                <span><strong>Faster Invoice Collection</strong><br><small>with AR Automation</small></span>
            </div>
            <div class="finance-badge top-left">
                <img src="{{ asset('images/finance/tl2.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Accounts Receivable (AR) & Billing Services</strong></h2>
            <p>Speed up payments and improve cash flow through automated invoicing, payment tracking, and collections.</p>
            <a href="{{ url('/consult') }}" class="btn-primary">Book an AR Strategy Call</a>
        </div>
    </div>
</section>

<!-- Tax Compliance -->
<section class="service-details">
    <div id="tax-compliance" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
        <div class="finance-image-wrapper">
            <img src="{{ asset('images/finance/image5.png') }}" alt="Tax Compliance">
            <div class="finance-badge">
                <img src="{{ asset('images/finance/tax.svg') }}" alt="Icon">
                <span><strong>Tax Error Reduction</strong><br><small>with Professional Outsourcing</small></span>
            </div>
            <div class="finance-badge top-right">
                <img src="{{ asset('images/finance/tr3.svg') }}" alt="Icon">
            </div>
        </div>
        <div class="finance-content">
            <h2><strong>Tax Preparation & Compliance</strong></h2>
            <p>Ensure hassle-free compliance with corporate tax filing, VAT/GST reporting, and adherence to regulations.</p>
            <a href="{{ url('/consult') }}" class="btn-primary">Schedule a Tax Consultation</a>
        </div>
    </div>
</section>

@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer')
<script>
    document.querySelectorAll('.feature-box').forEach(featureBox => {
        featureBox.addEventListener('click', () => {
            const target = document.querySelector(featureBox.getAttribute('data-target'));
            if (target) {
                const y = target.getBoundingClientRect().top + window.scrollY - 180; // 180px earlier
                window.scrollTo({
                    top: y,
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

@endsection