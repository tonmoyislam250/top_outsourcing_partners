@extends('layouts.app')

@section('title', 'Services - Top Outsourcing Partners | Complete Business Outsourcing Solutions')
@section('meta_description', 'Explore our comprehensive outsourcing services at Top Outsourcing Partners. From accounting & finance to AI integration, corporate training, and third-party business support - discover tailored solutions that drive efficiency, reduce costs, and accelerate your business growth.')
@section('meta_keywords', 'outsourcing services, business solutions, accounting services, finance outsourcing, AI integration, corporate training, third-party support, business efficiency, cost reduction, scalable solutions')

@section('content')


<section class="services-page-section animate__animated animate__fadeIn">
    <div class="container services-page-container">
        <div class="hero hero-outsourcing">
            <div class="container hero-flex">
                <div class="row align-items-center">
                    <div class="col-md-7 order-2 order-md-1">
                        <div class="hero-text">
                            <h2>Top Outsourcing Partners: Unlock Your Business Potential</h2>
                            <p>At Top Outsourcing Partners, we empower businesses by providing industry-leading solutions in Accounting & Finance, AI Integration, Third-Party Business Support, Corporate Training, and HR & Payroll. Our dedicated experts optimize your operations, letting you focus on what truly matters—your growth.</p>
                        </div>
                    </div>

                    <div class="col-md-5 order-1 order-md-2">
                        <div class="hero-img-wrapper">
                            <img src="{{ asset('images/services/service1.webp') }}" alt="Business Growth Illustration" class="hero-img img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-title">
            <h2>Explore Our Core Services</h2>
        </div>
    </div>
</section>





<!-- Accounting & Finance Solutions Section -->
<section class="service-section animate__animated animate__fadeInUp bg-alt">
    <div class="container service-container">
        <div class="service-image animate__animated animate__zoomIn">
            <img src="{{ asset('images/services/service2.webp') }}" alt="Accounting & Finance Solutions">
        </div>
        <div class="service-text animate__animated animate__fadeInLeft">
            <h2>Accounting & Finance Solutions</h2>
            <p>
                Stay ahead of your finances with our comprehensive Accounting and Finance services—expertly designed to reduce overhead, maintain compliance, and provide actionable financial insights.
            </p>
            <ul>
                <li>Bookkeeping & Payroll Management</li>
                <li>CFO Services (Virtual & On-Demand)</li>
                <li>Accounts Payable & Receivable Management</li>
                <li>Tax Preparation & Compliance</li>
                <li>Financial Reporting & Analysis</li>
            </ul>
            <a href="{{ url('services/finance') }}" class="btn-primary">Discover Our Accounting & Finance Solutions</a>
        </div>
    </div>
</section>

<!-- AI Integration & Digital Transformation Section -->
<section class="service-section animate__animated animate__fadeInUp">
    <div class="container service-container reverse">
        <div class="service-text animate__animated animate__fadeInLeft">
            <h2>AI Integration & Digital Transformation</h2>
            <p>
                Integrate cutting-edge AI solutions to streamline operations, gain predictive insights, automate customer engagement, and fortify cybersecurity.
            </p>
            <ul>
                <li>AI-Powered Data Analytics</li>
                <li>AI-Powered Chatbots & Customer Support</li>
                <li>Predictive Business Intelligence</li>
                <li>AI in Finance & Accounting Automation</li>
                <li>AI-Driven Process Automation & Workflow</li>
                <li>Optimization</li>
                <li>AI-enhanced Cybersecurity</li>
            </ul>
            <a href="{{ url('services/ai-integration') }}" class="btn-primary">Explore Our AI Integration Services</a>
        </div>
        <div class="service-image animate__animated animate__zoomIn">
            <img src="{{ asset('images/services/service3.webp') }}" alt="AI Integration & Digital Transformation">
        </div>
    </div>
</section>

<!-- Third-Party Business Support Section -->
<section class="service-section animate__animated animate__fadeInUp bg-alt">
    <div class="container service-container">
        <div class="service-image animate__animated animate__zoomIn">
            <img src="{{ asset('images/services/service4.webp') }}" alt="Third-Party Business Support">
        </div>
        <div class="service-text animate__animated animate__fadeInLeft">
            <h2>Third-Party Business Support</h2>
            <p>
                From HR and legal to marketing and customer support, leverage our extensive third-party services to reduce workload, boost efficiency, and maximize your strategic focus.
            </p>
            <ul>
                <li>Human Resource Outsourcing (HRO)</li>
                <li>Legal & Compliance Assistance (LPO)</li>
                <li>Digital Marketing & Brand Management</li>
                <li>Administrative & Data Management Support</li>
                <li>E-commerce & Marketplace Operations</li>
            </ul>
            <a href="{{ url('services/third-party') }}" class="btn-primary">See Our Third-Party Business Support</a>
        </div>
    </div>
</section>

<!-- Corporate Training & Development Section -->
<section class="service-section animate__animated animate__fadeInUp">
    <div class="container service-container reverse">
        <div class="service-text animate__animated animate__fadeInLeft">
            <h2>Corporate Training & Development</h2>
            <p>
                Invest in your greatest asset—your workforce. Equip your employees with critical skills through customized training programs delivered by industry experts.
            </p>
            <ul>
                <li>Executive Leadership Coaching</li>
                <li>Industry-specific Compliance & Legal Training</li>
                <li>Corporate Wellness & Productivity Workshops</li>
                <li>Cybersecurity & Data Protection Training</li>
                <li>Sales & Negotiation Mastery Courses</li>
            </ul>
            <a href="{{ url('services/corporate-training') }}" class="btn-primary">View Our Corporate Training Programs</a>
        </div>
        <div class="service-image animate__animated animate__zoomIn">
            <img src="{{ asset('images/services/service5.webp') }}" alt="Corporate Training & Development">
        </div>
    </div>
</section>

<!-- HR & Payroll Solutions Section -->
<section class="service-section animate__animated animate__fadeInUp bg-alt">
    <div class="container service-container">
        <div class="service-image animate__animated animate__zoomIn">
            <img src="{{ asset('images/services/service6.webp') }}" alt="HR & Payroll Solutions">
        </div>
        <div class="service-text animate__animated animate__fadeInLeft">
            <h2>HR & Payroll Solutions</h2>
            <p>
                Streamline your HR processes, from payroll and talent acquisition to employee benefits and regulatory compliance, letting you focus on core business objectives.
            </p>
            <ul>
                <li>Comprehensive Payroll Management</li>
                <li>Recruitment & Talent Retention</li>
                <li>Benefits & Compensation Administration</li>
                <li>Remote and Global Workforce Solutions</li>
            </ul>
            <a href="{{ url('services/hr-pay') }}" class="btn-primary">Discover Our HR & Payroll Services</a>
        </div>
    </div>
</section>

<!-- Why Choose Top Outsourcing Partners Section -->
<section class="features-section animate__animated animate__fadeInUp">
    <div class="container">
        <h2>Why Choose Top Outsourcing Partners</h2>
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon" style="background-color: #e0f7e0;">
                    <img src="{{ asset('images/services/ser1.svg') }}" alt="Cost Efficiency Icon">
                </div>
                <h3>Cost Efficiency</h3>
                <p>Achieve up to 50% cost reduction compared to in-house teams.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon" style="background-color: #fff9e0;">
                    <img src="{{ asset('images/services/ser2.svg') }}" alt="Scalability Icon">
                </div>
                <h3>Scalability</h3>
                <p>Effortlessly scale your services up or down based on your evolving needs.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon" style="background-color: #e0f2ff;">
                    <img src="{{ asset('images/services/ser3.svg') }}" alt="Quality Assurance Icon">
                </div>
                <h3>Quality Assurance</h3>
                <p>Committed to international standards and regulatory compliance.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon" style="background-color: #ffe0f0;">
                    <img src="{{ asset('images/services/ser4.svg') }}" alt="Dedicated Expertise Icon">
                </div>
                <h3>Dedicated Expertise</h3>
                <p>Access specialized skills without the overhead.</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon" style="background-color: #ffeae0;">
                    <img src="{{ asset('images/services/ser5.svg') }}" alt="Technology Driven Icon">
                </div>
                <h3>Technology Driven</h3>
                <p>Leverage AI-driven insights and automated workflows for maximum efficiency.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section (Alternative Layout) -->
<section class="why-choose-us-alt animate__animated animate__fadeInUp">
    <div class="container">
        <h2 class="why-choose-title">Why Choose Us?</h2>
        <div class="why-choose-flex">
            <div class="why-choose-points">
                <div class="points-row">
                    <div class="point-item">
                        <h3>Tailored Outsourcing Solutions</h3>
                        <p>We understand that every business is unique, and we provide customized outsourcing solutions that meet your specific needs.</p>
                    </div>
                    <div class="point-item">
                        <h3>Cost Efficiency</h3>
                        <p>By outsourcing non-core activities to us, you can achieve significant cost savings while maintaining high-quality service.</p>
                    </div>
                    <div class="point-item">
                        <h3>Expertise</h3>
                        <p>Our team consists of highly skilled professionals with deep expertise in finance, HR, and other critical business functions.</p>
                    </div>
                </div>
                <div class="points-row">
                    <div class="point-item">
                        <div class="why-choose-image">
                            <img src="{{ asset('images/services/why-choose-us-illustration.webp') }}" alt="Why Choose Us Illustration">
                        </div>
                    </div>
                    <div class="point-item">
                        <h3>Global Presence</h3>
                        <p>With experience serving clients in North America, Europe, Asia, and Africa, we understand the intricacies of global markets and offer region-specific solutions.</p>
                    </div>
                    <div class="point-item">
                        <h3>Proven Track Record</h3>
                        <p>We have successfully worked with leading organizations across diverse industries, helping them improve efficiency and grow sustainably.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-bangladesh animate__animated animate__fadeInUp">
    <div class="container bangladesh-container">
        <h2>Why Bangladesh? A Smart Business Decision!</h2>
        <div class="bangladesh-wrapper">
            <img src="{{ asset('images/manager/map.webp') }}" alt="Bangladesh Map" class="map-img">
            <div class="bangladesh-points">
                <ul>
                    <li><strong>Save up to 70%</strong> compared to hiring locally in the US, UK, or Canada.</li>
                    <li>Highly skilled professionals with <strong>strong industry expertise.</strong></li>
                    <li><strong>Cultural adaptability</strong> & fluent English-speaking workforce.</li>
                    <li><strong>Time zone advantage</strong>—collaborate in real-time with US, UK, and European business hours.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="cta-2 animate__animated animate__fadeInUp">
    <h2>Let's Work Together!</h2>
    <p>Outsourcing is no longer just an option—it's a growth strategy for modern firms. Let Top Outsourcing Partners handle your accounting workload so you can focus on client success and firm growth.</p>
    <a class="btn-primary" href="{{ url('/consult') }}">Book a Free Financial Consultation</a>
</section>

@endsection
@section('footer')
@include('components.footer')
@endsection