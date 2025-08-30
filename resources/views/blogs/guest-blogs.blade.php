@extends('layouts.app')

@section('title', 'Guest Blogs - Top Outsourcing Partners | Industry Insights & Innovation')
@section('meta_description', 'Explore guest blog posts and expert insights from industry leaders at Top Outsourcing Partners. Discover innovative perspectives on business outsourcing, technology trends, and strategic growth from guest contributors and thought leaders.')
@section('meta_keywords', 'guest blogs, industry insights, business outsourcing insights, technology trends, expert perspectives, thought leadership, innovation, strategic growth, guest contributors')

<!-- @push('styles')
  @vite('resources/css/guest-blogs.css')
@endpush -->

@section('content')
<style>
/* Guest Blogs (aligned to site tokens) */
:root {
  --slate-50: #f8fafc;
  --slate-100: #f1f5f9;
  --slate-200: #e2e8f0;
  --slate-300: #e5e7eb;
  --slate-600: #475569;
  --slate-700: #334155;
}

/* Utilities */
.is-hidden { display: none !important; }

/* Page container */
.modern-blogs-container {
  min-height: 100vh;
  background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
  color: var(--ink);
  font-family: "Plus Jakarta Sans", sans-serif;
}

/* Hero Section */
.blogs-hero {
  padding: 96px 16px 64px;
  background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
  border-bottom: 1px solid rgba(17,24,39,0.06);
  position: relative;
  overflow: hidden;
}
.hero-content {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 380px;
  gap: 48px;
  align-items: center;
  position: relative;
  z-index: 1;
}
.hero-title {
  font-size: clamp(2rem, 3vw + 1rem, 3.25rem);
  font-weight: 800;
  color: var(--ink);
  margin: 0 0 12px;
  line-height: 1.15;
}
.hero-title .highlight { color: var(--brand-green); }
.hero-subtitle {
  font-size: 1.05rem;
  color: var(--muted);
  line-height: 1.7;
  margin: 0;
}
.hero-visual { display: flex; justify-content: center; align-items: center; }
.floating-card {
  background: rgba(255,255,255,0.8);
  backdrop-filter: blur(16px);
  border: 1px solid rgba(17,24,39,0.08);
  border-radius: 16px;
  padding: 20px 22px;
  text-align: center;
  color: var(--ink);
  box-shadow: 0 12px 30px rgba(0,0,0,0.08);
  animation: float 6s ease-in-out infinite;
}
.floating-card i {
  font-size: 2rem;
  margin-bottom: 8px;
  color: var(--brand-green);
}
.floating-card span { font-size: 1rem; font-weight: 700; }
@keyframes float { 0%,100%{transform: translateY(0)} 50%{transform: translateY(-12px)} }

/* Content Categories */
.content-categories {
  background: #ffffff;
  padding: 64px 0 80px;
}
.modern-blogs-container .container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 2rem;
}
.content-layout {
  display: grid;
  grid-template-columns: 300px 1fr;
  gap: 48px;
  align-items: start;
}

/* Sidebar */
.sidebar { position: sticky; top: 20px; }
.sidebar-card {
  background: var(--white);
  border-radius: 16px;
  padding: 20px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.06);
  border: 1px solid rgba(17,24,39,0.08);
}
.sidebar-title {
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--ink);
  margin: 0 0 16px;
  display: flex; align-items: center; gap: 8px;
}
.sidebar-title i { color: var(--brand-green); }

/* Search */
.search-form { margin-bottom: 20px; }
.search-input-group { position: relative; margin-bottom: 14px; }
.search-input {
  width: 100%;
  padding: 12px 40px 12px 14px;
  border: 1px solid rgba(17,24,39,0.12);
  border-radius: 12px;
  font-size: 0.95rem;
  background: #f9fafb;
  transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
}
.search-input:focus {
  outline: none;
  border-color: var(--brand-green);
  background: var(--white);
  box-shadow: 0 0 0 3px rgba(46,164,79,0.12);
}
.search-btn {
  position: absolute;
  right: 6px; top: 50%; transform: translateY(-50%);
  background: var(--brand-green);
  color: var(--white);
  border: none; border-radius: 8px;
  padding: 8px;
  cursor: pointer;
  transition: transform .15s ease, box-shadow .2s ease, background .2s ease;
}
.search-btn:hover { transform: translateY(-50%) translateX(1px); box-shadow: 0 4px 10px rgba(46,164,79,0.25); }

/* Filters */
.filter-group { margin-bottom: 16px; }
.filter-label {
  font-size: 0.875rem; font-weight: 700; color: var(--ink);
  margin-bottom: 8px; display: block;
}
.filter-buttons { display: flex; flex-direction: column; gap: 8px; }
.filter-btn {
  background: #f9fafb;
  border: 1px solid rgba(17,24,39,0.12);
  border-radius: 10px;
  padding: 8px 12px;
  font-size: 0.9rem; font-weight: 600; color: var(--muted);
  cursor: pointer; text-align: left;
  transition: border-color .2s ease, color .2s ease, background .2s ease;
}
.filter-btn:hover { border-color: var(--brand-green); color: var(--brand-green); background: #f3faf5; }
.filter-btn.active { background: var(--brand-green); border-color: var(--brand-green); color: var(--white); }

/* Keywords */
.keywords-section { margin-top: 10px; }
.keywords-title {
  font-size: 0.95rem; font-weight: 700; color: var(--ink);
  margin: 0 0 10px; display: flex; align-items: center; gap: 6px;
}
.keywords-title i { color: var(--brand-green); font-size: 0.9rem; }
.keywords-list { display: flex; flex-wrap: wrap; gap: 6px; }
.keyword-tag {
  background: #f1f5f9; color: #475569;
  border: 1px solid #e2e8f0; border-radius: 999px;
  padding: 4px 10px; font-size: 0.8rem; font-weight: 600; cursor: pointer;
  transition: background .2s ease, color .2s ease, border-color .2s ease;
}
.keyword-tag:hover,
.keyword-tag.active { background: var(--brand-green); color: var(--white); border-color: var(--brand-green); }

/* Clear filters */
.clear-filters { padding-top: 12px; border-top: 1px solid #e2e8f0; }
.clear-btn {
  display: inline-flex; align-items: center; gap: 8px;
  color: #dc2626; font-size: 0.9rem; font-weight: 700; text-decoration: none;
}
.clear-btn:hover { color: #b91c1c; }

/* Main content */
.main-content { min-width: 0; }
.category-section { margin-bottom: 56px; }
.category-section:last-child { margin-bottom: 0; }

.section-header { text-align: center; margin-bottom: 28px; }
.section-title {
  font-size: clamp(1.5rem, 1.2vw + 1rem, 2rem);
  font-weight: 800; color: var(--ink);
  margin: 0 0 8px; display: flex; align-items: center; justify-content: center; gap: 10px; flex-wrap: wrap;
}
.section-title i { color: var(--brand-green); font-size: 1.5rem; }
.filter-indicator { font-size: 1rem; color: var(--brand-green); font-weight: 700; }
.section-subtitle {
  font-size: 1rem; color: var(--muted); max-width: 640px; margin: 0 auto; line-height: 1.7;
}

/* Posts grid */
.posts-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 24px;
}

/* Cards */
.content-card {
  background: var(--white);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  transition: transform .2s ease, box-shadow .2s ease;
  position: relative;
  border: 1px solid rgba(17,24,39,0.08);
}
.content-card:hover { transform: translateY(-4px); box-shadow: 0 14px 34px rgba(0,0,0,0.10); }
.card-image { position: relative; height: 200px; overflow: hidden; }
.card-image img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s ease; }
.content-card:hover .card-image img { transform: scale(1.05); }
.placeholder-image {
  width: 100%; height: 100%;
  background: linear-gradient(180deg, #eaf2fb 0%, #f3f4f6 100%);
  display: grid; place-items: center; color: var(--brand-green); font-size: 2rem;
}
.card-overlay { position: absolute; top: 12px; left: 12px; }
.content-type {
  background: rgba(255,255,255,0.95);
  color: var(--brand-green); padding: 6px 10px;
  border-radius: 999px; font-size: 0.75rem; font-weight: 700;
}
.card-content { padding: 16px; }
.card-meta {
  display: flex; gap: 12px; margin-bottom: 10px; font-size: 0.85rem; color: var(--muted);
}
.card-meta span { display: inline-flex; align-items: center; gap: 6px; }
.card-meta i { color: var(--brand-green); }
.card-title {
  font-size: 1.1rem; font-weight: 800; color: var(--ink);
  margin: 0 0 8px; line-height: 1.35;
}
.card-excerpt { color: var(--muted); line-height: 1.7; margin: 0 0 12px; font-size: 0.95rem; }

/* Keywords inside card */
.card-keywords { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 12px; }
.keyword-badge {
  background: #f1f5f9; color: #475569; padding: 4px 8px; border-radius: 999px; font-size: 0.75rem; font-weight: 700;
}

/* Read more button */
.read-more-btn {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--ink); color: var(--white);
  padding: 10px 14px; border-radius: 12px; text-decoration: none;
  font-weight: 700; font-size: 0.9rem; border: 1px solid var(--ink);
  transition: transform .15s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
}
.read-more-btn:hover,
.read-more-btn:focus-visible { background: var(--brand-green); border-color: var(--brand-green); transform: translateX(2px); box-shadow: 0 6px 16px rgba(46,164,79,0.25); }
.read-more-btn.disabled { background: #94a3b8; border-color: #94a3b8; cursor: not-allowed; pointer-events: none; }

/* Coming soon */
.coming-soon { opacity: 0.92; }
.coming-soon .card-image::after {
  content: ""; position: absolute; inset: 0; background: rgba(0,0,0,0.18);
}
.status {
  background: #fbbf24; color: #111; padding: 4px 10px; border-radius: 999px; font-size: 0.75rem; font-weight: 800;
}

/* Newsletter Section */
.newsletter-section {
  background: linear-gradient(180deg, #0b1220 0%, #111827 100%);
  padding: 80px 0;
  position: relative; overflow: hidden;
}
.newsletter-section::before {
  content: ""; position: absolute; inset: 0;
  background: radial-gradient(40% 40% at 20% 80%, rgba(46,164,79,0.18) 0%, transparent 60%),
              radial-gradient(40% 40% at 80% 20%, rgba(148,163,184,0.18) 0%, transparent 60%);
}
.newsletter-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; position: relative; z-index: 1; }
.newsletter-content { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; }
.newsletter-title {
  font-size: clamp(1.8rem, 1.8vw + 1rem, 2.6rem);
  font-weight: 800; color: #fff; margin: 0 0 12px; line-height: 1.15;
}
.newsletter-title .highlight { color: var(--brand-green); }
.newsletter-subtitle { font-size: 1.05rem; color: rgba(255,255,255,0.85); line-height: 1.7; margin: 0 0 16px; }
.newsletter-features { display: flex; flex-direction: column; gap: 10px; }
.feature { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,0.9); font-weight: 700; }
.feature i { color: var(--brand-green); }

/* Newsletter form card */
.newsletter-form {
  background: rgba(255,255,255,0.06);
  backdrop-filter: blur(18px);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 16px;
  padding: 24px;
}
.subscription-form .form-group { margin-bottom: 12px; }
.input-wrapper { position: relative; margin-bottom: 10px; }
.email-input {
  width: 100%;
  padding: 14px; border-radius: 12px;
  border: 1px solid rgba(255,255,255,0.2);
  background: rgba(255,255,255,0.08);
  color: #fff; font-size: 1rem;
  transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
}
.email-input::placeholder { color: rgba(255,255,255,0.6); }
.email-input:focus {
  outline: none;
  border-color: var(--brand-green);
  background: rgba(255,255,255,0.12);
  box-shadow: 0 0 0 3px rgba(46,164,79,0.18);
}
.subscribe-btn {
  width: 100%;
  background: var(--brand-green);
  color: var(--white);
  border: 1px solid var(--brand-green);
  padding: 12px 18px; border-radius: 12px;
  font-weight: 800; font-size: 1rem; cursor: pointer;
  transition: transform .15s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
}
.subscribe-btn:hover,
.subscribe-btn:focus-visible { transform: translateY(-1px); box-shadow: 0 10px 24px rgba(46,164,79,0.25); }

/* Messages */
.success-message,
.error-message {
  border-radius: 12px;
  padding: 12px 14px;
  font-weight: 700;
  display: flex; align-items: center; gap: 8px;
}
.success-message {
  background: rgba(46,164,79,0.12);
  border: 1px solid rgba(46,164,79,0.25);
  color: #10b981;
}
.success-message i { color: #10b981; }
.error-message {
  background: rgba(239,68,68,0.12);
  border: 1px solid rgba(239,68,68,0.25);
  color: #ef4444;
}
.error-message i { color: #ef4444; }

/* Empty State */
.empty-state {
  text-align: center; padding: 48px 16px; color: var(--muted); grid-column: 1 / -1;
}
.empty-state i { font-size: 3rem; margin-bottom: 10px; color: #94a3b8; }
.empty-state h3 { font-size: 1.25rem; font-weight: 800; margin: 0 0 6px; color: var(--ink); }

/* Responsive */
@media (max-width: 1024px) {
  .content-layout { grid-template-columns: 1fr; gap: 24px; }
  .sidebar { position: static; }
  .hero-content { grid-template-columns: 1fr; text-align: center; gap: 24px; }
  .newsletter-content { grid-template-columns: 1fr; gap: 24px; text-align: center; }
  .posts-grid { grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 18px; }
}
@media (max-width: 768px) {
  .hero-title { font-size: clamp(1.8rem, 3.2vw + 1rem, 2.4rem); }
  .section-title { font-size: 1.5rem; flex-direction: column; gap: 6px; }
  .posts-grid { grid-template-columns: 1fr; }
  .modern-blogs-container .container { padding: 0 1rem; }
  .newsletter-form { padding: 18px; }
  .filter-buttons { flex-direction: row; flex-wrap: wrap; }
  .keywords-list { gap: 4px; }
  .keyword-tag { font-size: 0.7rem; padding: 3px 8px; }
}
@media (max-width: 480px) {
  .blogs-hero { padding: 64px 12px 48px; }
  .card-content { padding: 14px; }
}

/* Focus visibility if global outline removed */
button:focus-visible,
a:focus-visible,
input:focus-visible { outline: 2px solid var(--brand-green); outline-offset: 2px; }

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  * { animation: none !important; transition: none !important; }
}
</style>
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