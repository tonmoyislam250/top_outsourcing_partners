@extends('layouts.app')

@section('title', 'HR & Payroll Services - Top Outsourcing Partners | Complete Human Resource Solutions')
@section('meta_description', 'Streamline your HR operations with Top Outsourcing Partners comprehensive HR and payroll services. From employee management and payroll processing to compliance and benefits administration - focus on your core business while we handle your HR needs.')
@section('meta_keywords', 'HR outsourcing, payroll services, human resource management, employee management, payroll processing, HR compliance, benefits administration, workforce management, HR solutions')

@section('content')

<section class="section finance-section">
	<div class="container">
		<div class="finance-header animate__animated animate__fadeInDown">
			<img src="{{ asset('images/hr/hr.svg') }}" alt="AI Icon" class="section-icon">
			<h1>HR & Payroll Services</h1>
		</div>
	</div>
</section>

<section class="services-cards">
	<!-- Service Cards Grid -->
	<div class="container services-grid">
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-1s" data-target="#payroll">
			<img src="{{ asset('images/hr/frame1.svg') }}" alt="analytics">
			<h4>Payroll Management Services</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-1s" data-target="#benefits">
			<img src="{{ asset('images/hr/frame2.svg') }}" alt="chatbot">
			<h4>Employee Benefits Administration</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-1s" data-target="#recruitment">
			<img src="{{ asset('images/hr/frame3.svg') }}" alt="predictive">
			<h4>Recruitment & Talent Acquisition</h4>
		</div>
		<div class="feature-box custom-left animate__animated animate__fadeInUp animate__delay-2s" data-target="#compliance">
			<img src="{{ asset('images/hr/frame4.svg') }}" alt="automation">
			<h4>HR Outsourcing & Compliance Management</h4>
		</div>
		<div class="feature-box custom-left animate__animated animate__fadeInUp animate__delay-2s" data-target="#automation">
			<img src="{{ asset('images/hr/frame5.svg') }}" alt="workflow">
			<h4>Workforce Management & HR Automation</h4>
		</div>
	</div>
</section>
<section class="service-details">
	<div id="payroll" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/hr/image1.png') }}" alt="Bookkeeping">
			<div class="finance-badge">
				<img src="{{ asset('images/hr/time.svg') }}" alt="Icon">
				<span><b>Time Saved</b><br><small><b>by Automating Payroll Management</b></small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/hr/tr1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Payroll Management Services</b></h2>
			<p style="text-align: left;">Ensure accurate, on-time payroll processing, tax calculations, and compliance with
				local and international labor laws. We handle salary disbursement, deductions, and
				reporting seamlessly.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Talk to a Payroll Specialist</a>
		</div>
	</div>
</section>
<section class="service-details alt">
	<div id="benefits" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/hr/image2.png') }}" alt="CFO Services">
			<div class="finance-badge">
				<img src="{{ asset('images/hr/rate.svg') }}" alt="Icon">
				<span><b>Employee Retention Rate</b><br><small><b>with Structured Benefits Plans</b></small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/hr/tl1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Employee Benefits Administration</b></h2>
			<p style="text-align: left;">Manage employee benefits, health insurance, leave policies, and retirement plans
				effortlessly, ensuring compliance with global labor laws and company policies.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book a Benefits Strategy Call</a>
		</div>
	</div>
</section>
<section class="service-details">
	<div id="recruitment" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/hr/image3.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/hr/hire.svg') }}" alt="Icon">
				<span><b>Hiring Efficiency</b><br><small><b>After Outsourcing Recruitment</b></small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/hr/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Recruitment & Talent Acquisition</b></h2>
			<p style="text-align: left;">Find and hire the best talent globally with data-driven recruitment strategies, candidate screening, and interview management to ensure the perfect fit for your business needs.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Hiring Consultation</a>
		</div>
	</div>
</section>
<section class="service-details alt">
	<div id="compliance" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/hr/image4.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/hr/reduct.svg') }}" alt="Icon">
				<span><b>Reduction in HR Legal Risks</b><br><small><b>After Outsourcing Compliance</b></small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/hr/tl2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>HR Outsourcing & Compliance Management</b></h2>
			<p style="text-align: left;">Ensure HR operations align with legal standards by outsourcing policy creation, labor
				law compliance, contract management, and workplace issue resolution to experts.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule an HR Consultation</a>
		</div>
	</div>
</section>
<section class="service-details">
	<div id="automation" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/hr/image5.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/hr/gains.svg') }}" alt="Icon">
				<span><b>Efficiency Gains</b><br><small><b>with HR Process Automation</b></small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/hr/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Workforce Management & HR Automation</b></h2>
			<p style="text-align: left;">Boost productivity with AI-driven HR solutions for employee scheduling, attendance
				tracking, and performance management, ensuring efficiency and transparency.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule an HR Automation Consultation</a>
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