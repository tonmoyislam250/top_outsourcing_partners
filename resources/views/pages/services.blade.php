@extends('layouts.app')
@section('content')
<section class="hero-section" style="padding: 50px 0; background: linear-gradient(to right, #f8f9fa, #e9ecef);">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
        <div class="hero-text" style="max-width: 50%; text-align: left;">
            <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 20px;">Top Outsourcing Partners: Unlock Your Business Potential</h1>
            <p style="font-size: 1.2rem; line-height: 1.8; margin-bottom: 20px;">
            At Top Outsourcing Partners, we empower businesses by providing industry-leading solutions in Accounting & Finance, AI Integration, Third-Party Business Support, Corporate Training, and HR & Payroll. Our dedicated experts optimize your operations, letting you focus on what truly matters—your growth.
            </p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/services/service1.png') }}" alt="Business Growth Illustration" style="width: 100%; max-width: 400px; filter: drop-shadow(0px 10px 15px rgba(100, 150, 255, 0.3));">
        </div>
    </div>
</section>
<!-- Accounting & Finance Solutions Section -->
<section class="service-section" style="padding: 50px 0; background-color: #f8f9fa;">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <div class="service-image" style="flex: 1; max-width: 45%; padding-right: 20px;">
            <img src="{{ asset('images/services/service2.png') }}" alt="Accounting & Finance Solutions" style="width: 90%; max-width: 350px; border-radius: 8px; display: block; margin: 0 auto;">
        </div>
        <div class="service-text" style="flex: 1; max-width: 50%; text-align: left;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 20px;">Accounting & Finance Solutions</h2>
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 20px;">
                Stay ahead of your finances with our comprehensive Accounting and Finance services—expertly designed to reduce overhead, maintain compliance, and provide actionable financial insights.
            </p>
            <ul style="list-style: disc; padding-left: 20px; margin-bottom: 30px;">
                <li style="margin-bottom: 10px;">Bookkeeping & Payroll Management</li>
                <li style="margin-bottom: 10px;">CFO Services (Virtual & On-Demand)</li>
                <li style="margin-bottom: 10px;">Accounts Payable & Receivable Management</li>
                <li style="margin-bottom: 10px;">Tax Preparation & Compliance</li>
                <li style="margin-bottom: 10px;">Financial Reporting & Analysis</li>
            </ul>
            <a href="{{ url('services/finance') }}" class="btn" style="background-color: #000; color: #fff; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block;">Discover Our Accounting & Finance Solutions</a>
        </div>
    </div>
</section>

<!-- AI Integration & Digital Transformation Section -->
<section class="service-section" style="padding: 50px 0; background-color: #ffffff;">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <div class="service-text" style="flex: 1; max-width: 50%; text-align: left; padding-right: 20px;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 20px;">AI Integration & Digital Transformation</h2>
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 20px;">
                Integrate cutting-edge AI solutions to streamline operations, gain predictive insights, automate customer engagement, and fortify cybersecurity.
            </p>
            <ul style="list-style: disc; padding-left: 20px; margin-bottom: 30px;">
                <li style="margin-bottom: 10px;">AI-Powered Data Analytics</li>
                <li style="margin-bottom: 10px;">AI-Powered Chatbots & Customer Support</li>
                <li style="margin-bottom: 10px;">Predictive Business Intelligence</li>
                <li style="margin-bottom: 10px;">AI in Finance & Accounting Automation</li>
                <li style="margin-bottom: 10px;">AI-Driven Process Automation & Workflow</li>
                <li style="margin-bottom: 10px;">Optimization</li>
                <li style="margin-bottom: 10px;">AI-enhanced Cybersecurity</li>
            </ul>
            <a href="{{ url('services/ai-integration') }}" class="btn" style="background-color: #000; color: #fff; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block;">Explore Our AI Integration Services</a>
        </div>
        <div class="service-image" style="flex: 1; max-width: 45%;">
            <img src="{{ asset('images/services/service3.png') }}" alt="AI Integration & Digital Transformation" style="width: 90%; max-width: 350px; border-radius: 8px; display: block; margin: 0 auto;">
        </div>
    </div>
</section>
<!-- Third-Party Business Support Section -->
<section class="service-section" style="padding: 50px 0; background-color: #f8f9fa;">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <div class="service-image" style="flex: 1; max-width: 45%; padding-right: 20px;">
            <img src="{{ asset('images/services/service4.png') }}" alt="Third-Party Business Support" style="width: 90%; max-width: 350px; border-radius: 8px; display: block; margin: 0 auto;">
        </div>
        <div class="service-text" style="flex: 1; max-width: 50%; text-align: left;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 20px;">Third-Party Business Support</h2>
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 20px;">
                From HR and legal to marketing and customer support, leverage our extensive third-party services to reduce workload, boost efficiency, and maximize your strategic focus.
            </p>
            <ul style="list-style: disc; padding-left: 20px; margin-bottom: 30px;">
                <li style="margin-bottom: 10px;">Human Resource Outsourcing (HRO)</li>
                <li style="margin-bottom: 10px;">Legal & Compliance Assistance (LPO)</li>
                <li style="margin-bottom: 10px;">Digital Marketing & Brand Management</li>
                <li style="margin-bottom: 10px;">Administrative & Data Management Support</li>
                <li style="margin-bottom: 10px;">E-commerce & Marketplace Operations</li>
            </ul>
            <a href="{{ url('services/third-party') }}" class="btn" style="background-color: #000; color: #fff; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block;">See Our Third-Party Business Support</a>
        </div>
    </div>
</section>

<!-- Corporate Training & Development Section -->
<section class="service-section" style="padding: 50px 0; background-color: #ffffff;">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <div class="service-text" style="flex: 1; max-width: 50%; text-align: left; padding-right: 20px;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 20px;">Corporate Training & Development</h2>
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 20px;">
                Invest in your greatest asset—your workforce. Equip your employees with critical skills through customized training programs delivered by industry experts.
            </p>
            <ul style="list-style: disc; padding-left: 20px; margin-bottom: 30px;">
                <li style="margin-bottom: 10px;">Executive Leadership Coaching</li>
                <li style="margin-bottom: 10px;">Industry-specific Compliance & Legal Training</li>
                <li style="margin-bottom: 10px;">Corporate Wellness & Productivity Workshops</li>
                <li style="margin-bottom: 10px;">Cybersecurity & Data Protection Training</li>
                <li style="margin-bottom: 10px;">Sales & Negotiation Mastery Courses</li>
            </ul>
            <a href="{{ url('services/corporate-training') }}" class="btn" style="background-color: #000; color: #fff; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block;">View Our Corporate Training Programs</a>
        </div>
        <div class="service-image" style="flex: 1; max-width: 45%;">
            <img src="{{ asset('images/services/service5.png') }}" alt="Corporate Training & Development" style="width: 90%; max-width: 350px; border-radius: 8px; display: block; margin: 0 auto;">
        </div>
    </div>
</section>
<!-- HR & Payroll Solutions Section -->
<section class="service-section" style="padding: 50px 0; background-color: #f8f9fa;">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
        <div class="service-image" style="flex: 1; max-width: 45%; padding-right: 20px;">
            {{-- Assuming service6.png corresponds to the HR & Payroll image --}}
            <img src="{{ asset('images/services/service6.png') }}" alt="HR & Payroll Solutions" style="width: 90%; max-width: 350px; border-radius: 8px; display: block; margin: 0 auto;">
        </div>
        <div class="service-text" style="flex: 1; max-width: 50%; text-align: left;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 20px;">HR & Payroll Solutions</h2>
            <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 20px;">
                Streamline your HR processes, from payroll and talent acquisition to employee benefits and regulatory compliance, letting you focus on core business objectives.
            </p>
            <ul style="list-style: disc; padding-left: 20px; margin-bottom: 30px;">
                <li style="margin-bottom: 10px;">Comprehensive Payroll Management</li>
                <li style="margin-bottom: 10px;">Recruitment & Talent Retention</li>
                <li style="margin-bottom: 10px;">Benefits & Compensation Administration</li>
                <li style="margin-bottom: 10px;">Remote and Global Workforce Solutions</li>
            </ul>
            <a href="{{ url('services/hr-pay') }}" class="btn" style="background-color: #000; color: #fff; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; display: inline-block;">Discover Our HR & Payroll Services</a>
        </div>
    </div>
</section>

<!-- Why Choose Top Outsourcing Partners Section -->
<section class="why-choose-section" style="padding: 50px 0; background-color: #ffffff; text-align: center;">
    <div class="container">
        <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 50px;">Why Choose Top Outsourcing Partners</h2>
        <div class="features-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 40px;">
            {{-- Row 1: 3 Features --}}
            <div class="feature-item" style="flex-basis: calc(30% - 40px); max-width: 260px;">
                <div style="background-color: #e0f7e0; border-radius: 50%; width: 80px; height: 80px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/services/ser1.svg') }}" alt="Cost Efficiency Icon" style="width: 40px; height: 40px;">
                </div>
                <h3 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 10px;">Cost Efficiency</h3>
                <p style="font-size: 1rem; line-height: 1.5;">Achieve up to 50% cost reduction compared to in-house teams.</p>
            </div>
            <div class="feature-item" style="flex-basis: calc(30% - 40px); max-width: 260px;">
                <div style="background-color: #fff9e0; border-radius: 50%; width: 80px; height: 80px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/services/ser2.svg') }}" alt="Scalability Icon" style="width: 40px; height: 40px;">
                </div>
                <h3 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 10px;">Scalability</h3>
                <p style="font-size: 1rem; line-height: 1.5;">Effortlessly scale your services up or down based on your evolving needs.</p>
            </div>
            <div class="feature-item" style="flex-basis: calc(30% - 40px); max-width: 260px;">
                <div style="background-color: #e0f2ff; border-radius: 50%; width: 80px; height: 80px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/services/ser3.svg') }}" alt="Quality Assurance Icon" style="width: 40px; height: 40px;">
                </div>
                <h3 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 10px;">Quality Assurance</h3>
                <p style="font-size: 1rem; line-height: 1.5;">Committed to international standards and regulatory compliance.</p>
            </div>
        </div>
        <div class="features-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 40px; margin-top: 30px;">
            {{-- Row 2: 2 Features --}}
            <div class="feature-item" style="flex-basis: calc(30% - 40px); max-width: 260px;">
                <div style="background-color: #ffe0f0; border-radius: 50%; width: 80px; height: 80px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/services/ser4.svg') }}" alt="Dedicated Expertise Icon" style="width: 40px; height: 40px;">
                </div>
                <h3 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 10px;">Dedicated Expertise</h3>
                <p style="font-size: 1rem; line-height: 1.5;">Access specialized skills without the overhead.</p>
            </div>
            <div class="feature-item" style="flex-basis: calc(30% - 40px); max-width: 260px;">
                <div style="background-color: #ffeae0; border-radius: 50%; width: 80px; height: 80px; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('images/services/ser5.svg') }}" alt="Technology Driven Icon" style="width: 40px; height: 40px;">
                </div>
                <h3 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 10px;">Technology Driven</h3>
                <p style="font-size: 1rem; line-height: 1.5;">Leverage AI-driven insights and automated workflows for maximum efficiency.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section (Alternative Layout) -->
<section class="why-choose-us-alt" style="padding: 60px 0; background-color: #eaf2f8;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 15px;">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: bold; margin-bottom: 50px;">Why Choose Us?</h2>
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
            <!-- Image Column -->
            <div class="why-choose-image" style="flex: 1; max-width: 40%; text-align: left; padding-right: 30px; margin-bottom: 30px;">
                {{-- Make sure this image path is correct --}}
                <img src="{{ asset('images/services/why-choose-us-illustration.png') }}" alt="Why Choose Us Illustration" style="max-width: 100%; height: auto; max-height: 350px;">
            </div>

            <!-- Text Points Column -->
            <div class="why-choose-points" style="flex: 1; max-width: 55%;">
                <!-- Row 1 -->
                <div class="points-row" style="display: flex; justify-content: space-between; margin-bottom: 30px; flex-wrap: wrap; gap: 20px;">
                    <div class="point-item" style="flex: 1; min-width: calc(33% - 20px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Tailored Outsourcing Solutions</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">We understand that every business is unique, and we provide customized outsourcing solutions that meet your specific needs.</p>
                    </div>
                    <div class="point-item" style="flex: 1; min-width: calc(33% - 20px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Cost Efficiency</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">By outsourcing non-core activities to us, you can achieve significant cost savings while maintaining high-quality service.</p>
                    </div>
                    <div class="point-item" style="flex: 1; min-width: calc(33% - 20px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Expertise</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">Our team consists of highly skilled professionals with deep expertise in finance, HR, and other critical business functions.</p>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="points-row" style="display: flex; justify-content: flex-start; flex-wrap: wrap; gap: 20px;">
                     {{-- Using flex-start and gap for the second row with 2 items --}}
                    <div class="point-item" style="flex: 1; min-width: calc(50% - 20px); max-width: calc(50% - 10px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Global Presence</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">With experience serving clients in North America, Europe, Asia, and Africa, we understand the intricacies of global markets and offer region-specific solutions.</p>
                    </div>
                    <div class="point-item" style="flex: 1; min-width: calc(50% - 20px); max-width: calc(50% - 10px); text-align: left;">
                        <h3 style="font-size: 1.3rem; font-weight: bold; margin-bottom: 10px;">Proven Track Record</h3>
                        <p style="font-size: 1rem; line-height: 1.6; color: #555;">We have successfully worked with leading organizations across diverse industries, helping them improve efficiency and grow sustainably.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-bangladesh">
  <div class="container">
    <h2 style="font-weight: bold;">Why Bangladesh? A Smart Business Decision!</h2>

    <div class="bangladesh-wrapper">
      <img src="{{ asset('images/manager/map.png') }}" alt="Bangladesh Map" class="map-img" style="width: 30%; height: 30%;">

    <div class="bangladesh-points" style="text-align: left;">
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

<!-- Call to Action -->
<section class="cta" style="background-color: #007b8f; padding: 20px 40px; text-align: center; color: white; margin: 0; ">
  <h2 style="font-size: 2rem; margin-bottom: 15px; font-weight: bold;">Let’s Work Together!</h2>
  <p style="margin-bottom: 20px; color: white;">Outsourcing is no longer just an option—it's a growth strategy for modern firms. Let Top Outsourcing Partners handle your accounting workload so you can focus on client success and firm growth.</p>
  <button onclick="window.location.href='/consult'" style="background-color: black; color: white; padding: 10px 20px; border: none; border-radius: 20px; font-size: 1rem; cursor: pointer;">Book a Free Financial Consultation</button>
</section>

@endsection
@section('footer')
    @include('components.footer') 
@endsection