@extends('layouts.app')

@section('title', 'Blog Management - Top Outsourcing Partners Admin')
@section('meta_description', 'Blog management dashboard for Top Outsourcing Partners administrators.')
@section('robots', 'noindex, nofollow')

{{-- Option A: if your layout has @stack('styles') --}}
@push('styles')
  @vite('resources/css/admin/blogs.css')
@endpush

@section('content')
<style>
/* Admin Blog Management Styles (token-aligned) */
:root {
  /* optional neutrals used here */
  --slate-50: #f8fafc;
  --slate-100: #f1f5f9;
  --slate-200: #e2e8f0;
  --slate-300: #e5e7eb;
  --slate-600: #475569;
  --slate-700: #334155;
}

/* Container */
.blog-pro-container {
  min-height: 100vh;
  background: linear-gradient(180deg, #f9fafb 0%, #ffffff 100%);
  color: var(--ink);
  font-family: "Plus Jakarta Sans", sans-serif;
}

/* Header */
.admin-dashboard-header {
  background: var(--white);
  border-bottom: 1px solid rgba(17,24,39,0.08);
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
  padding: 1.25rem 0;
}
.dashboard-header-content {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 16px;
}
.dashboard-title {
  font-size: 1.75rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  color: var(--ink);
}
.admin-icon {
  background: rgba(46,164,79,0.12); /* brand tint */
  padding: 0.6rem;
  border-radius: 10px;
  font-size: 1.25rem;
  color: var(--brand-green);
}
.dashboard-subtitle {
  color: var(--muted);
  margin: 0.25rem 0 0 0;
  font-size: 0.95rem;
}
.header-actions {
  display: flex;
  align-items: center;
  gap: 16px;
}
.user-info {
  display: flex;
  align-items: center;
  gap: 10px;
}
.welcome-text { font-weight: 500; color: var(--ink); }
.user-avatar {
  width: 36px; height: 36px;
  background: #f3f4f6;
  border-radius: 50%;
  display: grid;
  place-items: center;
  color: var(--muted);
  border: 1px solid rgba(17,24,39,0.08);
}

/* Header buttons */
.logout-btn,
.newsletter-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 16px;
  border-radius: 70px;
  border: 1px solid var(--ink);
  background: var(--ink);
  color: var(--white);
  font-weight: 700;
  font-size: 0.95rem;
  transition: background-color 0.25s ease, border-color 0.25s ease, color 0.25s ease, transform 0.2s ease;
  text-decoration: none;
}
.logout-btn:hover,
.logout-btn:focus-visible,
.newsletter-btn:hover,
.newsletter-btn:focus-visible {
  background: var(--brand-green);
  border-color: var(--brand-green);
  color: var(--white);
  transform: translateY(-1px);
}

/* Alerts */
.alert {
  max-width: 1200px;
  margin: 1rem auto 0;
  padding: 12px 16px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  position: relative;
  border: 1px solid transparent;
}
.alert-success {
  background: #e8f8e8;
  border-color: rgba(46,164,79,0.25);
  color: #0f5132;
}
.alert-error {
  background: #fde8e8;
  border-color: rgba(239,68,68,0.25);
  color: #7f1d1d;
}
.alert-close {
  position: absolute;
  right: 12px;
  background: none;
  border: none;
  font-size: 1.1rem;
  cursor: pointer;
  color: inherit;
  opacity: 0.8;
}
.alert-close:hover { opacity: 1; }

/* Layout */
.blog-management-layout {
  max-width: 1400px;
  margin: 0 auto;
  padding: 24px 16px;
  display: flex;
  flex-direction: column;
  gap: 24px;
}
.table-section { order: 1; }
.form-section { order: 2; }

/* Cards */
.pro-card {
  background: var(--white);
  border-radius: 16px;
  border: 1px solid rgba(17,24,39,0.08);
  box-shadow: 0 8px 30px rgba(0,0,0,0.06);
  overflow: hidden;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.pro-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 40px rgba(0,0,0,0.10);
}
.card-header {
  background: linear-gradient(180deg, #fafbfc 0%, #f3f4f6 100%);
  padding: 16px 20px;
  border-bottom: 1px solid rgba(17,24,39,0.08);
  display: flex; justify-content: space-between; align-items: center;
}
.card-title {
  margin: 0; font-size: 1.1rem; font-weight: 700; color: var(--ink);
  display: flex; align-items: center; gap: 10px;
}
.card-title i { color: var(--brand-green); }
.header-stats { display: flex; gap: 10px; }
.stat-badge {
  background: var(--brand-green);
  color: var(--white);
  padding: 6px 10px;
  border-radius: 999px;
  font-size: 0.85rem;
  font-weight: 700;
}
.card-body { padding: 20px; }
.card-body.no-padding { padding: 0; }

/* Form */
.pro-form { display: flex; flex-direction: column; gap: 16px; }
.form-row { display: flex; gap: 12px; }
.form-group { flex: 1; }
.form-label {
  display: flex; align-items: center; gap: 8px;
  margin-bottom: 6px; font-weight: 700; color: var(--ink);
}
.form-input, .form-textarea, select.form-input {
  width: 100%; padding: 12px 14px;
  border: 1px solid rgba(17,24,39,0.12);
  border-radius: 12px;
  background: #f9fafb;
  font-size: 1rem; transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
}
.form-input:focus, .form-textarea:focus, select.form-input:focus {
  outline: none;
  border-color: var(--brand-green);
  background: var(--white);
  box-shadow: 0 0 0 3px rgba(46,164,79,0.12);
}
.form-input.error, .form-textarea.error { border-color: #ef4444; background: #fef2f2; }
.error-message { color: #ef4444; font-size: 0.875rem; margin-top: 6px; display: block; }
.form-help { color: var(--muted); }

/* File Upload */
.file-upload-area { position: relative; margin-bottom: 10px; }
.file-input { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
.file-upload-label {
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  padding: 22px; border: 1px dashed rgba(17,24,39,0.2);
  border-radius: 12px; background: #f9fafb; transition: border-color 0.2s ease, background 0.2s ease;
}
.file-upload-label:hover { border-color: var(--brand-green); background: #f3faf5; }
.upload-content { text-align: center; }
.upload-icon { font-size: 1.6rem; color: var(--brand-green); margin-bottom: 6px; }
.upload-text { display: block; font-weight: 700; color: var(--ink); margin-bottom: 2px; }
.upload-hint { color: var(--muted); font-size: 0.875rem; }
.image-preview, .current-image { margin-top: 10px; text-align: center; }
.current-image-container {
  display: flex; align-items: center; gap: 12px;
  padding: 12px; background: #f8fafc; border-radius: 12px; border: 1px solid rgba(17,24,39,0.08);
}
.current-image-info { text-align: left; flex: 1; }
.image-note { color: var(--muted); font-size: 0.8rem; display: block; margin-top: 2px; }
.no-current-image {
  padding: 20px; background: #f9fafb; border-radius: 12px;
  border: 1px solid rgba(17,24,39,0.08); text-align: center; color: var(--muted);
}
.no-current-image i { font-size: 1.5rem; margin-bottom: 6px; display: block; }
.preview-image {
  max-width: 120px; max-height: 120px; border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08); object-fit: cover;
}
.preview-caption { color: var(--muted); font-size: 0.875rem; margin-top: 6px; }
.is-hidden { display: none !important; }

/* Buttons (aligned with global a.btn-primary feel) */
.btn {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 14px 18px; border-radius: 12px; font-weight: 700;
  cursor: pointer; transition: transform 0.15s ease, box-shadow 0.2s ease, background 0.2s ease, color 0.2s ease;
  border: 1px solid transparent; background: #f3f4f6; color: var(--ink);
}
.btn:focus-visible { outline: 2px solid var(--brand-green); outline-offset: 2px; }
.btn-primary { background: var(--ink); border-color: var(--ink); color: var(--white); }
.btn-primary:hover { background: var(--brand-green); border-color: var(--brand-green); transform: translateY(-1px); }
.btn-secondary { background: transparent; border: 1px solid var(--ink); color: var(--ink); }
.btn-secondary:hover { background: var(--ink); color: var(--white); transform: translateY(-1px); }
.btn-danger { background: #ef4444; border-color: #ef4444; color: var(--white); }
.btn-danger:hover { background: #dc2626; border-color: #dc2626; transform: translateY(-1px); }
.form-actions { display: flex; gap: 10px; margin-top: 8px; }

/* Table */
.pro-table-container { overflow-x: auto; }
.pro-table { width: 100%; border-collapse: collapse; }
.table-header { background: #f8fafc; }
.table-header th {
  padding: 14px; text-align: left; font-weight: 700; color: var(--ink);
  border-bottom: 1px solid rgba(17,24,39,0.08); font-size: 0.85rem; letter-spacing: 0.02em; text-transform: uppercase;
}
.table-row { border-bottom: 1px solid rgba(17,24,39,0.06); transition: background-color 0.15s ease; }
.table-row:hover { background: #f9fafb; }
.table-row td { padding: 14px; vertical-align: middle; }
.td-number { font-weight: 700; color: var(--muted); width: 60px; }
.td-image { width: 80px; }
.table-image {
  width: 50px; height: 50px; object-fit: cover; border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
.no-image {
  width: 50px; height: 50px; background: #f3f4f6; border-radius: 8px;
  display: grid; place-items: center; color: #9ca3af;
}
.title-content { max-width: 320px; }
.blog-title { margin: 0 0 6px 0; font-size: 1rem; font-weight: 700; color: var(--ink); line-height: 1.4; }
.blog-excerpt { margin: 0; color: var(--muted); font-size: 0.9rem; line-height: 1.5; }
.td-date { min-width: 120px; }
.date-text { display: block; font-weight: 700; color: var(--ink); }
.time-text { display: block; font-size: 0.875rem; color: var(--muted); margin-top: 2px; }

/* Type badges */
.td-type { width: 140px; }
.type-badge {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 8px 10px; border-radius: 999px; font-size: 0.85rem; font-weight: 700; white-space: nowrap; color: var(--white);
}
.type-badge.blog-post { background: #1d4ed8; }
.type-badge.case-study { background: var(--brand-green); }

/* Row actions */
.action-buttons { display: flex; gap: 6px; }
.action-btn {
  width: 36px; height: 36px; border: none; border-radius: 8px; cursor: pointer;
  display: grid; place-items: center; color: var(--white);
  transition: transform 0.15s ease, box-shadow 0.2s ease, background 0.2s ease;
}
.view-btn { background: var(--brand-green); }
.edit-btn { background: #d97706; }
.delete-btn { background: #dc2626; }
.action-btn:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }

/* Empty state */
.empty-state { text-align: center; padding: 32px 16px; color: var(--muted); }
.empty-icon { font-size: 2.5rem; margin-bottom: 8px; opacity: 0.6; }
.empty-title { margin: 0 0 6px 0; color: var(--ink); }

/* Modals */
.pro-modal {
  display: none; position: fixed; inset: 0; z-index: 1200;
  padding: 24px; overflow-y: auto;
}
.modal-content {
  position: relative; background: var(--white); border-radius: 16px;
  max-width: 500px; margin: 0 auto;
  box-shadow: 0 20px 60px rgba(0,0,0,0.30);
  border: 1px solid rgba(17,24,39,0.12);
  display: flex; flex-direction: column;
}
.modal-large { max-width: 1000px; }
.modal-small { max-width: 400px; }
.modal-header {
  padding: 16px 20px; border-bottom: 1px solid rgba(17,24,39,0.08);
  display: flex; justify-content: space-between; align-items: center;
  background: #f8fafc;
}
.modal-title { margin: 0; font-size: 1.1rem; font-weight: 700; color: var(--ink); }
.modal-close {
  background: none; border: none; font-size: 1.25rem; cursor: pointer;
  color: var(--muted); padding: 6px; border-radius: 8px; transition: background 0.15s ease, color 0.15s ease;
}
.modal-close:hover { background: #f3f4f6; color: var(--ink); }
.modal-body { padding: 20px; overflow-y: auto; }
.modal-footer {
  padding: 16px 20px; border-top: 1px solid rgba(17,24,39,0.08);
  display: flex; gap: 10px; justify-content: flex-end; background: #f9fafb;
}
.modal-view-image {
  max-width: 100%; height: auto; border-radius: 12px; margin-bottom: 12px; display: block;
}
.modal-date { color: var(--muted); margin-bottom: 8px; }
.modal-text { color: var(--ink); }
.text-justify { text-align: justify; }

/* Responsive */
@media (max-width: 768px) {
  .dashboard-header-content { flex-direction: column; gap: 10px; text-align: center; }
  .header-actions { flex-direction: column; gap: 10px; }
  .blog-management-layout { padding: 16px 10px; gap: 16px; }
  .form-row { flex-direction: column; }
  .action-buttons { flex-direction: column; }
  .modal-content { margin: 1rem; max-width: calc(100% - 2rem); }
}

/* Accessibility polish if global CSS removed outlines */
a:focus-visible, button:focus-visible { outline: 2px solid var(--brand-green); outline-offset: 2px; }
</style>
<div class="blog-pro-container">
    @auth
    <!-- Professional Admin Dashboard Header -->
    <div class="admin-dashboard-header">
        <div class="dashboard-header-content">
            <div class="header-info">
                <h1 class="dashboard-title">
                    <i class="fas fa-blog admin-icon"></i>
                    Blog Management System
                </h1>
                <p class="dashboard-subtitle">Create, manage, and publish your blog content</p>
            </div>
            <div class="header-actions">
                <div class="user-info">
                    <span class="welcome-text">Welcome back, Admin</span>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <a href="{{ route('admin.newsletter.index') }}" class="newsletter-btn" title="Manage Newsletter">
                    <i class="fas fa-envelope"></i>
                    <span>Newsletter</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
            <button type="button" class="alert-close" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Professional Blog Management Layout -->
    <div class="blog-management-layout">
        <!-- Blog Management Table (First) -->
        <div class="table-section">
            <div class="pro-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-list"></i>
                        Published Content
                    </h2>
                    <div class="header-stats">
                        <span class="stat-badge">{{ $blogs->count() }} Items</span>
                    </div>
                </div>
                <div class="card-body no-padding">
                    @if($blogs->count() > 0)
                        <div class="pro-table-container">
                            <table class="pro-table">
                                <thead class="table-header">
                                    <tr>
                                        <th class="th-number">#</th>
                                        <th class="th-image">Image</th>
                                        <th class="th-title">Title</th>
                                        <th class="th-type">Type</th>
                                        <th class="th-date">Created</th>
                                        <th class="th-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @foreach($blogs as $blog)
                                        <tr class="table-row">
                                            <td class="td-number">{{ $loop->iteration }}</td>
                                            <td class="td-image">
                                                @if($blog->image)
                                                    <img src="{{ $blog->image }}" alt="Blog image" class="table-image">
                                                @else
                                                    <div class="no-image">
                                                        <i class="fas fa-image"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="td-title">
                                                <div class="title-content">
                                                    <h4 class="blog-title">{{ $blog->title }}</h4>
                                                    <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80) }}</p>
                                                </div>
                                            </td>
                                            <td class="td-type">
                                                <span class="type-badge {{ $blog->type === 'case_study' ? 'case-study' : 'blog-post' }}">
                                                    <i class="fas {{ $blog->type === 'case_study' ? 'fa-chart-line' : 'fa-blog' }}"></i>
                                                    {{ $blog->formatted_type }}
                                                </span>
                                            </td>
                                            <td class="td-date">
                                                <span class="date-text">{{ $blog->created_at->format('M d, Y') }}</span>
                                                <span class="time-text">{{ $blog->created_at->format('h:i A') }}</span>
                                            </td>
                                            <td class="td-actions">
                                                <div class="action-buttons">
                                                    <button class="action-btn view-btn" onclick="openViewModal({{ $blog->id }})" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="action-btn edit-btn" onclick="openEditModal({{ $blog->id }})" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="action-btn delete-btn" onclick="openDeleteModal({{ $blog->id }})" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-blog empty-icon"></i>
                            <h3 class="empty-title">No Content Yet</h3>
                            <p class="empty-text">Create your first blog post or case study to get started!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Blog Creation/Editing Form (Second) -->
        <div class="form-section">
            <div class="pro-card">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-plus-circle"></i>
                        Create New Content
                    </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="pro-form" onsubmit="return validateForm()">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="title" class="form-label">
                                    <i class="fas fa-heading"></i>
                                    Content Title
                                </label>
                                <input 
                                    type="text" 
                                    class="form-input @error('title') error @enderror" 
                                    id="title" 
                                    name="title" 
                                    value="{{ old('title') }}" 
                                    placeholder="Enter an engaging title..."
                                    required
                                >
                                @error('title')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="type" class="form-label">
                                    <i class="fas fa-tags"></i>
                                    Content Type
                                </label>
                                <select 
                                    class="form-input @error('type') error @enderror" 
                                    id="type" 
                                    name="type" 
                                    required
                                    onchange="updateFormLabels(this.value)"
                                >
                                    <option value="">Select content type...</option>
                                    <option value="blog" {{ old('type') === 'blog' ? 'selected' : '' }}>
                                        📝 Blog Post
                                    </option>
                                    <option value="case_study" {{ old('type') === 'case_study' ? 'selected' : '' }}>
                                        📊 Case Study
                                    </option>
                                </select>
                                @error('type')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="image" class="form-label">
                                    <i class="fas fa-image"></i>
                                    Featured Image
                                </label>
                                <div class="file-upload-area">
                                    <input type="file" id="image" name="image" accept="image/*" class="file-input" onchange="previewImage(this)">
                                    <label for="image" class="file-upload-label">
                                        <div class="upload-content">
                                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                            <span class="upload-text">Choose Image</span>
                                            <span class="upload-hint">PNG, JPG, GIF up to 2MB</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <!-- Image Preview -->
                                <div id="imagePreview" class="image-preview is-hidden">
                                    <img id="previewImg" src="" alt="Preview" class="preview-image">
                                    <p class="preview-caption">Image Preview</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="keywords" class="form-label">
                                    <i class="fas fa-tags"></i>
                                    Keywords/Tags
                                </label>
                                <input 
                                    type="text" 
                                    class="form-input @error('keywords') error @enderror" 
                                    id="keywords" 
                                    name="keywords" 
                                    value="{{ old('keywords') }}" 
                                    placeholder="Enter keywords separated by commas (e.g., outsourcing, business, technology)"
                                >
                                <small class="form-help">Separate multiple keywords with commas</small>
                                @error('keywords')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="content" class="form-label">
                                    <i class="fas fa-edit"></i>
                                    <span id="content-label">Content</span>
                                </label>
                                <textarea 
                                    class="form-textarea tinymce-editor @error('content') error @enderror" 
                                    id="content" 
                                    name="content" 
                                    rows="8" 
                                    placeholder="Write your amazing content here..."
                                    required
                                >{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                <span id="submit-button-text">Publish Content</span>
                            </button>
                            <button type="reset" class="btn btn-secondary" onclick="clearCreateForm()">
                                <i class="fas fa-undo"></i>
                                Reset Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popups -->
    <!-- View Blog Modal -->
    <div id="viewBlogModal" class="pro-modal">
        <div class="modal-content modal-large">
            <div class="modal-header">
                <h3 id="viewBlogTitle" class="modal-title">Blog Title</h3>
                <button class="modal-close" onclick="closeModal('viewBlogModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="viewBlogImage" class="modal-image"></div>
                <div id="viewBlogDate" class="modal-date"></div>
                <div id="viewBlogContent" class="modal-text text-justify"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('viewBlogModal')">Close</button>
            </div>
        </div>
    </div>
    
    <!-- Edit Blog Modal -->
    <div id="editBlogModal" class="pro-modal">
        <div class="modal-content modal-large">
            <div class="modal-header">
                <h3 class="modal-title">Edit Blog</h3>
                <button class="modal-close" onclick="closeModal('editBlogModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="editBlogForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editBlogId" name="id">
                    
                    <div class="form-group">
                        <label for="editTitle" class="form-label">Blog Title</label>
                        <input type="text" class="form-input" id="editTitle" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="editType" class="form-label">Content Type</label>
                        <select class="form-input" id="editType" name="type" required>
                            <option value="">Select content type...</option>
                            <option value="blog">📝 Blog Post</option>
                            <option value="case_study">📊 Case Study</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="editKeywords" class="form-label">Keywords/Tags</label>
                        <input type="text" class="form-input" id="editKeywords" name="keywords" placeholder="Enter keywords separated by commas (e.g., outsourcing, business, technology)">
                        <small class="form-help">Separate multiple keywords with commas</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="editImage" class="form-label">Featured Image</label>
                        <div class="file-upload-area">
                            <input type="file" class="file-input" id="editImage" name="image" accept="image/*" onchange="previewEditImage(this)">
                            <label for="editImage" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                Choose New Image
                            </label>
                        </div>
                        <div id="editCurrentImage" class="current-image"></div>
                        <div id="editImagePreview" class="image-preview is-hidden">
                            <img id="editPreviewImg" src="" alt="New Image Preview" class="preview-image">
                            <p class="preview-caption">New Image Preview</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="editContent" class="form-label">Blog Content</label>
                        <textarea class="form-textarea tinymce-editor" id="editContent" name="content" rows="8" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submitEditForm()">Update Blog</button>
                <button type="button" class="btn btn-secondary" onclick="closeModal('editBlogModal')">Cancel</button>
            </div>
        </div>
    </div>
    
    <!-- Delete Blog Modal -->
    <div id="deleteBlogModal" class="pro-modal">
        <div class="modal-content modal-small">
            <div class="modal-header">
                <h3 class="modal-title">Confirm Deletion</h3>
                <button class="modal-close" onclick="closeModal('deleteBlogModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="delete-confirmation">
                    <i class="fas fa-exclamation-triangle warning-icon"></i>
                    <p class="warning-text">Are you sure you want to delete this blog? This action cannot be undone.</p>
                </div>
                <input type="hidden" id="deleteBlogId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deleteBlog()">Delete</button>
                <button type="button" class="btn btn-secondary" onclick="closeModal('deleteBlogModal')">Cancel</button>
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
// Professional Blog Management JavaScript

// Update form labels based on content type
function updateFormLabels(type) {
    const titleInput = document.getElementById('title');
    const contentLabel = document.getElementById('content-label');
    const submitButtonText = document.getElementById('submit-button-text');
    const contentTextarea = document.getElementById('content');
    
    if (type === 'case_study') {
        titleInput.placeholder = 'Enter an engaging case study title...';
        contentLabel.textContent = 'Case Study Content';
        submitButtonText.textContent = 'Publish Case Study';
        contentTextarea.placeholder = 'Write your detailed case study here...';
    } else if (type === 'blog') {
        titleInput.placeholder = 'Enter an engaging blog title...';
        contentLabel.textContent = 'Blog Content';
        submitButtonText.textContent = 'Publish Blog';
        contentTextarea.placeholder = 'Write your amazing blog content here...';
    } else {
        titleInput.placeholder = 'Enter an engaging title...';
        contentLabel.textContent = 'Content';
        submitButtonText.textContent = 'Publish Content';
        contentTextarea.placeholder = 'Write your amazing content here...';
    }
}

// Modal management
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'block';

    const content = modal.querySelector('.modal-content');
    content.style.transform = 'scale(0.9)';
    content.style.opacity = '0';
    
    setTimeout(() => {
        content.style.transform = 'scale(1)';
        content.style.opacity = '1';
        content.style.transition = 'all 0.3s ease';
    }, 10);
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    const content = modal.querySelector('.modal-content');
    
    content.style.transform = 'scale(0.9)';
    content.style.opacity = '0';
    content.style.transition = 'all 0.3s ease';
    
    setTimeout(() => {
        modal.style.display = 'none';
        if (modalId === 'editBlogModal' && tinymce.get('editContent')) {
            tinymce.get('editContent').remove();
        }
    }, 300);
}

// View blog modal
function openViewModal(blogId) {
    document.getElementById('viewBlogTitle').innerText = 'Loading...';
    document.getElementById('viewBlogContent').innerHTML = '<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Loading content...</div>';
    document.getElementById('viewBlogImage').innerHTML = '';
    document.getElementById('viewBlogDate').innerText = '';
    
    openModal('viewBlogModal');
    
    fetch(`/blogs/${blogId}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewBlogTitle').innerText = data.blog.title;
        document.getElementById('viewBlogContent').innerHTML = data.blog.content;
        document.getElementById('viewBlogDate').innerHTML = `<i class="fas fa-calendar"></i> ${data.createdAt}`;
        
        if (data.imageUrl) {
            document.getElementById('viewBlogImage').innerHTML = 
                `<img src="${data.imageUrl}" alt="${data.blog.title}" class="modal-view-image">`;
        } else {
            document.getElementById('viewBlogImage').innerHTML = '';
        }
    })
    .catch(error => {
        console.error('Error fetching blog data:', error);
        document.getElementById('viewBlogTitle').innerText = 'Error loading blog';
        document.getElementById('viewBlogContent').innerHTML = '<div class="error-message"><i class="fas fa-exclamation-triangle"></i> Failed to load blog content. Please try again later.</div>';
    });
}

// Edit blog modal
function openEditModal(blogId) {
    document.getElementById('editTitle').value = '';
    document.getElementById('editType').value = '';
    document.getElementById('editKeywords').value = '';
    document.getElementById('editCurrentImage').innerHTML = '';
    document.getElementById('editImage').value = '';
    document.getElementById('editImagePreview').classList.add('is-hidden');
    document.getElementById('editBlogId').value = blogId;
    
    if (tinymce.get('editContent')) {
        tinymce.get('editContent').remove();
    }
    document.getElementById('editContent').value = '';
    openModal('editBlogModal');
    initializeTinyMCEForModal();
    fetchBlogDataForEdit(blogId);
}

function initializeTinyMCEForModal() {
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
                color: #333;
                max-width: 100%;
                margin: 0 auto;
                padding: 1rem;
            }
            h1, h2, h3, h4, h5, h6 {
                color: #1f2937;
                margin-top: 1.5em;
                margin-bottom: 0.5em;
            }
            p { margin-bottom: 1em; }
            img { max-width: 100%; height: auto; }
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
        setup: function (editor) { editor.on('change', function () { editor.save(); }); }
    });
}

function fetchBlogDataForEdit(blogId) {
    fetch(`/admin/blogs/${blogId}/`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editTitle').value = data.blog.title;
        document.getElementById('editType').value = data.blog.type;
        document.getElementById('editKeywords').value = data.blog.keywords ? data.blog.keywords.join(', ') : '';
        document.getElementById('editBlogForm').action = `/admin/blogs/${blogId}`;
        setTimeout(() => { if (tinymce.get('editContent')) { tinymce.get('editContent').setContent(data.blog.content || ''); } }, 500);
        if (data.imageUrl) {
            document.getElementById('editCurrentImage').innerHTML = 
                `<div class="current-image-container">
                    <img src="${data.imageUrl}" alt="Current image" class="preview-image">
                    <div class="current-image-info">
                        <p class="preview-caption">Current featured image</p>
                        <small class="image-note">Choose a new image above to replace this one</small>
                    </div>
                 </div>`;
        } else {
            document.getElementById('editCurrentImage').innerHTML = 
                `<div class="no-current-image">
                    <i class="fas fa-image"></i>
                    <p>No featured image currently set</p>
                 </div>`;
        }
    })
    .catch(error => {
        console.error('Error fetching blog data for edit:', error);
        closeModal('editBlogModal');
        showNotification('Failed to load blog data for editing. Please try again later.', 'error');
    });
}

function submitEditForm() {
    if (tinymce.get('editContent')) { tinymce.get('editContent').save(); }
    const form = document.getElementById('editBlogForm');
    const formData = new FormData(form);
    const submitBtn = document.querySelector('#editBlogModal .btn-primary');
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    submitBtn.disabled = true;
    fetch(form.action, {
        method: 'POST', body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeModal('editBlogModal');
            showNotification(data.message, 'success');
            setTimeout(() => { window.location.reload(); }, 1000);
        } else {
            showNotification(data.message || 'Failed to update blog', 'error');
        }
    })
    .catch(error => {
        console.error('Error updating blog:', error);
        showNotification('Failed to update blog. Please try again.', 'error');
    })
    .finally(() => {
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
    });
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
            showNotification(data.message, 'success');
            closeModal('deleteBlogModal');
            setTimeout(() => { window.location.reload(); }, 1000);
        } else {
            throw new Error(data.message);
        }
    })
    .catch(error => {
        console.error('Error deleting blog:', error);
        showNotification('Failed to delete blog. Please try again later.', 'error');
    });
}

// Image preview function
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

// Image preview function for edit modal
function previewEditImage(input) {
    const file = input.files[0];
    const preview = document.getElementById('editImagePreview');
    const previewImg = document.getElementById('editPreviewImg');

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

// Notification function
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'}"></i>
        <span>${message}</span>
        <button type="button" class="alert-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    const header = document.querySelector('.admin-dashboard-header');
    header.insertAdjacentElement('afterend', notification);
    
    setTimeout(() => { if (notification.parentElement) notification.remove(); }, 5000);
}

// Initialize TinyMCE editors on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeTinyMCE();
});

function initializeTinyMCE() {
    tinymce.init({
        selector: '.tinymce-editor:not(#editContent)',
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
                color: #333;
                max-width: 100%;
                margin: 0 auto;
                padding: 1rem;
            }
            h1, h2, h3, h4, h5, h6 { color: #1f2937; margin-top: 1.5em; margin-bottom: 0.5em; }
            p { margin-bottom: 1em; }
            img { max-width: 100%; height: auto; }
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
        setup: function (editor) { editor.on('change', function () { editor.save(); }); }
    });
}

// Initialize page state
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        const alertText = successAlert.textContent || '';
        if (alertText.includes('updated') || alertText.includes('Blog updated')) {
            clearCreateForm();
        }
    }
    const formTitle = document.querySelector('.form-section .card-title');
    if (formTitle) {
        formTitle.innerHTML = '<i class="fas fa-plus-circle"></i> Create New Content';
    }
    updateFormLabels('');
    initializeTinyMCE();
});

// Function to clear create form
function clearCreateForm() {
    document.getElementById('title').value = '';
    document.getElementById('type').value = '';
    document.getElementById('keywords').value = '';
    document.getElementById('image').value = '';
    const imagePreview = document.getElementById('imagePreview');
    if (imagePreview) {
        imagePreview.classList.add('is-hidden');
        document.getElementById('previewImg').src = '';
    }
    setTimeout(() => {
        if (tinymce.get('content')) {
            tinymce.get('content').setContent('');
        }
    }, 500);
    updateFormLabels('');
}

// Form validation function
function validateForm() {
    const title = document.getElementById('title').value.trim();
    const type = document.getElementById('type').value;
    const content = tinymce.get('content') ? tinymce.get('content').getContent() : document.getElementById('content').value;

    if (!title) { alert('Please enter a title'); return false; }
    if (!type) { alert('Please select a content type'); return false; }
    if (!content || content.trim() === '') { alert('Please enter some content'); return false; }
    if (tinymce.get('content')) { tinymce.get('content').save(); }
    return true;
}
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection