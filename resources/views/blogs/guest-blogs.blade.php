@extends('layouts.app')

@section('title', 'Guest Blogs - Top Outsourcing Partners | Industry Insights & Innovation')
@section('meta_description', 'Explore guest blog posts and expert insights from industry leaders at Top Outsourcing Partners. Discover innovative perspectives on business outsourcing, technology trends, and strategic growth from guest contributors and thought leaders.')
@section('meta_keywords', 'guest blogs, industry insights, business outsourcing insights, technology trends, expert perspectives, thought leadership, innovation, strategic growth, guest contributors')


<link rel="stylesheet" href="{{ asset('css/guest-blogs.css') }}">

@section('content')

<div class="modern-blogs-container">
    <!-- Hero Section -->
    <section class="blogs-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    Insights & <span class="highlight">Innovation</span>
                </h1>
                <p class="hero-subtitle">
                    Discover the latest trends, case studies, and expert insights from the world of outsourcing and technology.
                </p>
            </div>
            <div class="hero-visual">
                <div class="floating-card">
                    <i class="fas fa-lightbulb"></i>
                    <span>Latest Insights</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Categories -->
    <section class="content-categories">
        <div class="container">
            <div class="content-layout">
                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">
                            <i class="fas fa-search"></i>
                            Search & Filter
                        </h3>
                        
                        <!-- Search Form -->
                        <form id="searchForm" class="search-form" method="GET">
                            <div class="search-input-group">
                                <input 
                                    type="text" 
                                    name="keyword" 
                                    id="keywordSearch"
                                    placeholder="Search posts..." 
                                    value="{{ request('keyword') }}"
                                    class="search-input"
                                >
                                <button type="submit" class="search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            
                            <!-- Type Filter -->
                            <div class="filter-group">
                                <label class="filter-label">Content Type</label>
                                <div class="filter-buttons">
                                    <button type="button" class="filter-btn {{ !request('type') ? 'active' : '' }}" data-type="">
                                        All
                                    </button>
                                    <button type="button" class="filter-btn {{ request('type') == 'blog' ? 'active' : '' }}" data-type="blog">
                                        Blogs
                                    </button>
                                    <button type="button" class="filter-btn {{ request('type') == 'case_study' ? 'active' : '' }}" data-type="case_study">
                                        Case Studies
                                    </button>
                                </div>
                                <input type="hidden" name="type" id="typeFilter" value="{{ request('type') }}">
                            </div>
                        </form>
                        
                        <!-- Keywords List -->
                        @if($allKeywords->count() > 0)
                            <div class="keywords-section">
                                <h4 class="keywords-title">
                                    <i class="fas fa-tags"></i>
                                    Popular Keywords
                                </h4>
                                <div class="keywords-list">
                                    @foreach($allKeywords->take(15) as $keyword)
                                        <button class="keyword-tag {{ request('keyword') == $keyword ? 'active' : '' }}" 
                                                data-keyword="{{ $keyword }}">
                                            {{ $keyword }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- Clear Filters -->
                        @if(request('keyword') || request('type'))
                            <div class="clear-filters">
                                <a href="{{ route('blogs.index') }}" class="clear-btn">
                                    <i class="fas fa-times"></i>
                                    Clear All Filters
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="main-content">
                    <!-- Blog Posts Section -->
                    <div class="category-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-blog"></i>
                                Latest Blog Posts
                                @if(request('keyword') || request('type'))
                                    <span class="filter-indicator">
                                        @if(request('keyword'))
                                            - "{{ request('keyword') }}"
                                        @endif
                                        @if(request('type'))
                                            - {{ request('type') == 'case_study' ? 'Case Studies' : 'Blog Posts' }} only
                                        @endif
                                    </span>
                                @endif
                            </h2>
                            <p class="section-subtitle">
                                Explore our latest thoughts on technology, business, and innovation
                            </p>
                        </div>
                        
                        <div class="posts-grid">
                            @php 
                                $blogPosts = $blogs->where('type', 'blog');
                                if (request('type') && request('type') !== 'blog') {
                                    $blogPosts = collect();
                                }
                            @endphp
                            @if($blogPosts->count() > 0)
                                @foreach($blogPosts as $blog)
                                    <article class="content-card blog-card">
                                        <div class="card-image">
                                            @if($blog->image)
                                                <img src="{{ $blog->image }}" alt="{{ $blog->title }}" loading="lazy">
                                            @else
                                                <div class="placeholder-image">
                                                    <i class="fas fa-newspaper"></i>
                                                </div>
                                            @endif
                                            <div class="card-overlay">
                                                <span class="content-type">Blog Post</span>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-meta">
                                                <span class="date">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $blog->created_at->format('M d, Y') }}
                                                </span>
                                                <span class="read-time">
                                                    <i class="fas fa-clock"></i>
                                                    {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read
                                                </span>
                                            </div>
                                            <h3 class="card-title">{{ $blog->title }}</h3>
                                            <p class="card-excerpt">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}
                                            </p>
                                            @if($blog->keywords && count($blog->keywords) > 0)
                                                <div class="card-keywords">
                                                    @foreach(array_slice($blog->keywords, 0, 3) as $keyword)
                                                        <span class="keyword-badge">{{ $keyword }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="read-more-btn">
                                                Read Article
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </article>
                                @endforeach
                            @else
                                <div class="empty-state">
                                    <i class="fas fa-blog"></i>
                                    <h3>No Blog Posts Found</h3>
                                    <p>
                                        @if(request('keyword') || request('type'))
                                            Try adjusting your search criteria or clear filters to see all posts.
                                        @else
                                            Check back soon for our latest insights and articles.
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Case Studies Section -->
                    <div class="category-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-chart-line"></i>
                                Case Studies
                                @if(request('keyword') || request('type'))
                                    <span class="filter-indicator">
                                        @if(request('keyword'))
                                            - "{{ request('keyword') }}"
                                        @endif
                                        @if(request('type'))
                                            - {{ request('type') == 'case_study' ? 'Case Studies' : 'Blog Posts' }} only
                                        @endif
                                    </span>
                                @endif
                            </h2>
                            <p class="section-subtitle">
                                Real-world success stories and transformative partnerships
                            </p>
                        </div>
                        
                        <div class="posts-grid">
                            @php 
                                $caseStudies = $blogs->where('type', 'case_study');
                                if (request('type') && request('type') !== 'case_study') {
                                    $caseStudies = collect();
                                }
                            @endphp
                            @if($caseStudies->count() > 0)
                                @foreach($caseStudies as $caseStudy)
                                    <article class="content-card case-study-card">
                                        <div class="card-image">
                                            @if($caseStudy->image)
                                                <img src="{{ $caseStudy->image }}" alt="{{ $caseStudy->title }}" loading="lazy">
                                            @else
                                                <div class="placeholder-image">
                                                    <i class="fas fa-chart-line"></i>
                                                </div>
                                            @endif
                                            <div class="card-overlay">
                                                <span class="content-type">Case Study</span>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-meta">
                                                <span class="date">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    {{ $caseStudy->created_at->format('M d, Y') }}
                                                </span>
                                                <span class="read-time">
                                                    <i class="fas fa-clock"></i>
                                                    {{ ceil(str_word_count(strip_tags($caseStudy->content)) / 200) }} min read
                                                </span>
                                            </div>
                                            <h3 class="card-title">{{ $caseStudy->title }}</h3>
                                            <p class="card-excerpt">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($caseStudy->content), 120) }}
                                            </p>
                                            @if($caseStudy->keywords && count($caseStudy->keywords) > 0)
                                                <div class="card-keywords">
                                                    @foreach(array_slice($caseStudy->keywords, 0, 3) as $keyword)
                                                        <span class="keyword-badge">{{ $keyword }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <a href="{{ route('blogs.show', $caseStudy->id) }}" class="read-more-btn">
                                                Read Case Study
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </article>
                                @endforeach
                            @else
                                @if(!request('keyword') && !request('type'))
                                    <!-- Placeholder for Case Studies (to be implemented) -->
                                    <article class="content-card case-study-card coming-soon">
                                        <div class="card-image">
                                            <div class="placeholder-image">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <div class="card-overlay">
                                                <span class="content-type">Case Study</span>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-meta">
                                                <span class="status">Coming Soon</span>
                                            </div>
                                            <h3 class="card-title">Digital Transformation Success</h3>
                                            <p class="card-excerpt">
                                                Discover how we helped a Fortune 500 company streamline their operations and achieve 40% cost savings.
                                            </p>
                                            <button class="read-more-btn disabled">
                                                Coming Soon
                                                <i class="fas fa-clock"></i>
                                            </button>
                                        </div>
                                    </article>

                                    <article class="content-card case-study-card coming-soon">
                                        <div class="card-image">
                                            <div class="placeholder-image">
                                                <i class="fas fa-cogs"></i>
                                            </div>
                                            <div class="card-overlay">
                                                <span class="content-type">Case Study</span>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-meta">
                                                <span class="status">Coming Soon</span>
                                            </div>
                                            <h3 class="card-title">AI Implementation Journey</h3>
                                            <p class="card-excerpt">
                                                Learn about our comprehensive AI integration process that boosted productivity by 60%.
                                            </p>
                                            <button class="read-more-btn disabled">
                                                Coming Soon
                                                <i class="fas fa-clock"></i>
                                            </button>
                                        </div>
                                    </article>

                                    <article class="content-card case-study-card coming-soon">
                                        <div class="card-image">
                                            <div class="placeholder-image">
                                                <i class="fas fa-rocket"></i>
                                            </div>
                                            <div class="card-overlay">
                                                <span class="content-type">Case Study</span>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-meta">
                                                <span class="status">Coming Soon</span>
                                            </div>
                                            <h3 class="card-title">Startup Scale-Up Strategy</h3>
                                            <p class="card-excerpt">
                                                How we helped a tech startup scale from 10 to 200+ employees in 18 months.
                                            </p>
                                            <button class="read-more-btn disabled">
                                                Coming Soon
                                                <i class="fas fa-clock"></i>
                                            </button>
                                        </div>
                                    </article>
                                @else
                                    <div class="empty-state">
                                        <i class="fas fa-chart-line"></i>
                                        <h3>No Case Studies Found</h3>
                                        <p>
                                            Try adjusting your search criteria or clear filters to see all case studies.
                                        </p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="newsletter-section">
        <div class="newsletter-container">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2 class="newsletter-title">
                        Stay <span class="highlight">Informed</span>
                    </h2>
                    <p class="newsletter-subtitle">
                        Get the latest insights, case studies, and industry trends delivered straight to your inbox.
                    </p>
                    <div class="newsletter-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Weekly industry insights</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Exclusive case studies</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Expert tips & strategies</span>
                        </div>
                    </div>
                </div>
                
                <div class="newsletter-form">
                    <form id="newsletterForm" class="subscription-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input-wrapper">
                                <input 
                                    type="email" 
                                    name="email" 
                                    placeholder="Enter your email address" 
                                    required
                                    class="email-input"
                                >
                            </div>
                            <button type="submit" class="subscribe-btn">
                                <span class="btn-text">Subscribe</span>
                                <i class="fas fa-paper-plane btn-icon"></i>
                            </button>
                        </div>
                        <p class="privacy-note">
                            <i class="fas fa-shield-alt"></i>
                            We respect your privacy. Unsubscribe at any time.
                        </p>
                    </form>
                    
                    <div id="subscriptionSuccess" class="success-message is-hidden">
                        <i class="fas fa-check-circle"></i>
                        <span>Thank you for subscribing! Check your email for confirmation.</span>
                    </div>
                    
                    <div id="subscriptionError" class="error-message is-hidden">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Something went wrong. Please try again.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
// Search and filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    const keywordSearch = document.getElementById('keywordSearch');
    const typeFilter = document.getElementById('typeFilter');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const keywordTags = document.querySelectorAll('.keyword-tag');
    
    // Handle type filter buttons
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const type = this.dataset.type;
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            typeFilter.value = type;
            searchForm.submit();
        });
    });
    
    // Handle keyword tags
    keywordTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const keyword = this.dataset.keyword;
            keywordSearch.value = keyword;
            searchForm.submit();
        });
    });
    
    // Handle search form submission
    searchForm.addEventListener('submit', function(e) {
        const formData = new FormData(this);
        const url = new URL(this.action || window.location.href);
        url.search = '';
        for (let [key, value] of formData.entries()) {
            if (value.trim() !== '') url.searchParams.set(key, value);
        }
        window.location.href = url.toString();
        e.preventDefault();
    });
    
    // Newsletter form handling
    const newsletterForm = document.getElementById('newsletterForm');
    const successMessage = document.getElementById('subscriptionSuccess');
    const errorMessage = document.getElementById('subscriptionError');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const subscribeBtn = document.querySelector('.subscribe-btn');
            const originalBtnText = subscribeBtn.innerHTML;
            
            // Show loading state
            subscribeBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...';
            subscribeBtn.disabled = true;
            
            // Hide any previous messages
            successMessage.classList.add('is-hidden');
            errorMessage.classList.add('is-hidden');
            
            // Make API call
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    newsletterForm.classList.add('is-hidden');
                    successMessage.classList.remove('is-hidden');
                    
                    // Reset form after 5 seconds
                    setTimeout(() => {
                        newsletterForm.classList.remove('is-hidden');
                        successMessage.classList.add('is-hidden');
                        newsletterForm.reset();
                    }, 5000);
                } else {
                    errorMessage.querySelector('span').textContent = data.message || 'Something went wrong. Please try again.';
                    errorMessage.classList.remove('is-hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.querySelector('span').textContent = 'Network error. Please check your connection and try again.';
                errorMessage.classList.remove('is-hidden');
            })
            .finally(() => {
                // Restore button state
                subscribeBtn.innerHTML = originalBtnText;
                subscribeBtn.disabled = false;
            });
        });
    }
    
    // Real-time search (optional - debounced)
    let searchTimeout;
    keywordSearch.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            if (this.value.length >= 3 || this.value.length === 0) {
                searchForm.submit();
            }
        }, 500);
    });
});
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection