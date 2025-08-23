@extends('layouts.app')

@section('title', 'Industries We Serve - Top Outsourcing Partners | Specialized Business Solutions')
@section('meta_description', 'Top Outsourcing Partners serves diverse industries with specialized outsourcing solutions. From healthcare and finance to technology, manufacturing, retail, and beyond - discover how our industry-specific expertise can optimize your business operations.')
@section('meta_keywords', 'industries we serve, industry-specific outsourcing, healthcare outsourcing, finance industry, technology outsourcing, manufacturing support, retail outsourcing, specialized business solutions')

@section('content')
<section class="industries-section">
	<div class="container">
		<div class="industries-header animate__animated animate__fadeInDown">
			<img src="{{ asset('images/industries/industry.svg') }}" alt="AI Icon" class="section-icon">
			<h1>Industries We serve</h1>
		</div>
		<div class="industries-description animate__animated animate__fadeIn animate__delay-1s">
			<p>
				Our experience spans various sectors, and we're proud to offer our expert services to all industries. If your industry isn't listed, don't worry! We are open to collaborating and are confident we can create the perfect solution for your unique needs. Reach out to discuss how we can work together and help you achieve success.
			</p>
		</div>
	</div>
</section>
<section class="industries-cta">
	<div class="container">
<div class="industries-content">
    @foreach ([
        ['src' => 'frame1.svg', 'alt' => 'analytics', 'title' => 'Healthcare'],
        ['src' => 'frame2.svg', 'alt' => 'chatbot', 'title' => 'Insurance'],
        ['src' => 'frame3.svg', 'alt' => 'predictive', 'title' => 'Retail & E-Commerce'],
        ['src' => 'frame4.svg', 'alt' => 'automation', 'title' => 'Real Estate'],
        ['src' => 'frame5.svg', 'alt' => 'workflow', 'title' => 'Banking & Fintech'],
        ['src' => 'frame6.svg', 'alt' => 'cyber', 'title' => 'Logistics & Manufacturing'],
        ['src' => 'frame7.svg', 'alt' => 'cyber', 'title' => 'Technology & Media'],
        ['src' => 'frame8.svg', 'alt' => 'education', 'title' => 'Accounting Advisory'],
        ['src' => 'frame9.svg', 'alt' => 'energy', 'title' => 'Employer of Record']
    ] as $card)
        <div class="feature-box card animate__animated animate__zoomIn animate__delay-1s">
            <img class="feature-image" src="{{ asset('images/industries/' . $card['src']) }}" alt="{{ $card['alt'] }}">
            <h4>{{ $card['title'] }}</h4>
        </div>
    @endforeach
</div>

	</div>
</section>

@include('components.success-stories')
@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer')
@endsection