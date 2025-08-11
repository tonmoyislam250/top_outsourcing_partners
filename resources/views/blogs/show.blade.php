@extends('layouts.app')

@section('content')
<div class="modern-blog-container">
    <!-- Header Section -->
    <div class="blog-header" @if($blog->image) style="background-image: url('{{ $blog->image }}');" @endif>
        <div class="header-overlay"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Navigation -->
                    <navigate class="header-breadcrumb">
                        <a href="{{ route('blogs.index') }}" class="breadcrumb-link">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to {{ $blog->type === 'case_study' ? 'Case Studies' : 'Blog Posts' }}</span>
                        </a>
                    </navigate>
                    
                    <!-- Header Content -->
                    <div class="header-content">
                        <div class="header-left">
                            <!-- Article Badge -->
                            <div class="article-badge">
                                <span class="badge-icon">
                                    <i class="fas {{ $blog->type === 'case_study' ? 'fa-chart-line' : 'fa-blog' }}"></i>
                                </span>
                                <span class="badge-text">{{ $blog->formatted_type }}</span>
                            </div>
                            
                            <!-- Title -->
                            <h1 class="header-title">{{ $blog->title }}</h1>
                            
                            <!-- Meta Information -->
                            <div class="header-meta">
                                <div class="meta-right">
                                    <div class="article-stats">
                                        <span class="stat-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            {{ $blog->created_at->format('M d, Y') }}
                                        </span>
                                        <span class="stat-item">
                                            <i class="fas fa-clock"></i>
                                            {{ ceil(str_word_count($blog->content) / 200) }} min read
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="blog-content-section">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Sidebar - Author Info -->
                <div class="col-lg-3">
                    <div class="author-sidebar">
                        <div class="author-card">
                            <div class="author-avatar">
                                <img src="{{ $blog->user->avatar ?? asset('images/avatars/default-avatar.png') }}" 
                                     alt="{{ $blog->user->name }}" class="avatar-img">
                            </div>
                            <div class="author-info">
                                <h4 class="author-name">{{ $blog->user->name }}</h4>
                                <p class="author-title">Content Author</p>
                                <p class="author-bio">Passionate about sharing insights and creating valuable content for our readers.</p>
                            </div>
                            <div class="author-stats">
                                <div class="stat-item">
                                    <span class="stat-number">{{ $blog->user->blogs()->count() }}</span>
                                    <span class="stat-label">Articles</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">{{ $blog->created_at->format('M Y') }}</span>
                                    <span class="stat-label">Joined</span>
                                </div>
                            </div>
                        </div>

                        <!-- Table of Contents (if article is long) -->
                        @if(strlen($blog->content) > 2000)
                        <div class="toc-card">
                            <h5 class="toc-title">
                                <i class="fas fa-list"></i>
                                Table of Contents
                            </h5>
                            <div id="table-of-contents" class="toc-list">
                                <!-- Will be populated by JavaScript -->
                            </div>
                        </div>
                        @endif

                        <!-- Share Section -->
                        <div class="share-card">
                            <h5 class="share-title">
                                <i class="fas fa-share-alt"></i>
                                Share Article
                            </h5>
                            <div class="share-buttons">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="share-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                    Twitter
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="share-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="share-btn linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                    LinkedIn
                                </a>
                                <button onclick="copyToClipboard()" class="share-btn copy">
                                    <i class="fas fa-link"></i>
                                    Copy Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Center - Main Content -->
                <div class="col-lg-6">
                    <article class="blog-article">
                        <div class="article-content">
                            {!! $blog->content !!}
                        </div>
                    </article>

                    <!-- Article Actions -->
                    <div class="article-actions">
                        @auth
                            @if(auth()->user()->id === $blog->user_id || auth()->user()->is_admin)
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="action-btn edit">
                                <i class="fas fa-edit"></i>
                                Edit Article
                            </a>
                            @endif
                        @endauth
                        
                        <button onclick="window.print()" class="action-btn print">
                            <i class="fas fa-print"></i>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Right Sidebar - Keywords & Related -->
                <div class="col-lg-3">
                    <div class="content-sidebar">
                        <!-- Keywords -->
                        @if($blog->keywords && count($blog->keywords) > 0)
                        <div class="keywords-card">
                            <h5 class="sidebar-title">
                                <i class="fas fa-tags"></i>
                                Keywords
                            </h5>
                            <div class="keywords-list">
                                @foreach($blog->keywords as $keyword)
                                <span class="keyword-tag">{{ $keyword }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Article Info -->
                        <div class="info-card">
                            <h5 class="sidebar-title">
                                <i class="fas fa-info-circle"></i>
                                Article Info
                            </h5>
                            <div class="info-list">
                                <div class="info-item">
                                    <span class="info-label">Type:</span>
                                    <span class="info-value">{{ $blog->formatted_type }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Published:</span>
                                    <span class="info-value">{{ $blog->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Reading Time:</span>
                                    <span class="info-value">{{ ceil(str_word_count($blog->content) / 200) }} minutes</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Word Count:</span>
                                    <span class="info-value">{{ str_word_count($blog->content) }} words</span>
                                </div>
                            </div>
                        </div>

                        <!-- Related Articles -->
                        @php
                            $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
                                ->where('type', $blog->type)
                                ->latest()
                                ->limit(3)
                                ->get();
                        @endphp

                        @if($relatedBlogs->count() > 0)
                        <div class="related-card">
                            <h5 class="sidebar-title">
                                <i class="fas fa-newspaper"></i>
                                Related {{ $blog->type === 'case_study' ? 'Case Studies' : 'Articles' }}
                            </h5>
                            <div class="related-list">
                                @foreach($relatedBlogs as $related)
                                <a href="{{ route('blogs.show', $related) }}" class="related-item">
                                    @if($related->image)
                                    <div class="related-image">
                                        <img src="{{ $related->image }}" alt="{{ $related->title }}">
                                    </div>
                                    @endif
                                    <div class="related-content">
                                        <h6 class="related-title">{{ $related->title }}</h6>
                                        <span class="related-date">{{ $related->created_at->format('M d, Y') }}</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Quick Navigation -->
                        <div class="navigation-card">
                            <h5 class="sidebar-title">
                                <i class="fas fa-compass"></i>
                                Quick Navigation
                            </h5>
                            <div class="nav-buttons">
                                <a href="{{ route('blogs.index') }}" class="nav-btn">
                                    <i class="fas fa-home"></i>
                                    All Articles
                                </a>
                                <a href="{{ route('blogs.index') }}?type=blog" class="nav-btn">
                                    <i class="fas fa-blog"></i>
                                    Blog Posts
                                </a>
                                <a href="{{ route('blogs.index') }}?type=case_study" class="nav-btn">
                                    <i class="fas fa-chart-line"></i>
                                    Case Studies
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.modern-blog-container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    min-height: 100vh;
}

.blog-header {
    background: white;
    padding: 0;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
    position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 400px;
    display: flex;
    align-items: flex-end;
    background-attachment: fixed;
}

.header-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.7) 100%);
    z-index: 1;
}

.blog-header .container-fluid {
    position: relative;
    z-index: 2;
    width: 100%;
    padding-bottom: 3rem;
}

.header-breadcrumb {
    position: absolute;
    top: -8.5rem;
    left: -0.5rem;
    z-index: 3;
}

.breadcrumb-link {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 0.75rem 1.25rem;
    border-radius: 50px;
    backdrop-filter: blur(15px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.breadcrumb-link:hover {
    background: rgba(0, 0, 0, 0.6);
    transform: translateX(-3px);
    color: white;
    text-decoration: none;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.breadcrumb-link i {
    font-size: 0.875rem;
    color: white;
}

.breadcrumb-link span {
    color: white;
    font-weight: 600;
}

.header-content {
    display: flex;
    align-items: flex-end;
    min-height: 200px;
}

.header-left {
    flex: 1;
    max-width: 100%;
}

.article-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.9);
    color: #667eea;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.875rem;
    margin-bottom: 1rem;
    backdrop-filter: blur(10px);
}

.badge-icon {
    width: 20px;
    height: 20px;
    background: #667eea;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
}

.header-title {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin-bottom: 1.5rem;
    line-height: 1.1;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    background: transparent !important;
    backdrop-filter: none !important;
}

.header-meta {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 2rem;
    flex-wrap: wrap;
}

.author-info-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.75rem 1.25rem;
    border-radius: 50px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.author-avatar-small {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.author-avatar-small.default-avatar {
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.author-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.author-name {
    font-weight: 700;
    color: white;
    font-size: 1rem;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.author-role {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

.article-stats {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: white;
    font-weight: 500;
    font-size: 0.875rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 25px;
    backdrop-filter: blur(10px);
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.stat-item i {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.875rem;
}

.blog-header h1.blog-title {
    color: white;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    background: transparent !important;
    backdrop-filter: none !important;
}

/* Fallback styles for headers without images */
.blog-header:not([style*="background-image"]) {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.blog-header:not([style*="background-image"]) .header-overlay {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.3) 100%);
}

.blog-header:not([style*="background-image"]) .breadcrumb-link {
    background: rgba(0, 0, 0, 0.3);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.4);
}

.blog-header:not([style*="background-image"]) .breadcrumb-link:hover {
    background: rgba(0, 0, 0, 0.5);
    color: white;
}

.blog-header:not([style*="background-image"]) .header-title {
    color: white;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    background: transparent !important;
    backdrop-filter: none !important;
}

.blog-header:not([style*="background-image"]) .article-stats .stat-item {
    color: white;
}

.blog-header:not([style*="background-image"]) .stat-item i {
    color: rgba(255, 255, 255, 0.9);
}

.blog-content-section {
    padding: 0 0 4rem 0;
}

/* Author Sidebar */
.author-sidebar {
    position: sticky;
    top: 2rem;
}

.author-card, .toc-card, .share-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.author-card:hover, .toc-card:hover, .share-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
}

.author-avatar {
    text-align: center;
    margin-bottom: 1rem;
}

.avatar-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #f1f5f9;
}

.author-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 0.25rem;
    text-align: center;
}

.author-title {
    color: #667eea;
    font-weight: 600;
    text-align: center;
    margin-bottom: 0.75rem;
}

.author-bio {
    color: #64748b;
    font-size: 0.875rem;
    line-height: 1.6;
    text-align: center;
    margin-bottom: 1rem;
}

.author-stats {
    display: flex;
    justify-content: space-around;
    border-top: 1px solid #e2e8f0;
    padding-top: 1rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 1.25rem;
    font-weight: 700;
    color: #1a202c;
}

.stat-label {
    font-size: 0.75rem;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.toc-title, .share-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.toc-title i, .share-title i {
    color: #667eea;
}

.toc-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.toc-list li {
    margin-bottom: 0.5rem;
}

.toc-link {
    display: block;
    padding: 0.5rem 0.75rem;
    color: #64748b;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-weight: 500;
    text-align: justify;
    line-height: 1.4;
}

.toc-link:hover {
    background: #f8fafc;
    color: #667eea;
    transform: translateX(3px);
}

.toc-sub-item .toc-link {
    margin-left: 1rem;
    font-size: 0.875rem;
    color: #94a3b8;
}

.share-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.share-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    width: 100%;
}

.share-btn.twitter {
    background: #1da1f2;
    color: white;
}

.share-btn.facebook {
    background: #4267b2;
    color: white;
}

.share-btn.linkedin {
    background: #0077b5;
    color: white;
}

.share-btn.copy {
    background: #6b7280;
    color: white;
}

.share-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Main Article */
.blog-article {
    background: white;
    border-radius: 16px;
    padding: 3rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
}

.article-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #374151;
    text-align: justify;
}

.article-content h1, .article-content h2, .article-content h3, 
.article-content h4, .article-content h5, .article-content h6 {
    color: #1a202c;
    margin-top: 2em;
    margin-bottom: 1em;
    font-weight: 700;
    text-align: left;
}

.article-content h2 {
    font-size: 1.875rem;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 0.5rem;
}

.article-content h3 {
    font-size: 1.5rem;
}

.article-content p {
    margin-bottom: 1.5rem;
    text-align: justify;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 2rem 0;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.article-content blockquote {
    border-left: 4px solid #667eea;
    margin: 2rem 0;
    padding: 1.5rem 0 1.5rem 2rem;
    background: #f8fafc;
    border-radius: 0 12px 12px 0;
    font-style: italic;
    color: #4a5568;
    text-align: justify;
}

.article-content code {
    background: #f1f5f9;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-family: 'Fira Code', 'Courier New', monospace;
    font-size: 0.875rem;
    color: #e53e3e;
}

.article-content pre {
    background: #1a202c;
    color: #e2e8f0;
    padding: 1.5rem;
    border-radius: 12px;
    overflow-x: auto;
    margin: 2rem 0;
    text-align: left;
}

.article-content a {
    color: #667eea;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: all 0.3s ease;
}

.article-content a:hover {
    border-bottom-color: #667eea;
}

.article-content ul, .article-content ol {
    text-align: justify;
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.article-content li {
    margin-bottom: 0.5rem;
    text-align: justify;
}

.article-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.action-btn.edit {
    background: linear-gradient(45deg, #ffa726, #ff9800);
    color: white;
}

.action-btn.print {
    background: #6b7280;
    color: white;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Content Sidebar */
.content-sidebar {
    position: sticky;
    top: 2rem;
}

.keywords-card, .info-card, .related-card, .navigation-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.keywords-card:hover, .info-card:hover, .related-card:hover, .navigation-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
}

.sidebar-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.sidebar-title i {
    color: #667eea;
}

.keywords-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.keyword-tag {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid #f1f5f9;
}

.info-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.info-label {
    font-weight: 600;
    color: #64748b;
    font-size: 0.875rem;
}

.info-value {
    font-weight: 700;
    color: #1a202c;
    font-size: 0.875rem;
}

.related-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.related-item {
    display: flex;
    gap: 1rem;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    padding: 0.75rem;
    border-radius: 8px;
}

.related-item:hover {
    background: #f8fafc;
    transform: translateX(5px);
}

.related-image {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    border-radius: 8px;
    overflow: hidden;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-content {
    flex: 1;
}

.related-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 0.25rem;
    line-height: 1.3;
}

.related-date {
    font-size: 0.75rem;
    color: #64748b;
}

.nav-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.nav-btn {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    color: #64748b;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
}

.nav-btn:hover {
    background: #667eea;
    color: white;
    transform: translateY(-1px);
}

.nav-btn i {
    width: 16px;
    text-align: center;
}

@media (max-width: 992px) {
    .header-title {
        font-size: 2.5rem;
    }
    
    .header-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .author-sidebar, .content-sidebar {
        position: static;
    }
    
    .blog-article {
        padding: 2rem;
    }
    
    .article-stats {
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .blog-header {
        min-height: 300px;
        background-attachment: scroll;
    }
    
    .header-breadcrumb {
        position: absolute;
        top: 1rem;
        left: 1rem;
    }
    
    .breadcrumb-link {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        background: rgba(0, 0, 0, 0.5);
    }
    
    .header-title {
        font-size: 2rem;
    }
    
    .header-meta {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .author-info-header {
        justify-content: center;
    }
    
    .article-stats {
        justify-content: center;
        gap: 0.75rem;
    }
    
    .stat-item {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
    }
    
    .blog-article {
        padding: 1.5rem;
    }
    
    .article-content {
        font-size: 1rem;
    }
    
    .share-buttons, .nav-buttons {
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .action-btn {
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
    }
}

@media (max-width: 576px) {
    .blog-header {
        min-height: 250px;
    }
    
    .header-breadcrumb {
        top: 0.75rem;
        left: 0.75rem;
    }
    
    .breadcrumb-link {
        padding: 0.4rem 0.8rem;
        font-size: 0.8rem;
        background: rgba(0, 0, 0, 0.6);
    }
    
    .breadcrumb-link span {
        display: none;
    }
    
    .header-title {
        font-size: 1.5rem;
        line-height: 1.2;
    }
    
    .author-info-header {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
    }
    
    .article-stats {
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }
    
    .article-badge {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
    }
    
    .keywords-list {
        flex-direction: column;
    }
    
    .info-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
    
    .related-item {
        flex-direction: column;
        text-align: center;
    }
    
    .related-image {
        width: 100%;
        height: 120px;
    }
}
</style>

<script>
// Copy to clipboard functionality
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        // Show success message
        const btn = event.target.closest('.share-btn');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
        setTimeout(() => {
            btn.innerHTML = originalText;
        }, 2000);
    });
}

// Generate table of contents
document.addEventListener('DOMContentLoaded', function() {
    const tocContainer = document.getElementById('table-of-contents');
    if (tocContainer) {
        const headings = document.querySelectorAll('.article-content h2, .article-content h3');
        
        if (headings.length > 0) {
            const tocList = document.createElement('ul');
            tocList.className = 'toc-list';
            
            headings.forEach(function(heading, index) {
                const id = 'heading-' + index;
                heading.id = id;
                
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#' + id;
                a.textContent = heading.textContent;
                a.className = 'toc-link';
                
                if (heading.tagName === 'H3') {
                    li.className = 'toc-sub-item';
                }
                
                li.appendChild(a);
                tocList.appendChild(li);
            });
            
            tocContainer.appendChild(tocList);
        } else {
            tocContainer.parentElement.style.display = 'none';
        }
    }
    
    // Smooth scrolling for TOC links
    document.querySelectorAll('.toc-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
