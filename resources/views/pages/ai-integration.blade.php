@extends('layouts.app')

@section('title', 'AI Integration Services for Business | Top Outsourcing Partners')
@section('meta_description', 'Transform your business with AI integration services from Top Outsourcing Partners. Leverage cutting-edge AI automation, predictive analytics, intelligent workflows, and chatbot solutions to boost productivity, reduce costs, and stay competitive in the digital age.')
@section('meta_keywords', 'AI integration, artificial intelligence, business automation, predictive analytics, intelligent workflows, chatbot solutions, AI transformation, digital transformation, productivity automation')

@section('content')

<section class="section finance-section">
	<div class="container">
		<div class="finance-header animate__animated animate__fadeInDown">
			<img src="{{ asset('images/ai/ai-icon.svg') }}" alt="AI Icon" class="section-icon">
			<h1>AI Integration in Business</h1>
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
		<div class="feature-box animate__animated animate__tada animate__delay-1s" data-target="#data-analytics">
			<img src="{{ asset('images/ai/frame1.svg') }}" alt="analytics">
			<h4>AI Powered Data Analytics</h4>
		</div>
		<div class="feature-box animate__animated animate__tada animate__delay-1s" data-target="#chatbots">
			<img src="{{ asset('images/ai/frame2.svg') }}" alt="chatbot">
			<h4>AI-Powered Chatbots & Customer Support</h4>
		</div>
		<div class="feature-box animate__animated animate__tada animate__delay-1s" data-target="#predictive-intelligence">
			<img src="{{ asset('images/ai/frame3.svg') }}" alt="predictive">
			<h4>Predictive Business Intelligence</h4>
		</div>
		<div class="feature-box animate__animated animate__tada animate__delay-2s" data-target="#finance-automation">
			<img src="{{ asset('images/ai/frame4.svg') }}" alt="automation">
			<h4>AI in Finance & Accounting Automation</h4>
		</div>
		<div class="feature-box animate__animated animate__tada animate__delay-2s" data-target="#workflow-optimization">
			<img src="{{ asset('images/ai/frame5.svg') }}" alt="workflow">
			<h4>AI-Driven Process Automation & Workflow Optimization</h4>
		</div>
		<div class="feature-box animate__animated animate__tada animate__delay-2s" data-target="#cybersecurity">
			<img src="{{ asset('images/ai/frame5.svg') }}" alt="cyber">
			<h4>Cybersecurity & AI Risk Management</h4>
		</div>
	</div>
</section>

<section class="service-details">
	<div id="data-analytics" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/ai/image1.png') }}" alt="Bookkeeping">
			<div class="finance-badge">
				<img src="{{ asset('images/ai/business.svg') }}" alt="Icon">
				<span><b>Business Performance</b><br><small>Before & After AI Analytics</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/ai/tr1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>AI Powered Data Analytics</b></h2>
			<p style="text-align: left;">Transform raw data into actionable insights with AI-driven analytics and machine learning models. Make smarter decisions with real-time reporting and trend predictions.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Data Analytics Consultation</a>
		</div>
	</div>

</section>
<section class="service-details alt">
	<div id="chatbots" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/ai/image2.png') }}" alt="CFO Services">
			<div class="finance-badge">
				<img src="{{ asset('images/ai/reduction.svg') }}" alt="Icon">
				<span><b>Reduction in Customer Support</b><br><small>Response time with AI</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/ai/tl1.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>AI-Powered Chatbots & Customer Support</b></h2>
			<p style="text-align: left;">Enhance customer experience with AI-driven chatbots and virtual assistants that provide 24/7 support, instant responses, and multilingual interactions.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book an AI Chatbot Consultation</a>
		</div>
	</div>

</section>
<section class="service-details">
	<div id="predictive-intelligence" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/ai/image3.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/ai/sales.svg') }}" alt="Icon">
				<span><b>Sales Growth Forecast</b><br><small>with AI vs. Without AI</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/ai/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Predictive Business Intelligence</b></h2>
			<p style="text-align: left;">Use AI to forecast market trends, customer behavior, and financial performance, helping businesses make proactive, data-driven decisions.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Predictive Analytics Session</a>
		</div>
	</div>

</section>
<section class="service-details alt">
	<div id="finance-automation" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/ai/image4.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/ai/reduction2.svg') }}" alt="Icon">
				<span><b>Reduction in Accounting Errors</b><br><small>with AI Automation</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/ai/tl2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>AI in Finance & Accounting Automation</b></h2>
			<p style="text-align: left;">Increase efficiency in invoicing, expense tracking, payroll, and reconciliation with AI-powered automation, reducing errors and manual effort.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Book an AI Finance Strategy Call</a>
		</div>
	</div>

</section>
<section class="service-details">
	<div id="workflow-optimization" class="container finance-service animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/ai/image5.png') }}" alt="AP Management">
			<div class="finance-badge">
				<img src="{{ asset('images/ai/prod.svg') }}" alt="Icon">
				<span><b>Productivity Increase</b><br><small>with AI-Driven Workflow Automation</small></span>
			</div>
			<div class="finance-badge top-right">
				<img src="{{ asset('images/ai/tr2.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>AI-Driven Process Automation & Workflow Optimization</b></h2>
			<p style="text-align: left;">AI automates repetitive business tasks, workflows, and approvals, streamlining operations and boosting productivity by up to 40%.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Talk to an AI Automation Specialist</a>
		</div>
	</div>

</section>
<section class="service-details alt">
	<div id="cybersecurity" class="container finance-service reverse animate__animated animate__fadeIn animate__delay-3s">
		<div class="finance-image-wrapper">
			<img src="{{ asset('images/ai/image6.png') }}" alt="AR & Billing Services">
			<div class="finance-badge">
				<img src="{{ asset('images/ai/fraud.svg') }}" alt="Icon">
				<span><b>Fraud Detection Effectiveness</b><br><small>with AI Automation</small></span>
			</div>
			<div class="finance-badge top-left">
				<img src="{{ asset('images/ai/tl3.svg') }}" alt="Icon">
			</div>
		</div>
		<div class="finance-content">
			<h2 style="text-align: left;"><b>Cybersecurity & AI Risk Management</b></h2>
			<p style="text-align: left;">Protect your business with AI-powered fraud detection, automated security monitoring, and real-time threat prevention against cyber risks.</p>
			<a href="{{ url('/consult') }}" class="btn-primary">Schedule a Cybersecurity Consultation</a>
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