@extends('layouts.app')

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
            <!-- Blog Posts Section -->
            <div class="category-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-blog"></i>
                        Latest Blog Posts
                    </h2>
                    <p class="section-subtitle">
                        Explore our latest thoughts on technology, business, and innovation
                    </p>
                </div>
                
                <div class="horizontal-scroll-container">
                    <div class="scroll-content">
                        @php $blogPosts = $blogs->where('type', 'blog'); @endphp
                        @if($blogPosts->count() > 0)
                            @foreach($blogPosts as $blog)
                                <article class="content-card blog-card">
                                    <div class="card-image">
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
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
                                <h3>No Blog Posts Yet</h3>
                                <p>Check back soon for our latest insights and articles.</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Scroll Controls -->
                    <div class="scroll-controls">
                        <button class="scroll-btn scroll-left" data-target="blog-posts">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="scroll-btn scroll-right" data-target="blog-posts">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Case Studies Section -->
            <div class="category-section">
                <div class="section-header">
                    <h2 class="section-title">
                        <i class="fas fa-chart-line"></i>
                        Case Studies
                    </h2>
                    <p class="section-subtitle">
                        Real-world success stories and transformative partnerships
                    </p>
                </div>
                
                <div class="horizontal-scroll-container">
                    <div class="scroll-content" id="case-studies">
                        @php $caseStudies = $blogs->where('type', 'case_study'); @endphp
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
                                        <a href="{{ route('blogs.show', $caseStudy->id) }}" class="read-more-btn">
                                            Read Case Study
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        @else
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
                        @endif
                    </div>
                    
                    <!-- Scroll Controls -->
                    <div class="scroll-controls">
                        <button class="scroll-btn scroll-left" data-target="case-studies">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="scroll-btn scroll-right" data-target="case-studies">
                            <i class="fas fa-chevron-right"></i>
                        </button>
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
                                <i class="fas fa-envelope input-icon"></i>
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

.category-section {
    margin-bottom: 80px;
}

.category-section:last-child {
    margin-bottom: 0;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.section-title i {
    color: #667eea;
    font-size: 2rem;
}

.section-subtitle {
    font-size: 1.1rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Horizontal Scroll Container */
.horizontal-scroll-container {
    position: relative;
    overflow: hidden;
    padding: 2rem 0;
}

.scroll-content {
    display: flex;
    gap: 2rem;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 0 2rem;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.scroll-content::-webkit-scrollbar {
    display: none;
}

/* Content Cards */
.content-card {
    flex: 0 0 400px;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.content-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.card-image {
    position: relative;
    height: 250px;
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
    font-size: 3rem;
}

.card-overlay {
    position: absolute;
    top: 1rem;
    left: 1rem;
}

.content-type {
    background: rgba(255, 255, 255, 0.9);
    color: #667eea;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
}

.card-content {
    padding: 2rem;
}

.card-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    color: #64748b;
}

.card-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-meta i {
    color: #667eea;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 1rem;
    line-height: 1.3;
}

.card-excerpt {
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.read-more-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.read-more-btn:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
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

/* Scroll Controls */
.scroll-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
    z-index: 10;
}

.scroll-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #667eea;
    cursor: pointer;
    transition: all 0.3s ease;
    pointer-events: all;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.scroll-btn:hover {
    background: #667eea;
    color: white;
    transform: scale(1.1);
}

.scroll-left {
    margin-left: -25px;
}

.scroll-right {
    margin-right: -25px;
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
    min-width: 400px;
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
    
    .content-card {
        flex: 0 0 350px;
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
    
    .content-card {
        flex: 0 0 300px;
    }
    
    .scroll-content {
        padding: 0 1rem;
    }
    
    .container {
        padding: 0 1rem;
    }
    
    .newsletter-form {
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    .blogs-hero {
        padding: 80px 1rem 60px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .content-card {
        flex: 0 0 280px;
    }
    
    .card-content {
        padding: 1.5rem;
    }
}
</style>

<script>
// Horizontal scroll functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize scroll controls
    const scrollBtns = document.querySelectorAll('.scroll-btn');
    
    scrollBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const target = this.dataset.target;
            const container = document.getElementById(target) || document.querySelector('.scroll-content');
            const scrollAmount = 420; // Card width + gap
            
            if (this.classList.contains('scroll-left')) {
                container.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                container.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Newsletter form handling
    const newsletterForm = document.getElementById('newsletterForm');
    const successMessage = document.getElementById('subscriptionSuccess');
    const errorMessage = document.getElementById('subscriptionError');
    
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
});

// Touch/swipe support for mobile
let isDown = false;
let startX;
let scrollLeftPos;

document.querySelectorAll('.scroll-content').forEach(container => {
    container.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeftPos = container.scrollLeft;
        container.style.cursor = 'grabbing';
    });

    container.addEventListener('mouseleave', () => {
        isDown = false;
        container.style.cursor = 'grab';
    });

    container.addEventListener('mouseup', () => {
        isDown = false;
        container.style.cursor = 'grab';
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2;
        container.scrollLeft = scrollLeftPos - walk;
    });
    
    // Touch events for mobile
    container.addEventListener('touchstart', (e) => {
        startX = e.touches[0].pageX - container.offsetLeft;
        scrollLeftPos = container.scrollLeft;
    });
    
    container.addEventListener('touchmove', (e) => {
        if (!startX) return;
        const x = e.touches[0].pageX - container.offsetLeft;
        const walk = (x - startX) * 2;
        container.scrollLeft = scrollLeftPos - walk;
    });
});
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
