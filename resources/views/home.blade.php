@extends('layouts.app')

@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
    <div class="carousel-inner">

        {{-- ───────────────────────── Slide 1: Home ───────────────────────── --}}
        <div class="carousel-item active">
            <div class="hero home-hero">
                <div class="floating-container">
                    <div class="floating-box">
                        @foreach(range(1, 8) as $i)
                        <div class="floating-group">
                            <img src="{{ asset('images/user'.$i.'.jpg') }}"
                                alt="Team member"
                                class="floating-image">
                            @php
                            $icons = ['💼', '📊', '🔗', '💰', '🛠️', '📈', '⚡'];
                            $icon = $icons[array_rand($icons)];
                            @endphp
                            <span class="floating-icon">{{ $icon }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-content">
                    <h2>Empowering Businesses with Smart Outsourcing Solutions</h2>
                    <p>Customized accounting, finance, AI integration, ledger management,
                        insurance, and third-party services to help your business grow.</p>

                    <a href="{{ url('/consult') }}" class="btn-primary">Schedule for a Consultation</a>
                </div>
            </div>
        </div>

        {{-- ──────────────────────── Slide 2: Managerial ─────────────────────── --}}
        <div class="carousel-item">
            <div class="hero hero-managerial">
                <div class="container hero-flex">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="hero-img-wrapper">
                                <img src="{{ asset('images/manager/hero.png') }}"
                                     alt="Team Illustration"
                                     class="hero-img img-fluid">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="hero-text">
                                <h2>Global Workforce, Hassle-Free – Build Your Dedicated Team Today!</h2>
                                <p>Focus on your business while we manage your dedicated offshore team.</p>
                                <a href="{{ url('/manager') }}" class="btn-primary">
                                    Discover How We Can Optimize Your Operations
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ──────────────────────── Slide 3: Outsourcing ─────────────────────── --}}
        <div class="carousel-item">
            <div class="hero hero-outsourcing">
                <div class="container hero-flex">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-2 order-md-1">
                            <div class="hero-text">
                                <h2>Outsourcing Solutions for Accounting Firms – Scale Your Operations with Confidence</h2>
                                <p>We act as an extension of your firm, handling bookkeeping,
                                   accounting, and financial operations so you can focus on client
                                   advisory and revenue-generating activities.</p>
                                <a href="{{ url('/out') }}" class="btn-primary">
                                    Learn How We Can Support Your Firm
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 order-1 order-md-2">
                            <div class="hero-img-wrapper">
                                <img src="{{ asset('images/out/hero.png') }}"
                                     alt="Accounting Illustration"
                                     class="hero-img img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Carousel controls --}}
    <button class="carousel-control-prev" type="button"
        data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button"
        data-bs-target="#heroCarousel" data-bs-slide="next">
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