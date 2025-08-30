@extends('layouts.app')

@section('title', $blog->title . ' - Top Outsourcing Partners Blog')
@section('meta_description')
@php
    $excerpt = strip_tags($blog->content);
    $excerpt = Str::limit($excerpt, 155);
@endphp
{{ $excerpt }}
@endsection
@section('meta_keywords')
@if($blog->keywords && count($blog->keywords) > 0)
{{ implode(', ', $blog->keywords) }}, Top Outsourcing Partners, {{ $blog->formatted_type }}
@else
{{ $blog->formatted_type }}, Top Outsourcing Partners, business outsourcing, outsourcing insights
@endif
@endsection
@section('og_type', 'article')
@section('og_image', $blog->image ?? asset('images/og-default.jpg'))


<link rel="stylesheet" href="{{ asset('css/blog-show.css') }}">


@section('content')
<div class="modern-blog-container">
    <!-- Header Section -->
    <div class="blog-header {{ $blog->image ? 'has-image' : 'no-image' }}">
        @if($blog->image)
            <img src="{{ $blog->image }}" alt="" class="header-bg-img" loading="eager">
        @endif
        <div class="header-overlay"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Navigation -->
                    <nav class="header-breadcrumb" aria-label="Breadcrumb">
                        <a href="{{ route('blogs.index') }}" class="breadcrumb-link">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to {{ $blog->type === 'case_study' ? 'Case Studies' : 'Blog Posts' }}</span>
                        </a>
                    </nav>
                    
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
                    </div><!-- /header-content -->
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
                                <!-- Populated by JS -->
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
                                   target="_blank" class="share-btn twitter" rel="noopener">
                                    <i class="fab fa-twitter"></i>
                                    Twitter
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="share-btn facebook" rel="noopener">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                                   target="_blank" class="share-btn linkedin" rel="noopener">
                                    <i class="fab fa-linkedin-in"></i>
                                    LinkedIn
                                </a>
                                <button type="button" onclick="copyToClipboard(this)" class="share-btn copy">
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
                        
                        <button type="button" onclick="window.print()" class="action-btn print">
                            <i class="fas fa-print"></i>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Right Sidebar - Keywords & Related -->
                <div class="col-lg-3">
                    <div class="content-sidebar">
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
            </div><!-- /row -->
        </div>
    </div>
</div>

<script>
// Copy to clipboard (button param instead of relying on global event)
function copyToClipboard(btn) {
    navigator.clipboard.writeText(window.location.href).then(function() {
        const original = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
        setTimeout(() => { btn.innerHTML = original; }, 2000);
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
                if (heading.tagName === 'H3') li.className = 'toc-sub-item';
                const a = document.createElement('a');
                a.href = '#' + id;
                a.textContent = heading.textContent;
                a.className = 'toc-link';
                li.appendChild(a);
                tocList.appendChild(li);
            });
            tocContainer.appendChild(tocList);
        } else if (tocContainer.parentElement) {
            tocContainer.parentElement.style.display = 'none';
        }

        // Smooth scrolling
        document.querySelectorAll('.toc-link').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const target = document.getElementById(targetId);
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    }
});
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection