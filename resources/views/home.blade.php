@extends('layouts.app')

@section('content')
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1: Homepage Hero -->
            <div class="carousel-item active">
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
                <a href="{{ url('/consult') }}" class="cta-button">Schedule for a Consultation</a>
            </div>
            </div>

            <!-- Slide 2: Managerial Page Hero -->
            <div class="carousel-item">
            <div class="hero-managerial">
                <div class="container hero-flex">
                <div class="hero-managerial-content d-flex align-items-center">
                    <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="hero-managerial-img">
                        <img src="{{ asset('images/manager/hero.png') }}" alt="Team Illustration" class="hero-img img-fluid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-text ms-md-4">
                        <h1>Global Workforce, Hassle-Free - Build Your Dedicated Team Today!</h1>
                        <p>Focus on your business while we manage your dedicated offshore team.</p>
                        <a href="{{ url('/manager') }}" class="cta-button">Go to Managerial Page</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- Slide 3: Outsourcing Page Hero -->
            <div class="carousel-item">
            <div class="hero-outsourcing">
                <div class="container hero-flex">
                <div class="row align-items-center">
                    <div class="col-md-6">
                    <div class="hero-outsourcing-text">
                        <h2>Outsourcing Solutions for Accounting Firms – Scale Your Operations with Confidence</h2>
                        <p>We act as an extension of your firm, handling bookkeeping, accounting, and financial operations so you can focus on client advisory and revenue-generating activities.</p>
                        <a href="{{ url('/out') }}" class="cta-button">Go to Outsourcing Page</a>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="hero-outsourcing-image">
                        <img src="{{ asset('images/out/hero.png') }}" alt="Accounting Illustration" class="img-fluid" style="width: 80%; height: auto;">
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @include('sections.services')
    @include('components.success-stories')
    @include('components.why-choose-us')

@endsection

@section('footer')
    @include('components.footer') 
@endsection
