@extends('layouts.app')

@section('title', 'Employee Managerial Services - Top Outsourcing Partners | Dedicated Global Workforce')
@section('meta_description', 'Build your dedicated global workforce with Top Outsourcing Partners employee managerial services. Get 100% dedicated teams, massive cost savings, seamless integration, and hassle-free team management for sustained business growth.')
@section('meta_keywords', 'employee managerial services, dedicated global workforce, dedicated teams, cost savings, team management, global workforce, offshore teams, workforce optimization, team integration')

<link rel="stylesheet" href="{{ asset('css/manager.css') }}">

@section('content')
<!-- Hero Section -->
<section class="services-page-section animate__animated animate__fadeIn">
	<div class="container services-page-container">
		<div class="hero hero-outsourcing">
			<div class="container hero-flex">
				<div class="row align-items-center">
					<div class="col-md-7 order-2 order-md-1">
						<div class="hero-text">
							<h2>Global Workforce, Hassle-Free - Build Your Dedicated Team Today!</h2>
							<p>Focus on your business while we manage your dedicated offshore team.</p>
							<a class="btn-primary" href="{{ url('/consult') }}">
								Discover How We Can Optimize Your Operations
							</a>
						</div>
					</div>

					<div class="col-md-5 order-1 order-md-2">
						<div class="hero-img-wrapper">
							<img src="{{ asset('images/manager/hero.png') }}" alt="Team Illustration" class="hero-img img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section section--why">
	<div class="container">
		<h2 class="section__title">Why Choose Our Employee Managerial Service?</h2>

		<div class="grid grid--2 features">
			<article class="feature">
				<img src="{{ asset('images/manager/image1.png') }}" alt="Dedicated team" class="feature__img">
				<h3 class="feature__title">A Dedicated Team That Works Only for You</h3>
				<ul class="list">
					<li>No shared resources—your team is 100% dedicated to your company.</li>
					<li>Seamless integration with your operations, culture, and work processes.</li>
				</ul>
			</article>

			<article class="feature">
				<img src="{{ asset('images/manager/image2.png') }}" alt="Cost savings" class="feature__img">
				<h3 class="feature__title">Massive Cost Saving Without Compromising Quality</h3>
				<ul class="list">
					<li>Lower hiring costs compared to the USA, UK, Canada, and other high-wage countries.</li>
					<li>No need for a local entity—we handle everything, from salaries to benefits.</li>
				</ul>
			</article>
		</div>

		<div class="grid grid--2 features">
			<article class="feature">
				<img src="{{ asset('images/manager/image3.png') }}" alt="No obligation" class="feature__img">
				<h3 class="feature__title">No Obligation, No Problem!</h3>
				<ul class="list">
					<li>You don't need to set up a physical office in Bangladesh.</li>
					<li>We take care of all employment logistics, so you stay focused on your business.</li>
				</ul>
			</article>

			<article class="feature">
				<img src="{{ asset('images/manager/image4.png') }}" alt="Productivity & continuity" class="feature__img">
				<h3 class="feature__title">Guaranteed Workforce Continuity — No Disruption</h3>
				<ul class="list">
					<li>If an employee resigns, we immediately replace them with a top-tier professional.</li>
					<li>No recruitment headaches—we ensure seamless transitions and onboarding.</li>
				</ul>
			</article>
		</div>

		<div class="features features--center">
			<article class="feature feature--solo">
				<img src="{{ asset('images/manager/image5.png') }}" alt="Flexible hiring" class="feature__img feature__img--solo">
				<h3 class="feature__title">Flexible Hiring Options</h3>
				<ul class="list">
					<li>Hire full-time, part-time, or project-based employees based on your needs.</li>
					<li>Scale your team up or down as your business evolves.</li>
				</ul>
			</article>
		</div>
	</div>
</section>

<section class="section section--enhancements">
	<div class="container">
		<h2 class="section__title">New Enhancements to Maximize Your Experience!</h2>

		<div class="grid grid--2 enhancements__grid">
			<article class="card enhancement">
				<div class="card__body">
					<img src="{{ asset('images/manager/en1.svg') }}" alt="Performance monitoring icon" class="card__icon">
					<h3 class="card__title">Dedicated Team Performance Monitoring & Reporting</h3>
				</div>
				<div class="enhancements__list">
					<ul class="list">
						<li>Weekly/monthly performance reports with key metrics and insights.</li>
						<li>Real-time dashboard to monitor productivity and progress.</li>
						<li>Dedicated account manager for continuous optimization and support.</li>
					</ul>
				</div>
			</article>

			<article class="card enhancement">
				<div class="card__body">
					<img src="{{ asset('images/manager/en2.svg') }}" alt="Legal & compliance icon" class="card__icon">
					<h3 class="card__title">Legal & Compliance Advisory for Overseas Companies</h3>
				</div>
				<div class="enhancements__list">
					<ul class="list">
						<li>Guidance on employment laws, tax implications, and regulations in Bangladesh.</li>
						<li>Contract structuring, documentation, and risk assessment support.</li>
						<li>Alignment with international standards (GDPR, local labor and tax laws).</li>
					</ul>
				</div>
			</article>
		</div>

		<div class="grid grid--2 enhancements__grid mt-32">
			<article class="card enhancement">
				<div class="card__body">
					<img src="{{ asset('images/manager/en3.svg') }}" alt="Training & upskilling icon" class="card__icon">
					<h3 class="card__title">Specialized Workforce Training & Upskilling Programs</h3>
				</div>
				<div class="enhancements__list">
					<ul class="list">
						<li>Industry-specific training aligned to trends and best practices.</li>
						<li>Cultural and language training for international collaboration.</li>
						<li>Regular upskilling, certifications, and performance improvements.</li>
					</ul>
				</div>
			</article>

			<article class="card enhancement">
				<div class="card__body">
					<img src="{{ asset('images/manager/en4.svg') }}" alt="Client branding icon" class="card__icon">
					<h3 class="card__title">Client-Branded Workspaces & Team Integration</h3>
				</div>
				<div class="enhancements__list">
					<ul class="list">
						<li>Custom email domains, video conferencing, and branded workspaces.</li>
						<li>Employees operate under your brand identity for consistency.</li>
						<li>Onsite visits and team-building with direct involvement options.</li>
					</ul>
				</div>
			</article>
		</div>
	</div>
</section>

<section class="section section--steps">
	<div class="container">
		<h2 class="section__title">How It Works — Simple, Fast, & Hassle-Free!</h2>

		<div class="timeline-items">
			<!-- 1 -->
			<div class="item left purple">
				<div class="item-header">
					<img src="{{ asset('images/manager/step1.svg') }}" alt="" />
				</div>
				<div class="item-content">
					<h3>Tell Us What You Need</h3>
					<ul>
						<li>Define the roles, skills, and number of employees you require.</li>
						<li>We customize your dedicated team based on your exact needs.</li>
					</ul>
				</div>
			</div>

			<!-- 2 -->
			<div class="item right green">
				<div class="item-header">
					<img src="{{ asset('images/manager/step2.svg') }}" alt="" />
				</div>
				<div class="item-content">
					<h3>We Recruit &amp; Onboard the Best Talent</h3>
					<ul>
						<li>Our hiring experts find, screen, and onboard top-tier professionals.</li>
						<li>Every hire is vetted to match your company culture and work ethic.</li>
					</ul>
				</div>
			</div>

			<!-- 3 -->
			<div class="item left purple">
				<div class="item-header">
					<img src="{{ asset('images/manager/step3.svg') }}" alt="" />
				</div>
				<div class="item-content">
					<h3>Your Team Starts Working for You</h3>
					<ul>
						<li>We handle all HR, payroll, and administrative tasks.</li>
						<li>Your dedicated team reports directly to you while we ensure smooth operations.</li>
					</ul>
				</div>
			</div>

			<!-- 4 -->
			<div class="item right green">
				<div class="item-header">
					<img src="{{ asset('images/manager/step4.svg') }}" alt="" />
				</div>
				<div class="item-content">
					<h3>Continuous Management &amp; Support</h3>
					<ul>
						<li>Need to scale up or replace a team member? We handle it instantly!</li>
						<li>We manage performance, training, and issue resolution, so you don't have to.</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</section>



<section class="section section--benefits">
	<div class="container">
		<h2 class="section__title">Who Can Benefit?</h2>

		<div class="grid grid--3 cards">
			<article class="card card--benefit">
				<div class="card__body">
					<img src="{{ asset('images/manager/ben1.svg') }}" alt="Tech & IT icon" class="card__icon">

				</div>
				<div class="enhancements__list">
					<h3 class="card__title">Tech & IT Companies</h3>
					<p class="card__text">Hire dedicated software engineers, developers, and support staff.</p>
				</div>
			</article>

			<article class="card card--benefit">
				<div class="card__body">
					<img src="{{ asset('images/manager/ben2.svg') }}" alt="Accounting icon" class="card__icon">
				</div>
				<div class="enhancements__list">
					<h3 class="card__title">Accounting & Finance Firms</h3>
					<p class="card__text">Streamline bookkeeping, payroll, analysis, and reporting.</p>
				</div>
			</article>

			<article class="card card--benefit">
				<div class="card__body">
					<img src="{{ asset('images/manager/ben3.svg') }}" alt="Call center icon" class="card__icon">

				</div>
				<div class="enhancements__list">
					<h3 class="card__title">Call Centers & Customer Support</h3>
					<p class="card__text">Get cost-effective, multilingual 24/7 support.</p>
				</div>
			</article>

			<article class="card card--benefit">
				<div class="card__body">
					<img src="{{ asset('images/manager/ben4.svg') }}" alt="E-commerce icon" class="card__icon">

				</div>
				<div class="enhancements__list">
					<h3 class="card__title">E-commerce & Retail</h3>
					<p class="card__text">Manage order processing, customer service, and inventory remotely.</p>
				</div>
			</article>

			<article class="card card--benefit">
				<div class="card__body">
					<img src="{{ asset('images/manager/ben5.svg') }}" alt="Engineering icon" class="card__icon">

				</div>
				<div class="enhancements__list">
					<h3 class="card__title">Engineering & Design Firms</h3>
					<p class="card__text">Expand your workforce with CAD designers and architects.</p>
				</div>
			</article>

			<article class="card card--benefit">
				<div class="card__body">
					<img src="{{ asset('images/manager/ben6.svg') }}" alt="Healthcare icon" class="card__icon">

				</div>
				<div class="enhancements__list">
					<h3 class="card__title">Healthcare & Medical Support</h3>
					<p class="card__text">Administrative, billing, and remote support teams.</p>
				</div>
			</article>
		</div>
	</div>
</section>


<section class="why-bangladesh animate__animated animate__fadeInUp">
	<div class="container bangladesh-container">
		<h2>Why Bangladesh? A Smart Business Decision!</h2>
		<div class="bangladesh-wrapper">
			<img src="{{ asset('images/manager/map.png') }}" alt="Bangladesh Map" class="map-img">
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

<!-- Call to Action -->
<section class="cta-2 animate__animated animate__fadeInUp">
	<h2>Let's Work Together!</h2>
	<p>Outsourcing is no longer just an option—it's a growth strategy for modern firms. Let Top Outsourcing Partners handle your accounting workload so you can focus on client success and firm growth.</p>
	<a class="btn-primary" href="{{ url('/consult') }}">Book a Free Financial Consultation</a>
</section>

@endsection
@section('footer')
@include('components.footer')
@endsection