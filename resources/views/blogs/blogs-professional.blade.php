@extends('layouts.app')

@section('title', 'Blog Management - Top Outsourcing Partners Admin')
@section('meta_description', 'Blog management dashboard for Top Outsourcing Partners administrators.')
@section('robots', 'noindex, nofollow')

<link rel="stylesheet" href="{{ asset('css/blogs.css') }}">

@section('content')
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