@extends('layouts.app')

@section('title', 'Third-Party Business Support Services | Top Outsourcing Partners')
@section('meta_description', 'Comprehensive third-party business support from Top Outsourcing Partners. Get expert HR outsourcing, legal process outsourcing, marketing & brand management, accounting services, customer support, and e-commerce solutions - all tailored to your business needs.')
@section('meta_keywords', 'third-party business support, HR outsourcing, legal process outsourcing, marketing outsourcing, customer support outsourcing, e-commerce support, business process outsourcing, operational support')

@section('content')

<section class="section finance-section">
	<div class="container">
		<div class="finance-header animate__animated animate__fadeInDown">
			<img src="{{ asset('images/third-party/third-party.svg') }}" alt="AI Icon" class="section-icon">
			<h1>Third-Party Business Support</h1>
		</div>
	</div>
</section>

<section class="services-cards">

	<!-- Service Cards Grid -->
	<div class="container services-grid">
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-1s" data-target="#hro">
			<img src="{{ asset('images/third-party/frame1.svg') }}" alt="analytics">
			<h4>Human Resource Outsourcing (HRO)</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-1s" data-target="#lpo">
			<img src="{{ asset('images/third-party/frame2.svg') }}" alt="chatbot">
			<h4>Legal Process Outsourcing (LPO)</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-1s" data-target="#marketing">
			<img src="{{ asset('images/third-party/frame3.svg') }}" alt="predictive">
			<h4>Marketing & Brand Management</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-2s" data-target="#finance">
			<img src="{{ asset('images/third-party/frame4.svg') }}" alt="automation">
			<h4>Accounting & Financial Process Outsourcing</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-2s" data-target="#customer-support">
			<img src="{{ asset('images/third-party/frame5.svg') }}" alt="workflow">
			<h4>Customer Support & Call Center Services</h4>
		</div>
		<div class="feature-box animate__animated animate__fadeInUp animate__delay-2s" data-target="#ecommerce">
			<img src="{{ asset('images/third-party/frame5.svg') }}" alt="cyber">
			<h4>E-commerce & Marketplace Support</h4>
		</div>
	</div>
</section>

<section class="service-details">
	<div id="hro" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/third-party/image1.png') }}" alt="Bookkeeping">
			<div class="finance-badge">
				<img src="{{ asset('images/third-party/cost.svg') }}" alt="Icon">
				<span><b>Cost Savings</b><br><small>from HR Outsourcing</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/third-party/tr1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Human Resource Outsourcing (HRO)</b></h2>
			<p style="text-align: left;">Simplify workforce management with end-to-end recruitment, payroll processing,
				employee benefits administration, and compliance handling for your business.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Talk to an HR Outsourcing Expert</a>
		</div>
	</div>

</section>
<section class="service-details alt">
	<div id="lpo" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/third-party/image2.png') }}" alt="CFO Services">
			<div class="finance-badge">
				<img src="{{ asset('images/third-party/reduction.svg') }}" alt="Icon">
				<span><b>Increase in Customer Engagement</b><br><small>with Outsourced Marketing</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/third-party/tl1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Legal Process Outsourcing (LPO)</b></h2>
			<p style="text-align: left;">Access expert contract drafting, compliance management, legal documentation, and risk assessment services without hiring an in-house legal team.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book a Legal Outsourcing Consultation</a>
		</div>
	</div>

</section>
<section class="service-details">
	<div id="marketing" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/third-party/image3.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/third-party/increase.svg') }}" alt="Icon">
				<span><b>Increase in Customer Engagement</b><br><small>with Outsourced Marketing</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/third-party/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Marketing & Brand Management</b></h2>
			<p style="text-align: left;">Enhance your brand visibility with SEO, digital marketing, social media management, and content strategy to attract more customers.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Marketing Consultation</a>
		</div>
	</div>

</section>
<section class="service-details alt">
	<div id="finance" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/third-party/image4.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/third-party/efficiency.svg') }}" alt="Icon">
				<span><b>Efficiency Gains</b><br><small>with Outsourced Financial Services</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/third-party/tl2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Accounting & Financial Process Outsourcing</b></h2>
			<p style="text-align: left;">Ensure accurate bookkeeping, tax filing, financial reporting, and cash flow
				management with expert financial outsourcing services.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Finance Outsourcing Call</a>
		</div>
	</div>

</section>
<section class="service-details">
	<div id="customer-support" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/third-party/image5.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/third-party/customer.svg') }}" alt="Icon">
				<span><b>Customer Satisfaction Improvement</b><br><small>After Call Center Outsourcing</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/third-party/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Customer Support & Call Center Services</b></h2>
			<p style="text-align: left;">Provide 24/7 multilingual customer support, live chat services, and technical
				assistance to improve customer satisfaction and retention.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book a Customer Support Strategy Call</a>
		</div>
	</div>

</section>
<section class="service-details alt">
	<div id="ecommerce" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/third-party/image4.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/third-party/faster.svg') }}" alt="Icon">
				<span><b>Faster Order Fulfillment</b><br><small>with E-commerce Outsourcing</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/third-party/tl3.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>E-commerce & Marketplace Support</b></h2>
			<p style="text-align: left;">Manage your order processing, inventory control, product listings, and customer
				interactions efficiently with expert outsourcing solutions.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule an E-commerce Support Consultation</a>
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