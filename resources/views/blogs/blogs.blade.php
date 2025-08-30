@extends('layouts.app')

@section('title', 'Blog - Top Outsourcing Partners | Latest Insights & Industry Expertise')
@section('meta_description', 'Explore Top Outsourcing Partners blog for the latest insights on business outsourcing, finance trends, AI integration, corporate training, and industry best practices. Stay informed with expert analysis and actionable business strategies.')
@section('meta_keywords', 'outsourcing blog, business insights, finance trends, AI integration news, corporate training tips, industry best practices, business strategies, outsourcing expertise')

<!-- @push('styles')
  @vite('resources/css/pages/blog-nexus.css')
@endpush -->

@section('content')
<style>
/* Blog Nexus Page Styles (aligned with global tokens) */
:root {
  --slate-50: #f8fafc;
  --slate-100: #f1f5f9;
  --slate-200: #e2e8f0;
  --slate-300: #e5e7eb;
  --slate-600: #475569;
  --slate-700: #334155;
}

/* Base container */
.blog-nexus-container {
  color: var(--ink);
  font-family: "Plus Jakarta Sans", sans-serif;
}

/* Hero */
.blog-nexus-hero-section {
  padding: 56px 16px 24px;
  text-align: center;
  background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
  border-bottom: 1px solid rgba(17,24,39,0.06);
}
.blog-nexus-main-title {
  font-size: clamp(1.75rem, 2.2vw + 1rem, 2.75rem);
  line-height: 1.2;
  margin: 0;
  font-weight: 700;
  color: var(--ink);
}
.blog-nexus-highlight { color: var(--brand-green); }
.blog-nexus-admin-badge {
  display: inline-block;
  padding: 4px 10px;
  border-radius: 999px;
  background: rgba(46,164,79,0.12);
  color: var(--brand-green);
  font-weight: 700;
  font-size: 0.9rem;
  margin-right: 6px;
}
.blog-nexus-hero-logout-form {
  margin-top: 16px;
}
.blog-nexus-logout-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--ink);
  color: var(--white);
  border: 1px solid var(--ink);
  border-radius: 70px;
  padding: 12px 18px;
  font-weight: 700;
  transition: background-color .2s ease, border-color .2s ease, transform .15s ease;
}
.blog-nexus-logout-btn:hover,
.blog-nexus-logout-btn:focus-visible {
  background: var(--brand-green);
  border-color: var(--brand-green);
  transform: translateY(-1px);
}
.blog-nexus-logout-icon { font-weight: 700; }

/* Success alert */
.blog-nexus-success-alert {
  max-width: 1200px;
  margin: 16px auto 0;
  background: #e8f8e8;
  border: 1px solid rgba(46,164,79,0.25);
  color: #0f5132;
  padding: 10px 14px;
  border-radius: 12px;
  display: flex; align-items: center; gap: 8px;
}
.blog-nexus-success-icon { font-weight: 700; }

/* Admin: form card */
.blog-nexus-form-container {
  max-width: 1000px;
  margin: 24px auto;
  background: var(--white);
  border-radius: 16px;
  border: 1px solid rgba(17,24,39,0.08);
  box-shadow: 0 8px 30px rgba(0,0,0,0.06);
  overflow: hidden;
}
.blog-nexus-form-header {
  background: linear-gradient(180deg, #fafbfc 0%, #f3f4f6 100%);
  padding: 16px 20px;
  border-bottom: 1px solid rgba(17,24,39,0.08);
}
.blog-nexus-form-title { margin: 0; font-size: 1.25rem; font-weight: 700; color: var(--ink); }
.blog-nexus-form-body { padding: 20px; }
.blog-nexus-form { display: flex; flex-direction: column; gap: 14px; }
.blog-nexus-input-group { display: flex; flex-direction: column; gap: 8px; }
.blog-nexus-label { font-weight: 700; color: var(--ink); }
.blog-nexus-input,
.blog-nexus-textarea {
  width: 100%;
  padding: 12px 14px;
  border-radius: 12px;
  border: 1px solid rgba(17,24,39,0.12);
  background: #f9fafb;
  font-size: 1rem;
  transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
}
.blog-nexus-input:focus,
.blog-nexus-textarea:focus {
  outline: none;
  border-color: var(--brand-green);
  background: var(--white);
  box-shadow: 0 0 0 3px rgba(46,164,79,0.12);
}

/* File upload */
.blog-nexus-file-upload { position: relative; }
.blog-nexus-file-input { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
.blog-nexus-file-label {
  display: inline-flex; align-items: center; gap: 8px;
  border: 1px dashed rgba(17,24,39,0.2);
  background: #f9fafb;
  border-radius: 12px;
  padding: 12px 14px;
  cursor: pointer;
  transition: border-color .2s ease, background .2s ease;
}
.blog-nexus-file-label:hover { border-color: var(--brand-green); background: #f3faf5; }
.blog-nexus-upload-icon { font-size: 1.1rem; }
.blog-nexus-current-image { margin-top: 10px; text-align: center; }
.blog-nexus-preview-img {
  max-width: 140px; max-height: 140px;
  border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); object-fit: cover;
}
.blog-nexus-image-caption { color: var(--muted); font-size: 0.9rem; margin-top: 6px; }
.is-hidden { display: none !important; }

.blog-nexus-form-actions { display: flex; gap: 10px; margin-top: 6px; }
.blog-nexus-primary-btn,
.blog-nexus-secondary-btn {
  display: inline-flex; align-items: center; justify-content: center;
  gap: 8px; padding: 12px 18px; border-radius: 12px; font-weight: 700;
  border: 1px solid transparent; cursor: pointer;
  transition: transform .15s ease, background .2s ease, color .2s ease, border-color .2s ease;
}
.blog-nexus-primary-btn { background: var(--ink); color: var(--white); border-color: var(--ink); }
.blog-nexus-primary-btn:hover,
.blog-nexus-primary-btn:focus-visible { background: var(--brand-green); border-color: var(--brand-green); transform: translateY(-1px); }
.blog-nexus-secondary-btn { background: transparent; border: 1px solid var(--ink); color: var(--ink); }
.blog-nexus-secondary-btn:hover,
.blog-nexus-secondary-btn:focus-visible { background: var(--ink); color: var(--white); transform: translateY(-1px); }

/* Admin: table */
.blog-nexus-management-panel {
  max-width: 1200px; margin: 24px auto;
  background: var(--white); border-radius: 16px; border: 1px solid rgba(17,24,39,0.08);
  box-shadow: 0 8px 30px rgba(0,0,0,0.06); overflow: hidden;
}
.blog-nexus-panel-header {
  background: #f8fafc; padding: 14px 18px; border-bottom: 1px solid rgba(17,24,39,0.08);
}
.blog-nexus-panel-title { margin: 0; font-size: 1.1rem; font-weight: 700; color: var(--ink); }
.blog-nexus-table-container { overflow-x: auto; }
.blog-nexus-table { width: 100%; border-collapse: collapse; }
.blog-nexus-table-head th {
  padding: 12px 14px; text-align: left; font-weight: 700; color: var(--ink);
  border-bottom: 1px solid rgba(17,24,39,0.08); font-size: 0.85rem; letter-spacing: .02em; text-transform: uppercase;
}
.blog-nexus-table-row { border-bottom: 1px solid rgba(17,24,39,0.06); }
.blog-nexus-table-row:hover { background: #f9fafb; }
.blog-nexus-td { padding: 12px 14px; vertical-align: middle; }
.blog-nexus-table-img {
  width: 50px; height: 50px; object-fit: cover; border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
.blog-nexus-no-image {
  width: 50px; height: 50px; background: #f3f4f6; border-radius: 8px;
  display: grid; place-items: center; color: #9ca3af; font-size: 1.2rem;
}
.blog-nexus-title-cell { font-weight: 700; color: var(--ink); }
.blog-nexus-action-buttons { display: flex; gap: 8px; }
.blog-nexus-view-btn,
.blog-nexus-edit-btn,
.blog-nexus-delete-btn {
  padding: 8px 12px; border-radius: 10px; border: none; color: var(--white); cursor: pointer;
  font-weight: 700; transition: transform .15s ease, box-shadow .2s ease, background .2s ease;
}
.blog-nexus-view-btn { background: var(--brand-green); }
.blog-nexus-edit-btn { background: #d97706; }
.blog-nexus-delete-btn { background: #dc2626; }
.blog-nexus-view-btn:hover,
.blog-nexus-edit-btn:hover,
.blog-nexus-delete-btn:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.18); }

/* Modals */
.blog-nexus-modal { display: none; position: fixed; inset: 0; z-index: 1200; padding: 24px; overflow-y: auto; background: rgba(2,6,23,0.45); }
.blog-nexus-modal-content {
  position: relative; background: var(--white); border-radius: 16px; max-width: 520px; margin: 0 auto;
  box-shadow: 0 20px 60px rgba(0,0,0,0.30); border: 1px solid rgba(17,24,39,0.12); overflow: hidden;
}
.blog-nexus-modal-large { max-width: 960px; }
.blog-nexus-modal-small { max-width: 420px; }
.blog-nexus-modal-header {
  padding: 16px 20px; border-bottom: 1px solid rgba(17,24,39,0.08);
  display: flex; justify-content: space-between; align-items: center; background: #f8fafc;
}
.blog-nexus-modal-title { margin: 0; font-size: 1.1rem; font-weight: 700; color: var(--ink); }
.blog-nexus-modal-close { cursor: pointer; font-size: 1.5rem; color: var(--muted); }
.blog-nexus-modal-body { padding: 20px; }
.blog-nexus-modal-image img { max-width: 100%; height: auto; border-radius: 12px; margin-bottom: 12px; display: block; }
.blog-nexus-modal-date { color: var(--muted); margin-bottom: 8px; }
.blog-nexus-modal-text { color: var(--ink); line-height: 1.7; }
.blog-nexus-modal-footer {
  padding: 16px 20px; border-top: 1px solid rgba(17,24,39,0.08);
  display: flex; gap: 10px; justify-content: flex-end; background: #f9fafb;
}
.blog-nexus-modal-message { color: var(--ink); }

/* Guest Gallery */
.blog-nexus-gallery {
  max-width: 1200px; margin: 32px auto; padding: 0 12px;
  display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
}
.blog-nexus-card {
  background: var(--white); border-radius: 16px; overflow: hidden;
  border: 1px solid rgba(17,24,39,0.08); box-shadow: 0 6px 20px rgba(0,0,0,0.06);
  display: flex; flex-direction: column;
}
.blog-nexus-card-image { position: relative; }
.blog-nexus-img { width: 100%; height: 180px; object-fit: cover; display: block; }
.blog-nexus-image-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(180deg, rgba(0,0,0,0.0) 30%, rgba(0,0,0,0.35) 100%);
  pointer-events: none;
}
.blog-nexus-card-content { padding: 16px; }
.blog-nexus-card-title { margin: 0 0 8px; font-size: 1.1rem; font-weight: 700; color: var(--ink); }
.blog-nexus-card-excerpt { margin: 0 0 12px; color: var(--muted); font-size: 0.95rem; }
.blog-nexus-read-more {
  display: inline-flex; align-items: center; gap: 6px; color: var(--brand-green);
  font-weight: 700; text-decoration: none; transition: gap .15s ease, color .2s ease;
}
.blog-nexus-read-more:hover { color: #238a40; gap: 8px; }
.blog-nexus-card-footer {
  display: flex; justify-content: space-between; align-items: center;
  padding: 12px 16px; border-top: 1px solid rgba(17,24,39,0.08);
}
.blog-nexus-date-badge {
  display: inline-flex; align-items: center; gap: 6px;
  background: #f3faf5; color: var(--brand-green);
  padding: 6px 10px; border-radius: 999px; font-weight: 700; font-size: 0.85rem;
}

/* Responsive */
@media (max-width: 768px) {
  .blog-nexus-form-container, .blog-nexus-management-panel { margin: 16px 12px; }
  .blog-nexus-modal-content { margin: 1rem; max-width: calc(100% - 2rem); }
}

/* Accessibility */
.blog-nexus-primary-btn:focus-visible,
.blog-nexus-secondary-btn:focus-visible,
.blog-nexus-logout-btn:focus-visible,
.blog-nexus-read-more:focus-visible,
.blog-nexus-view-btn:focus-visible,
.blog-nexus-edit-btn:focus-visible,
.blog-nexus-delete-btn:focus-visible {
  outline: 2px solid var(--brand-green);
  outline-offset: 2px;
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  * { animation: none !important; transition: none !important; }
}
</style>
<div class="blog-nexus-container">
    <div class="blog-nexus-hero-section">
        <h1 class="blog-nexus-main-title">
            @auth 
                <span class="blog-nexus-admin-badge">Admin</span> Blog Management
            @else 
                Discover Our <span class="blog-nexus-highlight">Latest Insights</span>
            @endauth
        </h1>
        
        @auth
        <form method="POST" action="{{ route('logout') }}" class="blog-nexus-hero-logout-form">
            @csrf
            <button type="submit" class="blog-nexus-logout-btn">
                <span class="blog-nexus-logout-icon">→</span> Logout
            </button>
        </form>
        @endauth
    </div>

    @if(session('success'))
        <div class="blog-nexus-success-alert">
            <i class="blog-nexus-success-icon">✓</i>
            {{ session('success') }}
        </div>
    @endif

    @auth
    <!-- Admin Control Panel -->
    <div class="blog-nexus-admin-controls">
        <!-- Reserved for future controls -->
    </div>

    <!-- Blog Management Form -->
    <div class="blog-nexus-form-container">
        <div class="blog-nexus-form-header">
            <h3 class="blog-nexus-form-title">{{ isset($blog) ? 'Edit Blog Post' : 'Create New Blog' }}</h3>
        </div>
        <div class="blog-nexus-form-body">
            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="blog-nexus-form">
                @csrf
                <div class="blog-nexus-input-group">
                    <label for="title" class="blog-nexus-label">Blog Title</label>
                    <input type="text" class="blog-nexus-input" id="title" name="title" 
                           value="{{ isset($blog) ? $blog->title : old('title') }}" 
                           placeholder="Enter an engaging title..." required>
                </div>
                
                <div class="blog-nexus-input-group">
                    <label for="image" class="blog-nexus-label">Featured Image</label>
                    <div class="blog-nexus-file-upload">
                        <input type="file" class="blog-nexus-file-input" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                        <label for="image" class="blog-nexus-file-label">
                            <span class="blog-nexus-upload-icon">📷</span>
                            Choose Image
                        </label>
                    </div>
                    <div id="imagePreview" class="blog-nexus-current-image is-hidden">
                        <img id="previewImg" src="" alt="Image preview" class="blog-nexus-preview-img">
                        <p class="blog-nexus-image-caption">Selected image preview</p>
                    </div>
                    @if(isset($blog) && $blog->image)
                        <div class="blog-nexus-current-image">
                            <img src="{{ $blog->image }}" alt="Current image" class="blog-nexus-preview-img">
                            <p class="blog-nexus-image-caption">Current featured image</p>
                        </div>
                    @endif
                </div>

                <div class="blog-nexus-input-group">
                    <label for="content" class="blog-nexus-label">Blog Content</label>
                    <textarea class="blog-nexus-textarea tinymce-editor" id="content" name="content" rows="8" 
                              placeholder="Write your amazing content here..." required>{{ isset($blog) ? $blog->content : old('content') }}</textarea>
                </div>
                
                <div class="blog-nexus-form-actions">
                    <button type="submit" class="blog-nexus-primary-btn">
                        {{ isset($blog) ? 'Update Blog' : 'Publish Blog' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Admin Blog Management Table -->
    <div class="blog-nexus-management-panel">
        <div class="blog-nexus-panel-header">
            <h3 class="blog-nexus-panel-title">Published Blogs</h3>
        </div>
        <div class="blog-nexus-table-container">
            <table class="blog-nexus-table">
                <thead class="blog-nexus-table-head">
                    <tr>
                        <th class="blog-nexus-th">#</th>
                        <th class="blog-nexus-th">Image</th>
                        <th class="blog-nexus-th">Title</th>
                        <th class="blog-nexus-th">Actions</th>
                    </tr>
                </thead>
                <tbody class="blog-nexus-table-body">
                    @foreach($blogs as $blog)
                        <tr class="blog-nexus-table-row">
                            <td class="blog-nexus-td">{{ $loop->iteration }}</td>
                            <td class="blog-nexus-td">
                                @if($blog->image)
                                    <img src="{{ $blog->image }}" alt="Blog image" class="blog-nexus-table-img">
                                @else
                                    <div class="blog-nexus-no-image">📷</div>
                                @endif
                            </td>
                            <td class="blog-nexus-td blog-nexus-title-cell">{{ $blog->title }}</td>
                            <td class="blog-nexus-td">
                                <div class="blog-nexus-action-buttons">
                                    <button type="button" class="blog-nexus-view-btn" onclick="openViewModal({{ $blog->id }})" title="View">View</button>
                                    <button type="button" class="blog-nexus-edit-btn" onclick="openEditModal({{ $blog->id }})" title="Edit">Edit</button>
                                    <button type="button" class="blog-nexus-delete-btn" onclick="openDeleteModal({{ $blog->id }})" title="Delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal Popups -->
    <!-- View Blog Modal -->
    <div id="viewBlogModal" class="blog-nexus-modal">
        <div class="blog-nexus-modal-content">
            <div class="blog-nexus-modal-header">
                <h3 id="viewBlogTitle" class="blog-nexus-modal-title">Blog Title</h3>
                <span class="blog-nexus-modal-close" onclick="closeModal('viewBlogModal')">&times;</span>
            </div>
            <div class="blog-nexus-modal-body">
                <div id="viewBlogImage" class="blog-nexus-modal-image"></div>
                <div id="viewBlogDate" class="blog-nexus-modal-date"></div>
                <div id="viewBlogContent" class="blog-nexus-modal-text"></div>
            </div>
            <div class="blog-nexus-modal-footer">
                <button type="button" class="blog-nexus-secondary-btn" onclick="closeModal('viewBlogModal')">Close</button>
            </div>
        </div>
    </div>
    
    <!-- Edit Blog Modal -->
    <div id="editBlogModal" class="blog-nexus-modal">
        <div class="blog-nexus-modal-content blog-nexus-modal-large">
            <div class="blog-nexus-modal-header">
                <h3 class="blog-nexus-modal-title">Edit Blog</h3>
                <span class="blog-nexus-modal-close" onclick="closeModal('editBlogModal')">&times;</span>
            </div>
            <div class="blog-nexus-modal-body">
                <form id="editBlogForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editBlogId" name="id">
                    
                    <div class="blog-nexus-input-group">
                        <label for="editTitle" class="blog-nexus-label">Blog Title</label>
                        <input type="text" class="blog-nexus-input" id="editTitle" name="title" required>
                    </div>
                    
                    <div class="blog-nexus-input-group">
                        <label for="editImage" class="blog-nexus-label">Featured Image</label>
                        <div class="blog-nexus-file-upload">
                            <input type="file" class="blog-nexus-file-input" id="editImage" name="image" accept="image/*">
                            <label for="editImage" class="blog-nexus-file-label">
                                <span class="blog-nexus-upload-icon">📷</span>
                                Choose New Image
                            </label>
                        </div>
                        <div id="editCurrentImage" class="blog-nexus-current-image"></div>
                    </div>
                    
                    <div class="blog-nexus-input-group">
                        <label for="editContent" class="blog-nexus-label">Blog Content</label>
                        <textarea class="blog-nexus-textarea tinymce-editor" id="editContent" name="content" rows="8" required></textarea>
                    </div>
                </form>
            </div>
            <div class="blog-nexus-modal-footer">
                <button type="button" class="blog-nexus-primary-btn" onclick="submitEditForm()">Update Blog</button>
                <button type="button" class="blog-nexus-secondary-btn" onclick="closeModal('editBlogModal')">Cancel</button>
            </div>
        </div>
    </div>
    
    <!-- Delete Blog Modal -->
    <div id="deleteBlogModal" class="blog-nexus-modal">
        <div class="blog-nexus-modal-content blog-nexus-modal-small">
            <div class="blog-nexus-modal-header">
                <h3 class="blog-nexus-modal-title">Confirm Deletion</h3>
                <span class="blog-nexus-modal-close" onclick="closeModal('deleteBlogModal')">&times;</span>
            </div>
            <div class="blog-nexus-modal-body">
                <p class="blog-nexus-modal-message">Are you sure you want to delete this blog? This action cannot be undone.</p>
                <input type="hidden" id="deleteBlogId">
            </div>
            <div class="blog-nexus-modal-footer">
                <button type="button" class="blog-nexus-delete-btn" onclick="deleteBlog()">Delete</button>
                <button type="button" class="blog-nexus-secondary-btn" onclick="closeModal('deleteBlogModal')">Cancel</button>
            </div>
        </div>
    </div>
    @else
    <!-- Guest Blog Gallery -->
    <div class="blog-nexus-gallery">
        @foreach($blogs as $blog)
            <div class="blog-nexus-card">
                @if($blog->image)
                    <div class="blog-nexus-card-image">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="blog-nexus-img">
                        <div class="blog-nexus-image-overlay"></div>
                    </div>
                @endif
                <div class="blog-nexus-card-content">
                    <h5 class="blog-nexus-card-title">{{ $blog->title }}</h5>
                    <p class="blog-nexus-card-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 120) }}</p>
                    <a href="{{ route('blogs.show', $blog->id) }}" class="blog-nexus-read-more">
                        Read Full Article
                        <span class="blog-nexus-arrow">→</span>
                    </a>
                </div>
                <div class="blog-nexus-card-footer">
                    <div class="blog-nexus-date-badge">
                        <span class="blog-nexus-date-icon">📅</span>
                        {{ $blog->created_at->format('M d, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endauth
</div>

<script>
// Modal management
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
    document.body.style.overflow = 'hidden';
}
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.body.style.overflow = 'auto';
    if (modalId === 'editBlogModal' && tinymce.get('editContent')) {
        tinymce.get('editContent').remove();
    }
}
window.onclick = function(event) {
    const modals = document.getElementsByClassName('blog-nexus-modal');
    for (let i = 0; i < modals.length; i++) {
        if (event.target === modals[i]) {
            modals[i].style.display = 'none';
            document.body.style.overflow = 'auto';
            if (modals[i].id === 'editBlogModal' && tinymce.get('editContent')) {
                tinymce.get('editContent').remove();
            }
        }
    }
}

// View blog modal
function openViewModal(blogId) {
    document.getElementById('viewBlogTitle').innerText = 'Loading...';
    document.getElementById('viewBlogContent').innerHTML = '';
    document.getElementById('viewBlogImage').innerHTML = '';
    document.getElementById('viewBlogDate').innerText = '';
    openModal('viewBlogModal');
    fetch(`/blogs/${blogId}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewBlogTitle').innerText = data.blog.title;
        document.getElementById('viewBlogContent').innerHTML = data.blog.content;
        document.getElementById('viewBlogDate').innerHTML = `<span class="blog-nexus-date-icon">📅</span> ${data.createdAt}`;
        if (data.imageUrl) {
            document.getElementById('viewBlogImage').innerHTML = `<img src="${data.imageUrl}" alt="${data.blog.title}">`;
        }
    })
    .catch(() => {
        document.getElementById('viewBlogTitle').innerText = 'Error loading blog';
        document.getElementById('viewBlogContent').innerHTML = 'Failed to load blog content. Please try again later.';
    });
}

// Edit blog modal
function openEditModal(blogId) {
    document.getElementById('editTitle').value = '';
    document.getElementById('editCurrentImage').innerHTML = '';
    document.getElementById('editBlogId').value = blogId;
    if (tinymce.get('editContent')) { tinymce.get('editContent').remove(); }
    document.getElementById('editContent').value = '';
    openModal('editBlogModal');

    tinymce.init({
        selector: '#editContent',
        height: 300,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons',
            'template', 'codesample'
        ],
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image media table | code codesample | fullscreen preview | help',
        content_style: `
            body { 
                font-family: "Plus Jakarta Sans", Inter, Arial, sans-serif; 
                font-size: 14px;
                line-height: 1.6;
                color: #1f2937;
                margin: 0; padding: 1rem;
            }
            h1, h2, h3, h4, h5, h6 { color: #111111; margin-top: 1.5em; margin-bottom: 0.5em; }
            p { margin-bottom: 1em; }
            img { max-width: 100%; height: auto; }
            blockquote { border-left: 4px solid #e2e8f0; margin: 1.5em 0; padding: 0.5em 0 0.5em 1em; background-color: #f7fafc; }
            code { background-color: #f1f5f9; padding: 2px 4px; border-radius: 3px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }
            pre { background-color: #0f172a; color: #e2e8f0; padding: 1rem; border-radius: 6px; overflow-x: auto; }
            table { border-collapse: collapse; width: 100%; margin: 1em 0; }
            table td, table th { border: 1px solid #e2e8f0; padding: 8px 12px; text-align: left; }
            table th { background-color: #f7fafc; font-weight: bold; }
        `,
        branding: false,
        promotion: false,
        resize: true,
        elementpath: false,
        statusbar: true,
        paste_data_images: true,
        images_upload_url: '/admin/blogs/upload-image',
        images_upload_credentials: true,
        images_upload_handler: function (blobInfo, success, failure) {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.open('POST', '/admin/blogs/upload-image');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.onload = function() {
                if (xhr.status === 403) { failure('HTTP Error: ' + xhr.status, { remove: true }); return; }
                if (xhr.status < 200 || xhr.status >= 300) { failure('HTTP Error: ' + xhr.status); return; }
                const json = JSON.parse(xhr.responseText);
                if (!json || typeof json.location != 'string') { failure('Invalid JSON: ' + xhr.responseText); return; }
                success(json.location);
            };
            xhr.onerror = function () { failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status); };
            xhr.send(formData);
        },
        setup: function (editor) {
            editor.on('change', function () { editor.save(); });
            editor.on('init', function () { fetchBlogDataForEdit(blogId); });
        }
    });
}

function fetchBlogDataForEdit(blogId) {
    fetch(`/admin/blogs/${blogId}/`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editTitle').value = data.blog.title;
        document.getElementById('editBlogForm').action = `/admin/blogs/${blogId}`;
        if (tinymce.get('editContent')) {
            tinymce.get('editContent').setContent(data.blog.content || '');
        }
        if (data.imageUrl) {
            document.getElementById('editCurrentImage').innerHTML = 
                `<img src="${data.imageUrl}" alt="Current image" class="blog-nexus-preview-img">
                 <p class="blog-nexus-image-caption">Current featured image</p>`;
        }
    })
    .catch(() => {
        closeModal('editBlogModal');
        alert('Failed to load blog data for editing. Please try again later.');
    });
}

function submitEditForm() {
    if (tinymce.get('editContent')) { tinymce.get('editContent').save(); }
    document.getElementById('editBlogForm').submit();
}

// Delete blog modal
function openDeleteModal(blogId) {
    document.getElementById('deleteBlogId').value = blogId;
    openModal('deleteBlogModal');
}
function deleteBlog() {
    const blogId = document.getElementById('deleteBlogId').value;
    fetch(`/blogs/${blogId}/ajax-delete`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const notification = document.createElement('div');
            notification.className = 'blog-nexus-success-alert';
            notification.innerHTML = `<i class="blog-nexus-success-icon">✓</i> ${data.message}`;
            document.querySelector('.blog-nexus-container').prepend(notification);
            closeModal('deleteBlogModal');
            setTimeout(() => { window.location.reload(); }, 1000);
        } else {
            throw new Error(data.message);
        }
    })
    .catch(() => { alert('Failed to delete blog. Please try again later.'); });
}

function previewImage(input) {
    const file = input.files[0];
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('is-hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('is-hidden');
        previewImg.src = '';
    }
}

// Initialize TinyMCE editors
document.addEventListener('DOMContentLoaded', function() {
    initializeTinyMCE();
});
function initializeTinyMCE() {
    tinymce.init({
        selector: '.tinymce-editor',
        height: 400,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons',
            'template', 'codesample'
        ],
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image media table | code codesample | fullscreen preview | help',
        content_style: `
            body { 
                font-family: "Plus Jakarta Sans", Inter, Arial, sans-serif; 
                font-size: 14px;
                line-height: 1.6;
                color: #1f2937;
                margin: 0; padding: 1rem;
            }
            h1, h2, h3, h4, h5, h6 { color: #111111; margin-top: 1.5em; margin-bottom: 0.5em; }
            p { margin-bottom: 1em; }
            img { max-width: 100%; height: auto; }
            blockquote { border-left: 4px solid #e2e8f0; margin: 1.5em 0; padding: 0.5em 0 0.5em 1em; background-color: #f7fafc; }
            code { background-color: #f1f5f9; padding: 2px 4px; border-radius: 3px; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }
            pre { background-color: #0f172a; color: #e2e8f0; padding: 1rem; border-radius: 6px; overflow-x: auto; }
            table { border-collapse: collapse; width: 100%; margin: 1em 0; }
            table td, table th { border: 1px solid #e2e8f0; padding: 8px 12px; text-align: left; }
            table th { background-color: #f7fafc; font-weight: bold; }
        `,
        branding: false,
        promotion: false,
        resize: true,
        elementpath: false,
        statusbar: true,
        paste_data_images: true,
        images_upload_url: '/admin/blogs/upload-image',
        images_upload_credentials: true
    });
}
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection