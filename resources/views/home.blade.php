@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="floating-container">
            @foreach(range(1, 8) as $i)
                <div class="floating-group">
                    <img src="{{ asset('images/user'.$i.'.jpg') }}" 
                         alt="Team member" 
                         class="floating-image" 
                         style="width: {{ rand(60, 100) }}px; height: {{ rand(60, 100) }}px;">
                    
                    @php
                        $icons = ['💼', '📊', '🔗', '💰', '🛠️', '📈', '⚡'];
                        $icon = $icons[array_rand($icons)];
                    @endphp
                    
                    <span class="floating-icon">{{ $icon }}</span>
                </div>
            @endforeach
        </div>
        <h1>Empowering Businesses with Smart Outsourcing Solutions</h1>
        <p>Customized accounting, finance, AI integration, ledger management, insurance, and third-party services to help your business grow.</p>
        <a href="#" class="cta-button">Sign Up</a>
    </div>
    @include('sections.second')
    @include('sections.services')
    @php
        $reviews = [
            ['avatar' => '👦', 'text' => 'Meet our graduates working at top companies. Get inspired by the journeys of our students.'],
            ['avatar' => '👩‍🦱', 'text' => 'Meet our graduates working at top companies. Get inspired by the journeys of our students.Meet our graduates working at top companies. Get inspired by the journeys of our students.'],
            ['avatar' => '👨‍🦰', 'text' => 'Meet our graduates working at top companies. Get inspired by the journeys of our students.'],
            ['avatar' => '👩', 'text' => 'Meet our graduates working at top companies. Get inspired by the journeys of our students.'],
            ['avatar' => '🧑‍🎤', 'text' => 'Meet our graduates working at top companies. Get inspired by the journeys of our students.Meet our graduates working at top companies. Get inspired by the journeys of our students.'],
            ['avatar' => '👨‍🦱', 'text' => 'Meet our graduates working at top companies. Get inspired by the journeys of our students.'],
        ];
    @endphp
    @include('components.success-stories', ['reviews' => $reviews])
    @include('components.why-choose-us')

@endsection

@section('footer')
    @include('components.footer') 
@endsection
