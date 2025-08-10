@extends('layouts.app')

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

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
            <button type="button" class="alert-close" onclick="this.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

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
                                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog image" class="table-image">
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
                                <div id="imagePreview" class="image-preview" style="display:none">
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
                <div id="viewBlogContent" class="modal-text" style="text-align: justify;"></div>
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
                        <div id="editImagePreview" class="image-preview" style="display:none">
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
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-nexus-img">
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
    document.getElementById(modalId).style.display = 'block';
    // Don't disable body scrolling
    
    // Add animation
    const modal = document.getElementById(modalId);
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
        // Don't restore body overflow since we never disabled it
        
        // Clean up TinyMCE instance when closing edit modal
        if (modalId === 'editBlogModal' && tinymce.get('editContent')) {
            tinymce.get('editContent').remove();
        }
    }, 300);
}

// Removed window click event since there's no backdrop anymore

// View blog modal
function openViewModal(blogId) {
    // Show loading state
    document.getElementById('viewBlogTitle').innerText = 'Loading...';
    document.getElementById('viewBlogContent').innerHTML = '<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i> Loading content...</div>';
    document.getElementById('viewBlogImage').innerHTML = '';
    document.getElementById('viewBlogDate').innerText = '';
    
    openModal('viewBlogModal');
    
    // Fetch blog data using AJAX
    fetch(`/blogs/${blogId}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('viewBlogTitle').innerText = data.blog.title;
        document.getElementById('viewBlogContent').innerHTML = data.blog.content;
        document.getElementById('viewBlogDate').innerHTML = `<i class="fas fa-calendar"></i> ${data.createdAt}`;
        
        if (data.imageUrl) {
            document.getElementById('viewBlogImage').innerHTML = 
                `<img src="${data.imageUrl}" alt="${data.blog.title}" style="max-width: 100%; border-radius: 12px; margin-bottom: 1rem;">`;
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
    // Show loading state
    document.getElementById('editTitle').value = '';
    document.getElementById('editType').value = '';
    document.getElementById('editKeywords').value = '';
    document.getElementById('editCurrentImage').innerHTML = '';
    document.getElementById('editImage').value = ''; // Clear file input
    document.getElementById('editImagePreview').style.display = 'none'; // Hide new image preview
    document.getElementById('editBlogId').value = blogId;
    
    // Remove existing TinyMCE instance if it exists
    if (tinymce.get('editContent')) {
        tinymce.get('editContent').remove();
    }
    
    // Clear the textarea
    document.getElementById('editContent').value = '';
    
    openModal('editBlogModal');
    
    // Initialize TinyMCE for edit modal
    initializeTinyMCEForModal();
    
    // Fetch blog data
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
                font-family: Inter, Arial, sans-serif; 
                font-size: 14px;
                line-height: 1.6;
                color: #333;
                max-width: 100%;
                margin: 0 auto;
                padding: 1rem;
            }
            h1, h2, h3, h4, h5, h6 {
                color: #2d3748;
                margin-top: 1.5em;
                margin-bottom: 0.5em;
            }
            p {
                margin-bottom: 1em;
            }
            img {
                max-width: 100%;
                height: auto;
            }
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
                if (xhr.status === 403) {
                    failure('HTTP Error: ' + xhr.status, { remove: true });
                    return;
                }
                
                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                
                const json = JSON.parse(xhr.responseText);
                
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                
                success(json.location);
            };
            
            xhr.onerror = function () {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };
            
            xhr.send(formData);
        },
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
}

function fetchBlogDataForEdit(blogId) {
    // Fetch blog data using AJAX
    fetch(`/admin/blogs/${blogId}/`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editTitle').value = data.blog.title;
        document.getElementById('editType').value = data.blog.type;
        document.getElementById('editKeywords').value = data.blog.keywords ? data.blog.keywords.join(', ') : '';
        document.getElementById('editBlogForm').action = `/admin/blogs/${blogId}`;
        
        // Set content in TinyMCE editor
        setTimeout(() => {
            if (tinymce.get('editContent')) {
                tinymce.get('editContent').setContent(data.blog.content || '');
            }
        }, 500);
        
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
    // Ensure TinyMCE content is synced to textarea before submit
    if (tinymce.get('editContent')) {
        tinymce.get('editContent').save();
    }
    
    const form = document.getElementById('editBlogForm');
    const formData = new FormData(form);
    const submitBtn = document.querySelector('#editBlogModal .btn-primary');
    const originalBtnText = submitBtn.innerHTML;
    
    // Show loading state
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
    submitBtn.disabled = true;
    
    // Submit form via AJAX
    fetch(form.action, {
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
            // Close modal
            closeModal('editBlogModal');
            
            // Show success notification
            showNotification(data.message, 'success');
            
            // Reload page to show updated data
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showNotification(data.message || 'Failed to update blog', 'error');
        }
    })
    .catch(error => {
        console.error('Error updating blog:', error);
        showNotification('Failed to update blog. Please try again.', 'error');
    })
    .finally(() => {
        // Restore button state
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
    
    // Send DELETE request using fetch
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
            
            // Remove row from table or refresh page after short delay
            setTimeout(() => {
                window.location.reload();
            }, 1000);
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
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
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
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
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
    
    // Insert after header
    const header = document.querySelector('.admin-dashboard-header');
    header.insertAdjacentElement('afterend', notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

// Initialize TinyMCE editors on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeTinyMCE();
});

function initializeTinyMCE() {
    tinymce.init({
        selector: '.tinymce-editor:not(#editContent)', // Exclude modal editor
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
                font-family: Inter, Arial, sans-serif; 
                font-size: 14px;
                line-height: 1.6;
                color: #333;
                max-width: 100%;
                margin: 0 auto;
                padding: 1rem;
            }
            h1, h2, h3, h4, h5, h6 {
                color: #2d3748;
                margin-top: 1.5em;
                margin-bottom: 0.5em;
            }
            p {
                margin-bottom: 1em;
            }
            img {
                max-width: 100%;
                height: auto;
            }
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
                if (xhr.status === 403) {
                    failure('HTTP Error: ' + xhr.status, { remove: true });
                    return;
                }
                
                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                
                const json = JSON.parse(xhr.responseText);
                
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                
                success(json.location);
            };
            
            xhr.onerror = function () {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };
            
            xhr.send(formData);
        },
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
}

// Initialize page state
document.addEventListener('DOMContentLoaded', function() {
    // Clear create form if there's a success message about blog updates
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        const alertText = successAlert.textContent || '';
        if (alertText.includes('updated') || alertText.includes('Blog updated')) {
            clearCreateForm();
        }
    }
    
    // Ensure form title is correct
    const formTitle = document.querySelector('.form-section .card-title');
    if (formTitle) {
        formTitle.innerHTML = '<i class="fas fa-plus-circle"></i> Create New Content';
    }
    
    // Reset form labels to default state
    updateFormLabels('');
    
    // Initialize TinyMCE
    initializeTinyMCE();
});

// Function to clear create form
function clearCreateForm() {
    // Clear regular form fields
    document.getElementById('title').value = '';
    document.getElementById('type').value = '';
    document.getElementById('keywords').value = '';
    document.getElementById('image').value = '';
    
    // Hide image preview
    const imagePreview = document.getElementById('imagePreview');
    if (imagePreview) {
        imagePreview.style.display = 'none';
        document.getElementById('previewImg').src = '';
    }
    
    // Clear TinyMCE content
    setTimeout(() => {
        if (tinymce.get('content')) {
            tinymce.get('content').setContent('');
        }
    }, 500);
    
    // Reset form labels
    updateFormLabels('');
}

// Form validation function
function validateForm() {
    const title = document.getElementById('title').value.trim();
    const type = document.getElementById('type').value;
    const content = tinymce.get('content') ? tinymce.get('content').getContent() : document.getElementById('content').value;
    
    console.log('Form validation:', {
        title: title,
        type: type,
        content: content.substring(0, 100) + '...',
        contentLength: content.length
    });
    
    if (!title) {
        alert('Please enter a title');
        return false;
    }
    
    if (!type) {
        alert('Please select a content type');
        return false;
    }
    
    if (!content || content.trim() === '') {
        alert('Please enter some content');
        return false;
    }
    
    // Save TinyMCE content before submission
    if (tinymce.get('content')) {
        tinymce.get('content').save();
    }
    
    return true;
}
</script>

<!-- Professional Blog Management Styles -->
<style>
/* Professional Blog Management System Styles */
.blog-pro-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Dashboard Header */
.admin-dashboard-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem 0;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.dashboard-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.dashboard-title {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.admin-icon {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.75rem;
    border-radius: 12px;
    font-size: 1.5rem;
}

.dashboard-subtitle {
    color: rgba(255, 255, 255, 0.8);
    margin: 0.5rem 0 0 0;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 2rem;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.welcome-text {
    font-weight: 500;
}

.user-avatar {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.logout-form {
    margin: 0;
}

.logout-btn {
    background: rgba(255, 255, 255, 0.15);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.logout-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
}

.newsletter-btn {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 0.5rem 1.5rem;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
    margin-right: 1rem;
}

.newsletter-btn:hover {
    background: linear-gradient(135deg, #1d4ed8, #1e40af);
    transform: translateY(-2px);
    text-decoration: none;
    color: white;
}

.newsletter-btn span {
    font-size: 0.9rem;
    font-weight: 500;
}

/* Alert Styles */
.alert {
    max-width: 1200px;
    margin: 2rem auto 0;
    padding: 1rem 2rem;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 1rem;
    position: relative;
}

.alert-success {
    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    border: 1px solid #34d399;
    color: #065f46;
}

.alert-error {
    background: linear-gradient(135deg, #fecaca, #fca5a5);
    border: 1px solid #ef4444;
    color: #7f1d1d;
}

.alert-close {
    position: absolute;
    right: 1rem;
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    color: inherit;
    opacity: 0.7;
}

.alert-close:hover {
    opacity: 1;
}

/* Layout */
.blog-management-layout {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

/* Reorder sections */
.table-section {
    order: 1;
}

.form-section {
    order: 2;
}

/* Professional Cards */
.pro-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
}

.pro-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
}

.table-section .pro-card:hover {
    transform: none;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
}

.card-header {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-title i {
    color: #667eea;
}

.header-stats {
    display: flex;
    gap: 1rem;
}

.stat-badge {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
}

.card-body {
    padding: 2rem;
}

.card-body.no-padding {
    padding: 0;
}

/* Form Styles */
.pro-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-row {
    display: flex;
    gap: 1rem;
}

.form-group {
    flex: 1;
}

.form-label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 600;
    color: #374151;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-input,
.form-textarea {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.form-input.error,
.form-textarea.error {
    border-color: #ef4444;
    background: #fef2f2;
}

.error-message {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    display: block;
}

/* File Upload */
.file-upload-area {
    position: relative;
    margin-bottom: 1rem;
}

.file-input {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.file-upload-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    border: 2px dashed #d1d5db;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #f9fafb;
}

.file-upload-label:hover {
    border-color: #667eea;
    background: #f0f4ff;
}

.upload-content {
    text-align: center;
}

.upload-icon {
    font-size: 2rem;
    color: #667eea;
    margin-bottom: 0.5rem;
}

.upload-text {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.25rem;
}

.upload-hint {
    color: #6b7280;
    font-size: 0.875rem;
}

.image-preview,
.current-image {
    margin-top: 1rem;
    text-align: center;
}

.current-image-container {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
}

.current-image-info {
    text-align: left;
    flex: 1;
}

.image-note {
    color: #6b7280;
    font-size: 0.8rem;
    display: block;
    margin-top: 0.25rem;
}

.no-current-image {
    padding: 2rem;
    background: #f9fafb;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    text-align: center;
    color: #6b7280;
}

.no-current-image i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    display: block;
}

.preview-image {
    max-width: 120px;
    max-height: 120px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    object-fit: cover;
}

.preview-caption {
    color: #6b7280;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

/* Buttons */
.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.btn {
    padding: 0.875rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
    background: #f3f4f6;
    color: #374151;
}

.btn-secondary:hover {
    background: #e5e7eb;
    transform: translateY(-2px);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
}

/* Table Styles */
.pro-table-container {
    overflow-x: auto;
}

.pro-table {
    width: 100%;
    border-collapse: collapse;
}

.table-header {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
}

.table-header th {
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: #374151;
    border-bottom: 2px solid #e5e7eb;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.table-row {
    border-bottom: 1px solid #f3f4f6;
    transition: all 0.2s ease;
}

.table-row:hover {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
}

.table-row td {
    padding: 1rem;
    vertical-align: middle;
}

.td-number {
    font-weight: 600;
    color: #6b7280;
    width: 60px;
}

.td-image {
    width: 80px;
}

.table-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.no-image {
    width: 50px;
    height: 50px;
    background: #f3f4f6;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
}

.title-content {
    max-width: 300px;
}

.blog-title {
    margin: 0 0 0.5rem 0;
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    line-height: 1.4;
}

.blog-excerpt {
    margin: 0;
    color: #6b7280;
    font-size: 0.875rem;
    line-height: 1.4;
}

.td-date {
    min-width: 120px;
}

.date-text {
    display: block;
    font-weight: 500;
    color: #374151;
}

.time-text {
    display: block;
    font-size: 0.875rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

/* Type Badges */
.td-type {
    width: 140px;
}

.type-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 0.75rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
    white-space: nowrap;
}

.type-badge.blog-post {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
}

.type-badge.case-study {
    background: linear-gradient(135deg, #10b981, #047857);
    color: white;
}

.type-badge i {
    font-size: 0.875rem;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    position: relative;
    z-index: 1;
}

.action-btn {
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 500;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.view-btn {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.edit-btn {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.delete-btn {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    will-change: transform;
}

/* Ensure table section doesn't inherit transforms */
.table-section {
    transform: none;
    will-change: auto;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: #6b7280;
}

.empty-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.empty-title {
    margin: 0 0 0.5rem 0;
    color: #374151;
}

.empty-text {
    margin: 0;
}

/* Modal Styles */
.pro-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    padding: 2rem;
    overflow-y: auto;
}

.modal-backdrop {
    display: none; /* Remove backdrop */
}

.modal-content {
    position: relative;
    background: white;
    border-radius: 16px;
    max-width: 500px;
    margin: 0 auto;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    border: 2px solid #e5e7eb;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    min-height: auto;
}

.modal-large {
    max-width: 1000px; /* Increased from 800px */
}

.modal-small {
    max-width: 400px;
}

.modal-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
}

.modal-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1f2937;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: #6b7280;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.modal-close:hover {
    background: #f3f4f6;
    color: #374151;
}

.modal-body {
    padding: 2rem;
    overflow-y: auto;
    overflow-x: hidden;
    flex: 1;
    max-height: none; /* Remove height restriction */
}

.modal-footer {
    padding: 1.5rem 2rem;
    border-top: 1px solid #e5e7eb;
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    background: #f9fafb;
}

.delete-confirmation {
    text-align: center;
    padding: 1rem 0;
}

.warning-icon {
    font-size: 3rem;
    color: #f59e0b;
    margin-bottom: 1rem;
}

.warning-text {
    color: #374151;
    margin: 0;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-management-layout {
        padding: 1rem;
        gap: 1.5rem;
    }
    
    .dashboard-header-content {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .header-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .form-row {
        flex-direction: column;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .modal-content {
        margin: 1rem;
        max-width: calc(100% - 2rem);
    }
}
</style>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
