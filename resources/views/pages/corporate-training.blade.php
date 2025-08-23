@extends('layouts.app')

@section('title', 'Corporate Training & Development Services | Top Outsourcing Partners')
@section('meta_description', 'Upskill your workforce with Top Outsourcing Partners comprehensive corporate training and development programs. From technical skills to leadership development and industry-specific training - boost employee performance, retention, and drive organizational growth.')
@section('meta_keywords', 'corporate training, employee development, workforce training, technical skills training, leadership development, professional development, skill enhancement, employee retention, organizational growth')

@section('content')
<section class="section finance-section">
	<div class="container">
		<div class="finance-header animate__animated animate__fadeInDown">
			<img src="{{ asset('images/corporate/corporate.svg') }}" alt="AI Icon" class="section-icon">
			<h1>Corporate Training & Development</h1>
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
		<div class="feature-box animate__animated animate__bounceIn animate__delay-1s"  data-target="#legal-compliance">
			<img src="{{ asset('images/corporate/frame1.svg') }}" alt="analytics">
			<h4>Legal & Compliance Training</h4>
		</div>
		<div class="feature-box animate__animated animate__bounceIn animate__delay-1s"  data-target="#itp-training">
			<img src="{{ asset('images/corporate/frame2.svg') }}" alt="chatbot">
			<h4>Income Tax Practitioner (ITP) Training</h4>
		</div>
		<div class="feature-box animate__animated animate__bounceIn animate__delay-1s"  data-target="#leadership-development">
			<img src="{{ asset('images/corporate/frame3.svg') }}" alt="predictive">
			<h4>Leadership & Management Development</h4>
		</div>
		<div class="feature-box animate__animated animate__bounceIn animate__delay-2s"  data-target="#cross-cultural">
			<img src="{{ asset('images/corporate/frame4.svg') }}" alt="automation">
			<h4>Cross-Cultural & Communication Training</h4>
		</div>
		<div class="feature-box animate__animated animate__bounceIn animate__delay-2s"  data-target="#cybersecurity">
			<img src="{{ asset('images/corporate/frame5.svg') }}" alt="workflow">
			<h4>Cybersecurity Awareness & Data Protection</h4>
		</div>
		<div class="feature-box animate__animated animate__bounceIn animate__delay-2s"  data-target="#sales-mastery">
			<img src="{{ asset('images/corporate/frame5.svg') }}" alt="cyber">
			<h4>Financial Management & Budgeting Training</h4>
		</div>
		<div></div> {{-- Placeholder to push the next feature-box to the middle --}}
		<div class="feature-box animate__animated animate__bounceIn animate__delay-2s"  data-target="#sales-negotiation">
			<img src="{{ asset('images/corporate/frame5.svg') }}" alt="cyber">
			<h4>Sales & Negotiation Mastery</h4>
		</div>
	</div>
</section>

<section class="service-details">
	<div id="legal-compliance" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image1.png') }}" alt="Bookkeeping">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/reduction.svg') }}" alt="Icon">
				<span><b>Reduction in Compliance Violations</b><br><small>with Outsourced</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/corporate/tr1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Legal & Compliance Training</b></h2>
			<p style="text-align: left;">Stay compliant with industry regulations, corporate governance policies, and labor
				laws through expert-led training programs</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Compliance Training Consultation</a>
		</div>
	</div>
</section>

<section class="service-details">
	<div id="itp-training" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image2.png') }}" alt="CFO Services">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/imp.svg') }}" alt="Icon">
				<span><b>Book an ITP Training Session</b><br><small>After Training</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/corporate/tl1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Income Tax Practitioner (ITP) Training</b></h2>
			<p style="text-align: left;">Equip finance professionals with taxation expertise, corporate tax filing strategies, and compliance best practices to improve accuracy.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book an ITP Training Session</a>
		</div>
	</div>
</section>

<section class="service-details alt">
	<div id="leadership-development" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image3.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/increase.svg') }}" alt="Icon">
				<span><b>Increase in Employee Retention</b><br><small>with Strong Leadership Training</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/corporate/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Leadership & Management Development</b></h2>
			<p style="text-align: left;">Enhance leadership capabilities with decision-making, strategic thinking, and conflict
				resolution training for executives and managers.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book a Leadership Training Consultation</a>
		</div>
	</div>
</section>

<section class="service-details">
	<div id="cross-cultural" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image4.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/workspace.svg') }}" alt="Icon">
				<span><b>Improvement in Workplace Collaboration</b><br><small>After Training</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/corporate/tl2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Cross-Cultural & Communication Training</b></h2>
			<p style="text-align: left;">Improve team collaboration, business negotiations, and customer interactions with tailored communication training for global business environments.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Cross-Cultural Training Call</a>
		</div>
	</div>
</section>

<section class="service-details alt">
	<div id="cybersecurity" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image5.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/reduct2.svg') }}" alt="Icon">
				<span><b>Reduction in Cybersecurity Breaches</b><br><small>After Training</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/corporate/tr3.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Cybersecurity Awareness & Data Protection</b></h2>
			<p style="text-align: left;">Protect your business from cyber threats with training on data security, phishing
				prevention, and risk management strategies.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book a Cybersecurity Awareness Session</a>
		</div>
	</div>
</section>

<section class="service-details">
	<div id="sales-mastery" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image4.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/growth.svg') }}" alt="Icon">
				<span><b>Business Profitability Growth</b><br><small>After Financial Training</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/corporate/tl3.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Financial Management & Budgeting Training</b></h2>
			<p style="text-align: left;">Train your employees in budget planning, financial forecasting, and cash flow
				optimization to ensure financial stability.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Financial Training Session</a>
		</div>
	</div>
</section>

<section class="service-details alt">
	<div id="sales-negotiation" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/corporate/image5.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/corporate/rates.svg') }}" alt="Icon">
				<span><b>Increase in Conversion Rates</b><br><small>After Sales Training</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/corporate/tr4.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Sales & Negotiation Mastery</b></h2>
			<p style="text-align: left;">Boost sales performance with strategic negotiation techniques, client relationship
				management, and persuasion training to close more deals.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book a Sales & Negotiation Training Call</a>
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