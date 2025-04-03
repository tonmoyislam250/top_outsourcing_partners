@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/manager.css') }}">

@section('content')
<!-- Hero Section -->
<section class="hero-managerial">
    <div class="container hero-flex">
        <div class="hero-text">
            <h1>Global Workforce, Hassle-Free - Build Your Dedicated Team Today!</h1>
            <p>Focus on your business while we manage your dedicated offshore team.</p>
            <button onclick="window.location.href='/consult'">Build the Dedicated Team Now!</button>
        </div>
        <div class="hero-managerial-img">
            <img src="{{ asset('images/manager/hero.png') }}" alt="Team Illustration" class="hero-img">
        </div>
    </div>
</section>

<style>
    .hero-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .hero-text {
        max-width: 50%;
    }
    .hero-managerial-img {
        max-width: 45%;
    }
    .hero-img {
        width: 100%;
        height: auto;
    }
</style>

<!-- Why Choose Us Section -->
<section class="why-choose">
  <div class="container">
    <h2 style="font-weight: bold; font-size: 30px;">Why Choose Our Employee Managerial Service?</h2>
    <div class="features-grid">
      <div class="feature-item">
        <img src="{{ asset('images/manager/image1.png') }}" alt="Dedicated Team" style="width: 80%; height: auto;">
        <h3 style="font-weight: bold; text-align: left;">A Dedicated Team That Works Only for You</h3>
        <ul style="text-align: left;">
          <li>No shared resources—your team is 100% dedicated to your company.</li>
          <li>Seamless integration with your operations, culture, and work processes.</li>
        </ul>
      </div>
      <div class="feature-item">
        <img src="{{ asset('images/manager/image2.png') }}" alt="Cost Saving" style="width: 80%; height: auto;">
        <h3 style="font-weight: bold; text-align: left;">Massive Cost Saving Without Compromising Quality</h3>
        <ul style="text-align: left;">
          <li>Lower hiring costs compared to the USA, UK, Canada, and other high-wage countries.</li>
          <li>No need for a local entity—we handle everything, from salaries to benefits.</li>
        </ul>
      </div>
    </div>
    <div class="features-grid">
      <div class="feature-item">
        <img src="{{ asset('images/manager/image3.png') }}" alt="No Obligation" style="width: 100%; height: auto;">
        <h3 style="font-weight: bold; text-align: left;">No Obligation, No Problem!</h3>
        <ul style="text-align: left;">
          <li>You don't need to set up a physical office in Bangladesh.</li>
          <li>We take care of all employment logistics, so you stay focused on your business.</li>
        </ul>
      </div>
      <div class="feature-item">
        <img src="{{ asset('images/manager/image4.png') }}" alt="Guaranteed Productivity" style="width: 100%; height: auto;">
        <h3 style="font-weight: bold; text-align: left;">Guaranteed Workforce Continuity - No Disruption</h3>
        <ul style="text-align: left;">
          <li>If an employee resigns, we immediately replace them with a top-tier professional.</li>
          <li>No recruitment headaches—we ensure seamless transitions and onboarding.</li>
        </ul>
      </div>
      <div class="feature-item">
        <img src="{{ asset('images/manager/image5.png') }}" alt="Flexible Hiring Options" style="width: 100%; height: auto;">
        <h3 style="font-weight: bold; text-align: left;">Flexible Hiring Options</h3>
        <ul style="text-align: left;">
          <li>Hire full-time, part-time, or project-based employees based on your needs.</li>
          <li>Scale your team up or down as your business evolves.</li>
        </ul>
      </div>
    </div>
  </div>
</section>


<section class="enhancements">
  <div class="container">
    <h2>New Enhancements to Maximize Your Experience!</h2>

    <div class="enhancement-grid">
      <!-- Enhancement 1 -->
      <div class="enhancement-card" style="flex: 1; padding: 20px; box-sizing: border-box;">
        <img src="{{ asset('images/manager/en1.svg') }}" alt="Performance Monitoring" style="width: 80px; height: 80px; margin-bottom: 15px;">
        <div>
          <h3 style="text-align: left; font-weight: bold;">Dedicated Team Performance Monitoring & Reporting</h3>
          <ul style="text-align: left;">
            <li>Get weekly/monthly performance reports with key metrics and insights.</li>
            <li>Access a real-time dashboard to monitor productivity and employee progress.</li>
            <li>Work with a dedicated account manager for continuous optimization and team support.</li>
          </ul>
        </div>
      </div>

      <!-- Enhancement 2 -->
      <div class="enhancement-card" style="flex: 1; padding: 20px; box-sizing: border-box;">
        <img src="{{ asset('images/manager/en2.svg') }}" alt="Legal Compliance" style="width: 80px; height: 80px; margin-bottom: 15px;">
        <div>
          <h3 style="text-align: left; font-weight: bold;">Legal & Compliance Advisory for Overseas Companies</h3>
          <ul style="text-align: left;">
            <li>Expert guidance on employment laws, tax implications, and workforce regulations in Bangladesh.</li>
            <li>Full support on contract structuring, legal documentation, and risk assessment.</li>
            <li>Compliance with international labor standards (GDPR, local tax laws, corporate policies).</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="enhancement-grid">
      <!-- Enhancement 3 -->
      <div class="enhancement-card" style="flex: 1; padding: 20px; box-sizing: border-box;">
        <img src="{{ asset('images/manager/en3.svg') }}" alt="Workforce Training" style="width: 80px; height: 80px; margin-bottom: 15px;">
        <div>
          <h3 style="text-align: left; font-weight: bold;">Specialized Workforce Training & Upskilling Programs</h3>
          <ul style="text-align: left;">
            <li>Industry-specific training to keep your team updated on trends and best practices.</li>
            <li>Cultural and language training for employees working with international clients.</li>
            <li>Regular upskilling programs and certifications to enhance employee expertise and job performance.</li>
          </ul>
        </div>
      </div>

      <!-- Enhancement 4 -->
      <div class="enhancement-card" style="flex: 1; padding: 20px; box-sizing: border-box;">
        <img src="{{ asset('images/manager/en4.svg') }}" alt="Client Branding" style="width: 80px; height: 80px; margin-bottom: 15px;">
        <div>
          <h3 style="text-align: left; font-weight: bold;">Client–Branded Workspaces & Team Integration</h3>
          <ul style="text-align: left;">
            <li>Custom business email domains, video conferencing setup, and branding for seamless integration.</li>
            <li>Employees work under your company identity, ensuring brand consistency.</li>
            <li>Option to visit your team onsite or hold team-building events with direct involvement.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="how-it-works">
  <div class="container">
    <h2 style="font-weight: bold;">How It Works - Simple, Fast, & Hassle-Free!</h2>

    <div class="steps-wrapper">
      <!-- Step 1 -->
      <div class="step-box">
        <div class="step-icon purple">
          <img src="{{ asset('images/manager/step1.svg') }}" alt="Step 1">
        </div>
        <div class="step-content">
          <h3 style="font-weight: bold; text-align: left;">Tell Us What You Need</h3>
          <ul>
            <li>Define the roles, skills, and number of employees you require.</li>
            <li>We customize your dedicated team based on your exact needs.</li>
          </ul>
        </div>
      </div>

      <!-- Connector -->
      <div class="connector purple-line"></div>

      <!-- Step 2 -->
      <div class="step-box">
        <div class="step-icon green">
          <img src="{{ asset('images/manager/step2.svg') }}" alt="Step 2">
        </div>
        <div class="step-content">
          <h3 style="font-weight: bold; text-align: left;">We Recruit & Onboard the Best Talent</h3>
          <ul>
            <li>Our hiring experts find, screen, and onboard top-tier professionals.</li>
            <li>Every hire is vetted to match your company culture and work ethic.</li>
          </ul>
        </div>
      </div>

      <!-- Connector -->
      <div class="connector green-line"></div>

      <!-- Step 3 -->
      <div class="step-box">
        <div class="step-icon maroon">
          <img src="{{ asset('images/manager/step3.svg') }}" alt="Step 3">
        </div>
        <div class="step-content">
          <h3 style="font-weight: bold; text-align: left;">Your Team Starts Working for You</h3>
          <ul>
            <li>We handle all HR, payroll, and administrative tasks.</li>
            <li>Your dedicated team reports directly to you while we ensure smooth operations.</li>
          </ul>
        </div>
      </div>

      <!-- Connector -->
      <div class="connector maroon-line"></div>

      <!-- Step 4 -->
      <div class="step-box">
        <div class="step-icon blue">
          <img src="{{ asset('images/manager/step4.svg') }}" alt="Step 4">
        </div>
        <div class="step-content">
          <h3 style="font-weight: bold; text-align: left;">Continuous Management & Support</h3>
          <ul>
            <li>Need to scale up or replace a team member? We handle it instantly!</li>
            <li>We manage performance, training, and issue resolution, so you don’t have to.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="who-benefit">
  <div class="container">
    <h2>Who Can Benefit?</h2>

    <div class="benefit-grid">
      <div class="benefit-card">
        <img src="{{ asset('images/manager/ben1.svg') }}" alt="Tech & IT">
        <div>
          <h3 style="font-weight: bold; text-align: left;">Tech & IT Companies</h3>
          <p>Hire dedicated software engineers, developers, and support staff.</p>
        </div>
      </div>

      <div class="benefit-card">
        <img src="{{ asset('images/manager/ben2.svg') }}" alt="Accounting">
        <div>
          <h3 style="font-weight: bold; text-align: left;">Accounting & Finance Firms</h3>
          <p>Hire dedicated software engineers, developers, and support staff.</p>
        </div>
      </div>

      <div class="benefit-card">
        <img src="{{ asset('images/manager/ben3.svg') }}" alt="Call Centers">
        <div>
          <h3 style="font-weight: bold; text-align: left;">Call Centers & Customer Support</h3>
          <p>Get cost-effective, multilingual 24/7 support.</p>
        </div>
      </div>

      <div class="benefit-card">
        <img src="{{ asset('images/manager/ben4.svg') }}" alt="E-commerce">
        <div>
          <h3 style="font-weight: bold; text-align: left;">E-commerce & Retail</h3>
          <p>Manage order processing, customer service, and inventory remotely.</p>
        </div>
      </div>

      <div class="benefit-card">
        <img src="{{ asset('images/manager/ben5.svg') }}" alt="Engineering">
        <div>
          <h3 style="font-weight: bold; text-align: left;">Engineering & Design Firms</h3>
          <p>Expand your workforce with CAD designers and architects.</p>
        </div>
      </div>

      <div class="benefit-card">
        <img src="{{ asset('images/manager/ben6.svg') }}" alt="Healthcare">
        <div>
          <h3 style="font-weight: bold; text-align: left;">Healthcare & Medical Support</h3>
          <p>Administrative, billing, and remote support teams.</p>
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
  <p style="font-size: 1.2rem; margin-bottom: 20px; color: white">Outsourcing is no longer just an option—it's a growth strategy for modern firms. Let Global Outsourcing Partners handle your accounting workload so you can focus on client success and firm growth.</p>
  <button onclick="window.location.href='/consult'" style="background-color: white; color: #007b8f; padding: 10px 20px; border: none; border-radius: 20px; font-size: 1rem; cursor: pointer;">Book a Free Financial Consultation</button>
</section>

@endsection
@section('footer')
    @include('components.footer') 
@endsection