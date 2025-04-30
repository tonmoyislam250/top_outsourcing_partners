@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header animate__animated animate__fadeInDown">
    <img src="{{ asset('images/industries/industry.svg') }}" alt="AI Icon" class="section-icon">
    <h1 class="section-title">Industries We serve</h1>
  </div>
  <p class="">Our experience spans various sectors, and we're proud to offer our expert services to all industries. If your industry isn't listed, don't worry! We are open to collaborating and are confident we can create the perfect solution for your unique needs. Reach out to discuss how we can work together and help you achieve success.</p>

  <div class="grid">
    <div class="card-container">
      @foreach (array_chunk([
        ['src' => 'frame1.svg', 'alt' => 'analytics', 'title' => 'Healthcare'],
        ['src' => 'frame2.svg', 'alt' => 'chatbot', 'title' => 'Insurance'],
        ['src' => 'frame3.svg', 'alt' => 'predictive', 'title' => 'Retail & E-Commerce'],
        ['src' => 'frame4.svg', 'alt' => 'automation', 'title' => 'Real Estate'],
        ['src' => 'frame5.svg', 'alt' => 'workflow', 'title' => 'Banking & Fintech'],
        ['src' => 'frame6.svg', 'alt' => 'cyber', 'title' => 'Logistics & Manufacturing'],
        ['src' => 'frame7.svg', 'alt' => 'cyber', 'title' => 'Technology & Media'],
        ['src' => 'frame8.svg', 'alt' => 'education', 'title' => 'Accounting Advisory'],
        ['src' => 'frame9.svg', 'alt' => 'energy', 'title' => 'Employer of Record']
      ], 3) as $row)
        <div class="row">
          @foreach ($row as $card)
            <div class="card animate__animated animate__zoomIn animate__delay-1s">
              <img src="{{ asset('images/industries/' . $card['src']) }}" alt="{{ $card['alt'] }}">
              <b>{{ $card['title'] }}</b>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
    <style>
      .card-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }
      .row {
        display: flex;
        justify-content: center;
        gap: 20px;
      }
      .card {
        text-align: center;
        max-width: 300px;
      }
    </style>
  </div>

</section>
@include('components.success-stories')
@include('components.why-choose-us')
@endsection

@section('footer')
@include('components.footer') 
@endsection
