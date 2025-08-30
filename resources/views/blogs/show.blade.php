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

<!-- @push('styles')
  @vite('resources/css/pages/blog-show.css')
@endpush -->

@section('content')
<style>
/* Blog Show Page (aligned with site tokens) */
:root {
  --slate-50: #f8fafc;
  --slate-100: #f1f5f9;
  --slate-200: #e2e8f0;
  --slate-300: #e5e7eb;
}

/* Page base */
.modern-blog-container {
  font-family: "Plus Jakarta Sans", sans-serif;
  background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
  min-height: 100vh;
  color: var(--ink);
}

/* Header */
.blog-header {
  position: relative;
  padding: 0;
  margin-bottom: 2rem;
  min-height: 400px;
  display: flex;
  align-items: flex-end;
  background: var(--white);
  box-shadow: 0 8px 30px rgba(0,0,0,0.06);
  overflow: hidden;
}
.blog-header.has-image .header-bg-img {
  position: absolute; inset: 0;
  width: 100%; height: 100%; object-fit: cover;
  transform: scale(1.01); /* reduce subpixel gaps */
}
.header-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(180deg, rgba(2,6,23,0.15) 0%, rgba(2,6,23,0.65) 100%);
  z-index: 1;
}
.blog-header .container-fluid { position: relative; z-index: 2; width: 100%; padding-bottom: 2rem; }

.header-breadcrumb {
  position: absolute; top: 1rem; left: 1rem; z-index: 3;
}
.breadcrumb-link {
  display: inline-flex; align-items: center; gap: 0.5rem;
  color: var(--white); text-decoration: none; font-weight: 700;
  padding: 10px 14px; border-radius: 999px;
  backdrop-filter: blur(10px);
  background: rgba(17,24,39,0.35);
  box-shadow: 0 6px 18px rgba(0,0,0,0.20);
  transition: transform .15s ease, background .2s ease, box-shadow .2s ease;
}
.breadcrumb-link:hover { transform: translateX(-2px); background: rgba(17,24,39,0.55); }

.header-content { display: flex; align-items: flex-end; min-height: 200px; }
.header-left { flex: 1; max-width: 100%; }

.article-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,0.9);
  color: var(--brand-green);
  padding: 8px 12px; border-radius: 999px; font-weight: 700; font-size: 0.9rem;
  backdrop-filter: blur(10px);
}
.badge-icon {
  width: 20px; height: 20px; border-radius: 50%;
  display: grid; place-items: center; font-size: 0.75rem;
  background: var(--brand-green); color: var(--white);
}

.header-title {
  font-size: clamp(2rem, 3vw + 1rem, 3rem);
  font-weight: 800; color: var(--white);
  margin: 12px 0 16px; line-height: 1.1;
  text-shadow: 0 8px 24px rgba(0,0,0,0.45);
}

.header-meta { display: flex; justify-content: space-between; align-items: flex-end; gap: 24px; flex-wrap: wrap; }
.article-stats { display: flex; gap: 12px; flex-wrap: wrap; }
.stat-item {
  display: inline-flex; align-items: center; gap: 8px;
  color: var(--white); font-weight: 600; font-size: 0.9rem;
  background: rgba(255,255,255,0.12); padding: 8px 12px; border-radius: 999px;
  backdrop-filter: blur(8px);
}
.stat-item i { color: rgba(255,255,255,0.95); }

/* Fallback header (no image) */
.blog-header.no-image .header-overlay {
  background: linear-gradient(180deg, rgba(46,164,79,0.20) 0%, rgba(2,6,23,0.65) 100%);
}

/* Content section */
.blog-content-section { padding: 0 0 64px; }

/* Left column (author) */
.author-sidebar { position: sticky; top: 2rem; }
.author-card, .toc-card, .share-card {
  background: var(--white); border-radius: 16px; padding: 16px;
  margin-bottom: 16px; border: 1px solid rgba(17,24,39,0.08);
  box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  transition: transform .15s ease, box-shadow .2s ease;
}
.author-card:hover, .toc-card:hover, .share-card:hover { transform: translateY(-2px); box-shadow: 0 12px 36px rgba(0,0,0,0.10); }

.author-avatar { text-align: center; margin-bottom: 12px; }
.avatar-img { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 4px solid var(--slate-100); }
.author-name { font-size: 1.15rem; font-weight: 800; color: var(--ink); margin: 0 0 4px; text-align: center; }
.author-title { color: var(--brand-green); font-weight: 700; text-align: center; margin: 0 0 8px; }
.author-bio { color: var(--muted); font-size: 0.95rem; line-height: 1.6; text-align: center; margin: 0 0 12px; }
.author-stats { display: flex; justify-content: space-around; border-top: 1px solid var(--slate-200); padding-top: 12px; }
.stat-number { display: block; font-size: 1.1rem; font-weight: 800; color: var(--ink); }
.stat-label { font-size: 0.75rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.04em; }

.toc-title, .share-title {
  font-size: 1rem; font-weight: 800; color: var(--ink);
  margin: 0 0 12px; display: flex; align-items: center; gap: 8px;
}
.toc-title i, .share-title i { color: var(--brand-green); }
.toc-list { list-style: none; margin: 0; padding: 0; }
.toc-list li { margin-bottom: 6px; }
.toc-link {
  display: block; padding: 8px 10px; color: var(--muted); text-decoration: none;
  border-radius: 8px; transition: background .15s ease, color .15s ease, transform .15s ease;
  font-weight: 600; line-height: 1.4;
}
.toc-link:hover { background: #f8fafc; color: var(--brand-green); transform: translateX(2px); }
.toc-sub-item .toc-link { margin-left: 12px; font-size: 0.95rem; color: #94a3b8; }

.share-buttons { display: flex; flex-direction: column; gap: 8px; }
.share-btn {
  display: inline-flex; align-items: center; gap: 8px; justify-content: center;
  padding: 10px 12px; border-radius: 10px; text-decoration: none; font-weight: 800; font-size: 0.9rem;
  border: none; cursor: pointer; width: 100%;
  color: #fff; transition: transform .15s ease, box-shadow .2s ease;
}
.share-btn.twitter { background: #1da1f2; }
.share-btn.facebook { background: #4267b2; }
.share-btn.linkedin { background: #0077b5; }
.share-btn.copy { background: #6b7280; }
.share-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(0,0,0,0.18); }

/* Article */
.blog-article {
  background: var(--white); border-radius: 16px; padding: 24px;
  border: 1px solid rgba(17,24,39,0.08);
  box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  margin-bottom: 20px;
}
.article-content {
  font-size: 1.1rem; line-height: 1.8; color: #374151; text-align: justify;
}
.article-content h1, .article-content h2, .article-content h3,
.article-content h4, .article-content h5, .article-content h6 {
  color: var(--ink); margin-top: 2em; margin-bottom: 1em; font-weight: 800; text-align: left;
}
.article-content h2 { font-size: 1.75rem; border-bottom: 2px solid var(--slate-200); padding-bottom: 8px; }
.article-content h3 { font-size: 1.35rem; }
.article-content p { margin-bottom: 1.5rem; text-align: justify; }
.article-content img { max-width: 100%; height: auto; border-radius: 12px; margin: 20px 0; box-shadow: 0 12px 30px rgba(0,0,0,0.12); }
.article-content blockquote {
  border-left: 4px solid var(--brand-green);
  margin: 20px 0; padding: 16px 0 16px 18px; background: #f8fafc;
  border-radius: 0 12px 12px 0; font-style: italic; color: #4a5568; text-align: justify;
}
.article-content code {
  background: #f1f5f9; padding: 3px 6px; border-radius: 4px;
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono","Courier New", monospace;
  font-size: 0.9rem; color: #e53e3e;
}
.article-content pre {
  background: #0f172a; color: #e2e8f0; padding: 16px; border-radius: 12px; overflow-x: auto; margin: 20px 0; text-align: left;
}
.article-content a { color: var(--brand-green); text-decoration: none; border-bottom: 1px solid transparent; transition: border-color .15s ease; }
.article-content a:hover { border-bottom-color: var(--brand-green); }
.article-content ul, .article-content ol { text-align: justify; margin: 18px 0; padding-left: 22px; }
.article-content li { margin-bottom: 6px; text-align: justify; }

/* Article actions */
.article-actions { display: flex; gap: 10px; flex-wrap: wrap; }
.action-btn {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 12px 16px; border-radius: 12px; text-decoration: none; font-weight: 800;
  border: 1px solid transparent; cursor: pointer; transition: transform .15s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
}
.action-btn.edit { background: var(--ink); border-color: var(--ink); color: var(--white); }
.action-btn.edit:hover { background: var(--brand-green); border-color: var(--brand-green); transform: translateY(-1px); }
.action-btn.print { background: transparent; border: 1px solid var(--ink); color: var(--ink); }
.action-btn.print:hover { background: var(--ink); color: var(--white); transform: translateY(-1px); }

/* Right column (info/related/nav) */
.content-sidebar { position: sticky; top: 2rem; }
.keywords-card, .info-card, .related-card, .navigation-card {
  background: var(--white); border-radius: 16px; padding: 16px;
  border: 1px solid rgba(17,24,39,0.08);
  margin-bottom: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  transition: transform .15s ease, box-shadow .2s ease;
}
.keywords-card:hover, .info-card:hover, .related-card:hover, .navigation-card:hover { transform: translateY(-2px); box-shadow: 0 12px 36px rgba(0,0,0,0.10); }

.sidebar-title {
  font-size: 1rem; font-weight: 800; color: var(--ink);
  margin: 0 0 12px; display: flex; align-items: center; gap: 8px;
}
.sidebar-title i { color: var(--brand-green); }
.keywords-list { display: flex; flex-wrap: wrap; gap: 6px; }
.keyword-tag {
  background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 999px; font-size: 0.75rem; font-weight: 800;
  border: 1px solid #e2e8f0;
}

.info-list { display: flex; flex-direction: column; gap: 10px; }
.info-item {
  display: flex; justify-content: space-between; align-items: center;
  padding-bottom: 10px; border-bottom: 1px solid var(--slate-100);
}
.info-item:last-child { border-bottom: none; padding-bottom: 0; }
.info-label { font-weight: 700; color: var(--muted); font-size: 0.9rem; }
.info-value { font-weight: 800; color: var(--ink); font-size: 0.9rem; }

.related-list { display: flex; flex-direction: column; gap: 12px; }
.related-item {
  display: flex; gap: 12px; text-decoration: none; color: inherit;
  transition: background .15s ease, transform .15s ease; padding: 8px; border-radius: 10px;
}
.related-item:hover { background: #f8fafc; transform: translateX(4px); }
.related-image { flex-shrink: 0; width: 60px; height: 60px; border-radius: 8px; overflow: hidden; }
.related-image img { width: 100%; height: 100%; object-fit: cover; }
.related-title { font-size: 0.95rem; font-weight: 800; color: var(--ink); margin: 0 0 4px; line-height: 1.3; }
.related-date { font-size: 0.8rem; color: var(--muted); }

.nav-buttons { display: flex; flex-direction: column; gap: 8px; }
.nav-btn {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 10px 12px; border-radius: 12px; text-decoration: none; color: var(--muted);
  font-weight: 800; border: 1px solid var(--slate-200);
  transition: transform .15s ease, background .2s ease, color .2s ease, border-color .2s ease;
}
.nav-btn:hover { background: var(--brand-green); color: var(--white); transform: translateY(-1px); border-color: var(--brand-green); }
.nav-btn i { width: 16px; text-align: center; }

/* Responsive */
@media (max-width: 992px) {
  .header-title { font-size: clamp(1.8rem, 2.2vw + 1rem, 2.4rem); }
  .header-meta { flex-direction: column; align-items: flex-start; gap: 12px; }
  .author-sidebar, .content-sidebar { position: static; }
  .blog-article { padding: 18px; }
  .article-stats { gap: 10px; }
}
@media (max-width: 768px) {
  .blog-header { min-height: 300px; }
  .header-breadcrumb { top: 12px; left: 12px; }
  .breadcrumb-link { padding: 8px 12px; font-size: 0.9rem; }
  .header-meta { align-items: stretch; }
  .article-stats { justify-content: center; }
  .stat-item { font-size: 0.85rem; padding: 6px 10px; }
  .article-content { font-size: 1rem; }
  .share-buttons, .nav-buttons { flex-direction: row; flex-wrap: wrap; }
  .action-btn { font-size: 0.95rem; padding: 10px 14px; }
}
@media (max-width: 576px) {
  .blog-header { min-height: 260px; }
  .header-title { font-size: 1.6rem; line-height: 1.2; }
  .breadcrumb-link span { display: none; }
  .keywords-list { flex-direction: column; }
  .info-item { flex-direction: column; align-items: flex-start; gap: 4px; }
  .related-item { flex-direction: column; text-align: center; }
  .related-image { width: 100%; height: 120px; }
}

/* Focus styles (if global outline removed) */
a:focus-visible, button:focus-visible { outline: 2px solid var(--brand-green); outline-offset: 2px; }

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  * { animation: none !important; transition: none !important; }
}
</style>
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