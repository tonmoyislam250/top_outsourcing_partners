@extends('layouts.app')

@section('title', 'Blog - Top Outsourcing Partners | Latest Insights & Industry Expertise')
@section('meta_description', 'Explore Top Outsourcing Partners blog for the latest insights on business outsourcing, finance trends, AI integration, corporate training, and industry best practices. Stay informed with expert analysis and actionable business strategies.')
@section('meta_keywords', 'outsourcing blog, business insights, finance trends, AI integration news, corporate training tips, industry best practices, business strategies, outsourcing expertise')

<link rel="stylesheet" href="{{ asset('css/blog-nexus.css') }}">

@section('content')
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