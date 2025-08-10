@extends('layouts.app')

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
        <!-- Logout button moved to hero section -->
    </div>

    <div class="blog-nexus-form-container">
        <div class="blog-nexus-form-header">
            <h3 class="blog-nexus-form-title">{{ isset($blog) ? 'Edit Blog Post' : 'Create New Blog' }}</h3>
        </div>
        <div class="blog-nexus-form-body">
            <!-- @if(isset($blog))
                <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data" class="blog-nexus-form">
                @method('PUT')
            @else -->
                <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="blog-nexus-form">
            <!-- @endif -->
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
                    <div id="imagePreview" class="blog-nexus-current-image" style="display:none">
                        <img id="previewImg" src="" alt="Image preview" class="blog-nexus-preview-img">
                        <p class="blog-nexus-image-caption">Selected image preview</p>
                    </div>
                    @if(isset($blog) && $blog->image)
                        <div class="blog-nexus-current-image">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Current image" class="blog-nexus-preview-img">
                            <p class="blog-nexus-image-caption">Current featured image</p>
                        </div>
                    @endif
                </div>
                <div class="blog-nexus-input-group">
                    <label for="content" class="blog-nexus-label">Blog Content</label>
                    <textarea class="blog-nexus-textarea" id="content" name="content" rows="8" 
                              placeholder="Write your amazing content here..." required>{{ isset($blog) ? $blog->content : old('content') }}</textarea>
                </div>
                
                <div class="blog-nexus-form-actions">
                    <button type="submit" class="blog-nexus-primary-btn">
                        {{ isset($blog) ? 'Update Blog' : 'Publish Blog' }}
                    </button>
                    <!-- @if(isset($blog))
                        <a href="{{ route('admin.blogs.index') }}" class="blog-nexus-secondary-btn">Cancel</a>
                    @endif -->
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
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog image" class="blog-nexus-table-img">
                                @else
                                    <div class="blog-nexus-no-image">📷</div>
                                @endif
                            </td>
                            <td class="blog-nexus-td blog-nexus-title-cell">{{ $blog->title }}</td>
                            <td class="blog-nexus-td">
                                <div class="blog-nexus-action-buttons">
                                    <button type="button" class="blog-nexus-edit-btn" 
                                            onclick="openEditModal({{ $blog->id }})">Edit</button>
                                    <button type="button" class="blog-nexus-delete-btn"
                                            onclick="openDeleteModal({{ $blog->id }})">Delete</button>
                                    <button type="button" class="blog-nexus-view-btn"
                                            onclick="openViewModal({{ $blog->id }})">View</button>
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
                <button type="button" class="blog-nexus-secondary-btn" 
                        onclick="closeModal('viewBlogModal')">Close</button>
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
                        <textarea class="blog-nexus-textarea" id="editContent" name="content" rows="8" required></textarea>
                    </div>
                </form>
            </div>
            <div class="blog-nexus-modal-footer">
                <button type="button" class="blog-nexus-primary-btn" onclick="submitEditForm()">Update Blog</button>
                <button type="button" class="blog-nexus-secondary-btn" 
                        onclick="closeModal('editBlogModal')">Cancel</button>
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
                <button type="button" class="blog-nexus-secondary-btn" 
                        onclick="closeModal('deleteBlogModal')">Cancel</button>
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
                    <p class="blog-nexus-card-excerpt">{{ \Illuminate\Support\Str::limit($blog->content, 120) }}</p>
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
    document.body.style.overflow = 'hidden'; // Prevent scrolling behind modal
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
    document.body.style.overflow = 'auto'; // Restore scrolling
}

// Close modal if user clicks outside of it
window.onclick = function(event) {
    const modals = document.getElementsByClassName('blog-nexus-modal');
    for (let i = 0; i < modals.length; i++) {
        if (event.target === modals[i]) {
            modals[i].style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
}

// View blog modal
function openViewModal(blogId) {
    // Show loading state
    document.getElementById('viewBlogTitle').innerText = 'Loading...';
    document.getElementById('viewBlogContent').innerText = '';
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
        document.getElementById('viewBlogContent').innerText = data.blog.content;
        document.getElementById('viewBlogDate').innerHTML = `<span class="blog-nexus-date-icon">📅</span> ${data.createdAt}`;
        
        if (data.imageUrl) {
            document.getElementById('viewBlogImage').innerHTML = 
                `<img src="${data.imageUrl}" alt="${data.blog.title}">`;
        } else {
            document.getElementById('viewBlogImage').innerHTML = '';
        }
    })
    .catch(error => {
        console.error('Error fetching blog data:', error);
        document.getElementById('viewBlogTitle').innerText = 'Error loading blog';
        document.getElementById('viewBlogContent').innerText = 'Failed to load blog content. Please try again later.';
    });
}

// Edit blog modal
function openEditModal(blogId) {
    // Show loading state
    document.getElementById('editTitle').value = '';
    document.getElementById('editContent').value = '';
    document.getElementById('editCurrentImage').innerHTML = '';
    document.getElementById('editBlogId').value = blogId;
    
    openModal('editBlogModal');
    
    // Fetch blog data using AJAX
    fetch(`/admin/blogs/${blogId}/`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('editTitle').value = data.blog.title;
        document.getElementById('editContent').value = data.blog.content;
        document.getElementById('editBlogForm').action = `/admin/blogs/${blogId}`;
        
        if (data.imageUrl) {
            document.getElementById('editCurrentImage').innerHTML = 
                `<img src="${data.imageUrl}" alt="Current image" class="blog-nexus-preview-img">
                 <p class="blog-nexus-image-caption">Current featured image</p>`;
        }
    })
    .catch(error => {
        console.error('Error fetching blog data for edit:', error);
        closeModal('editBlogModal');
        alert('Failed to load blog data for editing. Please try again later.');
    });
}

function submitEditForm() {
    document.getElementById('editBlogForm').submit();
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
            // Create success notification
            const notification = document.createElement('div');
            notification.className = 'blog-nexus-success-alert';
            notification.innerHTML = `<i class="blog-nexus-success-icon">✓</i> ${data.message}`;
            
            // Add to page and remove after delay
            document.querySelector('.blog-nexus-container').prepend(notification);
            
            // Close modal
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
        alert('Failed to delete blog. Please try again later.');
    });
}

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
</script>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
