@extends('layouts.app')

@section('content')
<div class="modern-blogs-container">
    <!-- Hero Section -->
    <section class="blogs-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title" style="text-align: left;">
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
                                                <img src="{{ asset('storage/' . $caseStudy->image) }}" alt="{{ $caseStudy->title }}" loading="lazy">
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
                    
                    <div id="subscriptionSuccess" class="success-message" style="display: none;">
                        <i class="fas fa-check-circle"></i>
                        <span>Thank you for subscribing! Check your email for confirmation.</span>
                    </div>
                    
                    <div id="subscriptionError" class="error-message" style="display: none;">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Something went wrong. Please try again.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
/* Modern Blogs Page Styles */
.modern-blogs-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
}

/* Hero Section */
.blogs-hero {
    padding: 120px 2rem 80px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    position: relative;
    overflow: hidden;
}

.blogs-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.3;
}

.hero-content {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 4rem;
    align-items: center;
    position: relative;
    z-index: 2;
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    color: white;
    margin-bottom: 1.5rem;
    line-height: 1.1;
}

.hero-title .highlight {
    background: linear-gradient(45deg, #ffd700, #ffb347);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.hero-visual {
    display: flex;
    justify-content: center;
    align-items: center;
}

.floating-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    color: white;
    animation: float 6s ease-in-out infinite;
}

.floating-card i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #ffd700;
}

.floating-card span {
    font-size: 1.1rem;
    font-weight: 600;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Content Categories */
.content-categories {
    background: #f8fafc;
    padding: 80px 0;
    position: relative;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
}

.content-layout {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 3rem;
    align-items: start;
}

/* Sidebar Styles */
.sidebar {
    position: sticky;
    top: 20px;
}

.sidebar-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(102, 126, 234, 0.1);
}

.sidebar-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.sidebar-title i {
    color: #667eea;
}

/* Search Form */
.search-form {
    margin-bottom: 2rem;
}

.search-input-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.search-input {
    width: 100%;
    padding: 0.75rem 3rem 0.75rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    background: #f8fafc;
}

.search-input:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-btn {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    background: #667eea;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-btn:hover {
    background: #5a67d8;
    transform: translateY(-50%) scale(1.05);
}

/* Filter Group */
.filter-group {
    margin-bottom: 1.5rem;
}

.filter-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.75rem;
    display: block;
}

.filter-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.filter-btn {
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #64748b;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: left;
}

.filter-btn:hover {
    border-color: #667eea;
    color: #667eea;
}

.filter-btn.active {
    background: #667eea;
    border-color: #667eea;
    color: white;
}

/* Keywords Section */
.keywords-section {
    margin-bottom: 1.5rem;
}

.keywords-title {
    font-size: 1rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.keywords-title i {
    color: #667eea;
    font-size: 0.875rem;
}

.keywords-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.keyword-tag {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 0.25rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.keyword-tag:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.keyword-tag.active {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

/* Clear Filters */
.clear-filters {
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
}

.clear-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #ef4444;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.clear-btn:hover {
    color: #dc2626;
}

/* Main Content */
.main-content {
    min-width: 0;
}

.category-section {
    margin-bottom: 60px;
}

.category-section:last-child {
    margin-bottom: 0;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.25rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.section-title i {
    color: #667eea;
    font-size: 1.75rem;
}

.filter-indicator {
    font-size: 1rem;
    color: #667eea;
    font-weight: 500;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Posts Grid */
.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
    padding: 0;
}

/* Content Cards - Smaller */
.content-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.content-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.content-card:hover .card-image img {
    transform: scale(1.05);
}

.placeholder-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2.5rem;
}

.card-overlay {
    position: absolute;
    top: 1rem;
    left: 1rem;
}

.content-type {
    background: rgba(255, 255, 255, 0.9);
    color: #667eea;
    padding: 0.4rem 0.8rem;
    border-radius: 16px;
    font-size: 0.75rem;
    font-weight: 600;
}

.card-content {
    padding: 1.5rem;
}

.card-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.75rem;
    color: #64748b;
}

.card-meta span {
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.card-meta i {
    color: #667eea;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.card-excerpt {
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 0.875rem;
}

/* Card Keywords */
.card-keywords {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-bottom: 1rem;
    justify-content: center;
}

.keyword-badge {
    background: #f1f5f9;
    color: #475569;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 500;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.6rem 1.2rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.read-more-btn:hover {
    transform: translateX(3px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.read-more-btn.disabled {
    background: #94a3b8;
    cursor: not-allowed;
    pointer-events: none;
}

/* Coming Soon Cards */
.coming-soon {
    opacity: 0.8;
}

.coming-soon .card-image {
    position: relative;
}

.coming-soon .card-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
}

.status {
    background: #fbbf24;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

/* Newsletter Section */
.newsletter-section {
    background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.newsletter-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 80%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
}

.newsletter-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

.newsletter-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.newsletter-title {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin-bottom: 1.5rem;
    line-height: 1.1;
    text-align: left;
}

.newsletter-title .highlight {
    background: linear-gradient(45deg, #ffd700, #ffb347);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.newsletter-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.newsletter-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature {
    display: flex;
    align-items: center;
    gap: 1rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
}

.feature i {
    color: #ffd700;
    font-size: 1.2rem;
}

/* Newsletter Form */
.newsletter-form {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 2.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.input-wrapper {
    position: relative;
    margin-bottom: 1rem;
}

.input-icon {
    position: absolute;
    left: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 1.1rem;
}

.email-input {
    width: 100%;
    padding: 1rem 1rem 1rem 3.5rem;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.email-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.email-input:focus {
    outline: none;
    border-color: #ffd700;
    background: rgba(255, 255, 255, 0.15);
}

.subscribe-btn {
    width: 100%;
    background: linear-gradient(135deg, #ffd700, #ffb347);
    color: #1a202c;
    border: none;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.subscribe-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 215, 0, 0.3);
}

.privacy-note {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
}

.privacy-note i {
    color: #ffd700;
}

.success-message {
    background: rgba(34, 197, 94, 0.2);
    border: 1px solid rgba(34, 197, 94, 0.3);
    border-radius: 12px;
    padding: 1rem;
    color: #10b981;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.success-message i {
    color: #10b981;
}

.error-message {
    background: rgba(239, 68, 68, 0.2);
    border: 1px solid rgba(239, 68, 68, 0.3);
    border-radius: 12px;
    padding: 1rem;
    color: #ef4444;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.error-message i {
    color: #ef4444;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #64748b;
    grid-column: 1 / -1;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    color: #94a3b8;
}

.empty-state h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #475569;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .content-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .sidebar {
        position: static;
    }
    
    .sidebar-card {
        padding: 1.5rem;
    }
    
    .hero-content {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 2rem;
    }
    
    .newsletter-content {
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
    }
    
    .posts-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .newsletter-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
    }
    
    .container {
        padding: 0 1rem;
    }
    
    .newsletter-form {
        padding: 1.5rem;
    }
    
    .filter-buttons {
        flex-direction: row;
    }
    
    .keywords-list {
        gap: 0.3rem;
    }
    
    .keyword-tag {
        font-size: 0.7rem;
        padding: 0.2rem 0.6rem;
    }
}

@media (max-width: 480px) {
    .blogs-hero {
        padding: 80px 1rem 60px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .content-layout {
        gap: 1.5rem;
    }
    
    .sidebar-card {
        padding: 1rem;
    }
    
    .card-content {
        padding: 1.25rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
}
</style>

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
            
            // Update active state
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Update hidden input and submit form
            typeFilter.value = type;
            searchForm.submit();
        });
    });
    
    // Handle keyword tags
    keywordTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const keyword = this.dataset.keyword;
            
            // Set the search input value and submit form
            keywordSearch.value = keyword;
            searchForm.submit();
        });
    });
    
    // Handle search form submission
    searchForm.addEventListener('submit', function(e) {
        // Remove empty values before submission
        const formData = new FormData(this);
        const url = new URL(this.action || window.location.href);
        
        // Clear existing params
        url.search = '';
        
        // Add non-empty values
        for (let [key, value] of formData.entries()) {
            if (value.trim() !== '') {
                url.searchParams.set(key, value);
            }
        }
        
        // Navigate to new URL
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
            successMessage.style.display = 'none';
            errorMessage.style.display = 'none';
            
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
                    this.style.display = 'none';
                    successMessage.style.display = 'flex';
                    
                    // Reset form after 5 seconds
                    setTimeout(() => {
                        this.style.display = 'block';
                        successMessage.style.display = 'none';
                        this.reset();
                    }, 5000);
                } else {
                    errorMessage.querySelector('span').textContent = data.message || 'Something went wrong. Please try again.';
                    errorMessage.style.display = 'flex';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.querySelector('span').textContent = 'Network error. Please check your connection and try again.';
                errorMessage.style.display = 'flex';
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
