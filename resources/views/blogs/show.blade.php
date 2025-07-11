@extends('layouts.app')

@section('content')
<div class="blog-universe-container">
    <!-- Blog Hero Section -->
    <div class="blog-universe-hero">
        @if($blog->image)
            <div class="blog-universe-hero-image">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-universe-featured-img">
                <div class="blog-universe-hero-overlay"></div>
            </div>
        @endif
        <div class="blog-universe-hero-content">
            <div class="blog-universe-breadcrumb">
                <a href="{{ route('blogs.index') }}" class="blog-universe-breadcrumb-link">
                    <span class="blog-universe-breadcrumb-icon">←</span>
                    Back to Blogs
                </a>
            </div>
            <h1 class="blog-universe-hero-title">{{ $blog->title }}</h1>
            <div class="blog-universe-meta-info">
                <div class="blog-universe-meta-item">
                    <span class="blog-universe-meta-icon">📅</span>
                    <span class="blog-universe-meta-text">{{ $blog->created_at->format('F j, Y') }}</span>
                </div>
                <div class="blog-universe-meta-item">
                    <span class="blog-universe-meta-icon">⏱️</span>
                    <span class="blog-universe-meta-text">{{ ceil(str_word_count($blog->content) / 200) }} min read</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Content Section -->
    <div class="blog-universe-content-wrapper">
        <article class="blog-universe-article">
            <div class="blog-universe-content-body">
                {!! nl2br(e($blog->content)) !!}
            </div>
        </article>

        <!-- Blog Sidebar -->
        <aside class="blog-universe-sidebar">
            <div class="blog-universe-sidebar-card">
                <h3 class="blog-universe-sidebar-title">Share This Article</h3>
                <div class="blog-universe-share-buttons">
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank" class="blog-universe-share-btn blog-universe-twitter">
                        <span class="blog-universe-share-icon">🐦</span>
                        Twitter
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank" class="blog-universe-share-btn blog-universe-facebook">
                        <span class="blog-universe-share-icon">📘</span>
                        Facebook
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank" class="blog-universe-share-btn blog-universe-linkedin">
                        <span class="blog-universe-share-icon">💼</span>
                        LinkedIn
                    </a>
                </div>
            </div>

            <div class="blog-universe-sidebar-card">
                <h3 class="blog-universe-sidebar-title">Quick Navigation</h3>
                <div class="blog-universe-nav-buttons">
                    <a href="{{ route('blogs.index') }}" class="blog-universe-nav-btn">
                        <span class="blog-universe-nav-icon">📚</span>
                        All Blogs
                    </a>
                    @auth
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="blog-universe-nav-btn blog-universe-edit">
                            <span class="blog-universe-nav-icon">✏️</span>
                            Edit Blog
                        </a>
                    @endauth
                </div>
            </div>
        </aside>
    </div>
</div>

<style>
.blog-universe-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.blog-universe-hero {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-bottom: 3rem;
    border-radius: 0 0 30px 30px;
    overflow: hidden;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.blog-universe-hero-image {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
}

.blog-universe-featured-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.blog-universe-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
    z-index: 2;
}

.blog-universe-hero-content {
    position: relative;
    z-index: 3;
    max-width: 800px;
    padding: 2rem;
}

.blog-universe-breadcrumb {
    margin-bottom: 1.5rem;
}

.blog-universe-breadcrumb-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    backdrop-filter: blur(10px);
}

.blog-universe-breadcrumb-link:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateX(-5px);
    color: white;
}

.blog-universe-hero-title {
    font-size: 3rem;
    font-weight: 800;
    margin: 0 0 1.5rem 0;
    line-height: 1.2;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.blog-universe-meta-info {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.blog-universe-meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    backdrop-filter: blur(10px);
}

.blog-universe-meta-icon {
    font-size: 1.1rem;
}

.blog-universe-meta-text {
    font-weight: 500;
}

.blog-universe-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 3rem;
    padding: 0 2rem;
    margin-bottom: 4rem;
}

.blog-universe-article {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.blog-universe-content-body {
    padding: 3rem;
    font-size: 1.1rem;
    line-height: 1.8;
    color: #2d3748;
}

.blog-universe-content-body p {
    margin-bottom: 1.5rem;
}

.blog-universe-sidebar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.blog-universe-sidebar-card {
    background: white;
    border-radius: 20px;
    padding: 1.5rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.blog-universe-sidebar-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
}

.blog-universe-sidebar-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 1rem;
    text-align: center;
}

.blog-universe-share-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.blog-universe-share-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    color: white;
}

.blog-universe-twitter {
    background: linear-gradient(45deg, #1da1f2, #0d8bd9);
}

.blog-universe-facebook {
    background: linear-gradient(45deg, #4267b2, #365899);
}

.blog-universe-linkedin {
    background: linear-gradient(45deg, #0077b5, #005885);
}

.blog-universe-share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.blog-universe-nav-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.blog-universe-nav-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
}

.blog-universe-nav-btn.blog-universe-edit {
    background: linear-gradient(45deg, #ffa726, #ff9800);
}

.blog-universe-nav-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.blog-universe-related-section {
    padding: 3rem 2rem;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 30px 30px 0 0;
    margin-top: 3rem;
}

.blog-universe-related-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 2rem;
}

.blog-universe-related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.blog-universe-related-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.blog-universe-related-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 50px rgba(0, 0, 0, 0.15);
}

.blog-universe-related-image {
    height: 180px;
    overflow: hidden;
}

.blog-universe-related-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-universe-related-card:hover .blog-universe-related-img {
    transform: scale(1.05);
}

.blog-universe-related-content {
    padding: 1.5rem;
}

.blog-universe-related-card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.blog-universe-related-excerpt {
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.blog-universe-related-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.blog-universe-related-link:hover {
    color: #5a67d8;
    transform: translateX(5px);
}

.blog-universe-related-arrow {
    transition: transform 0.3s ease;
}

.blog-universe-related-link:hover .blog-universe-related-arrow {
    transform: translateX(5px);
}

@media (max-width: 1024px) {
    .blog-universe-content-wrapper {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .blog-universe-sidebar {
        order: -1;
    }
    
    .blog-universe-share-buttons,
    .blog-universe-nav-buttons {
        flex-direction: row;
        flex-wrap: wrap;
    }
}

@media (max-width: 768px) {
    .blog-universe-container {
        padding: 0;
    }
    
    .blog-universe-hero-title {
        font-size: 2rem;
    }
    
    .blog-universe-meta-info {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    
    .blog-universe-content-wrapper {
        padding: 0 1rem;
    }
    
    .blog-universe-content-body {
        padding: 2rem;
    }
    
    .blog-universe-related-section {
        padding: 2rem 1rem;
    }
    
    .blog-universe-related-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .blog-universe-hero-title {
        font-size: 1.5rem;
    }
    
    .blog-universe-content-body {
        padding: 1.5rem;
        font-size: 1rem;
    }
    
    .blog-universe-share-buttons,
    .blog-universe-nav-buttons {
        flex-direction: column;
    }
}
</style>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
