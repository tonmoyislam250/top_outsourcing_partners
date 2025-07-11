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

    <!-- Blog Management Form -->
    <div class="blog-nexus-form-container">
        <div class="blog-nexus-form-header">
            <h3 class="blog-nexus-form-title">{{ isset($blog) ? 'Edit Blog Post' : 'Create New Blog' }}</h3>
        </div>
        <div class="blog-nexus-form-body">
            @if(isset($blog))
                <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data" class="blog-nexus-form">
                @method('PUT')
            @else
                <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="blog-nexus-form">
            @endif
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
                    @if(isset($blog))
                        <a href="{{ route('admin.blogs.index') }}" class="blog-nexus-secondary-btn">Cancel</a>
                    @endif
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
    <!-- Guest User Authentication -->
    <div class="blog-nexus-auth-section">
        <div class="blog-nexus-auth-card">
            <h3 class="blog-nexus-auth-title">Join Our Community</h3>
            <p class="blog-nexus-auth-subtitle">Login to manage blogs or sign up to get started</p>
            <div class="blog-nexus-auth-buttons">
                <a href="{{ route('login') }}" class="blog-nexus-login-btn">Login</a>
                <a href="{{ route('signup') }}" class="blog-nexus-signup-btn">Sign Up</a>
            </div>
        </div>
    </div>

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

<style>
.blog-nexus-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.blog-nexus-hero-section {
    text-align: center;
    margin-bottom: 3rem;
    padding: 3rem 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    color: white;
    position: relative;
    overflow: hidden;
}

.blog-nexus-hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
}

.blog-nexus-main-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
    position: relative;
    z-index: 1;
}

.blog-nexus-admin-badge {
    background: rgba(255,255,255,0.2);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    margin-right: 0.5rem;
}

.blog-nexus-highlight {
    background: linear-gradient(45deg, #ff6b6b, #ffa726);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.blog-nexus-success-alert {
    background: linear-gradient(45deg, #4caf50, #81c784);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    box-shadow: 0 4px 20px rgba(76, 175, 80, 0.3);
}

.blog-nexus-success-icon {
    margin-right: 0.5rem;
    font-weight: bold;
}

.blog-nexus-admin-controls {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 2rem;
}

.blog-nexus-logout-btn {
    background: linear-gradient(45deg, #ff4757, #ff6b7a);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.blog-nexus-logout-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 71, 87, 0.4);
}

.blog-nexus-form-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    margin-bottom: 3rem;
    overflow: hidden;
}

.blog-nexus-form-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem 2rem;
}

.blog-nexus-form-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.blog-nexus-form-body {
    padding: 2rem;
}

.blog-nexus-input-group {
    margin-bottom: 1.5rem;
}

.blog-nexus-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #2d3748;
}

.blog-nexus-input,
.blog-nexus-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8fafc;
}

.blog-nexus-input:focus,
.blog-nexus-textarea:focus {
    outline: none;
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.blog-nexus-file-upload {
    position: relative;
}

.blog-nexus-file-input {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.blog-nexus-file-label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.blog-nexus-file-label:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.blog-nexus-current-image {
    margin-top: 1rem;
}

.blog-nexus-preview-img {
    max-width: 200px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.blog-nexus-image-caption {
    color: #64748b;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.blog-nexus-form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.blog-nexus-primary-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

.blog-nexus-primary-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.blog-nexus-secondary-btn {
    background: #e2e8f0;
    color: #4a5568;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.blog-nexus-secondary-btn:hover {
    background: #cbd5e0;
    transform: translateY(-2px);
}

.blog-nexus-management-panel {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    overflow: hidden;
}

.blog-nexus-panel-header {
    background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
    color: white;
    padding: 1.5rem 2rem;
}

.blog-nexus-panel-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.blog-nexus-table-container {
    overflow-x: auto;
}

.blog-nexus-table {
    width: 100%;
    border-collapse: collapse;
}

.blog-nexus-table-head {
    background: #f8fafc;
}

.blog-nexus-th {
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: #2d3748;
    border-bottom: 2px solid #e2e8f0;
}

.blog-nexus-table-row:hover {
    background: #f8fafc;
}

.blog-nexus-td {
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
}

.blog-nexus-table-img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
}

.blog-nexus-no-image {
    width: 50px;
    height: 50px;
    background: #e2e8f0;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #a0aec0;
}

.blog-nexus-title-cell {
    font-weight: 600;
    color: #2d3748;
}

.blog-nexus-action-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.blog-nexus-edit-btn,
.blog-nexus-view-btn {
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.blog-nexus-edit-btn {
    background: #ffa726;
    color: white;
}

.blog-nexus-edit-btn:hover {
    background: #ff9800;
}

.blog-nexus-view-btn {
    background: #667eea;
    color: white;
}

.blog-nexus-view-btn:hover {
    background: #5a67d8;
}

.blog-nexus-delete-form {
    display: inline;
}

.blog-nexus-delete-btn {
    background: #ff4757;
    color: white;
    border: none;
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.blog-nexus-delete-btn:hover {
    background: #ff3742;
}

.blog-nexus-auth-section {
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
}

.blog-nexus-auth-card {
    background: white;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    text-align: center;
    max-width: 400px;
}

.blog-nexus-auth-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.blog-nexus-auth-subtitle {
    color: #64748b;
    margin-bottom: 1.5rem;
}

.blog-nexus-auth-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.blog-nexus-login-btn,
.blog-nexus-signup-btn {
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.blog-nexus-login-btn {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
}

.blog-nexus-login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.blog-nexus-signup-btn {
    background: transparent;
    border: 2px solid #667eea;
    color: #667eea;
}

.blog-nexus-signup-btn:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

.blog-nexus-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.blog-nexus-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    position: relative;
}

.blog-nexus-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.blog-nexus-card-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.blog-nexus-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.blog-nexus-card:hover .blog-nexus-img {
    transform: scale(1.05);
}

.blog-nexus-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.blog-nexus-card:hover .blog-nexus-image-overlay {
    opacity: 1;
}

.blog-nexus-card-content {
    padding: 1.5rem;
}

.blog-nexus-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.blog-nexus-card-excerpt {
    color: #64748b;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.blog-nexus-read-more {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.blog-nexus-read-more:hover {
    color: #5a67d8;
    transform: translateX(5px);
}

.blog-nexus-arrow {
    transition: transform 0.3s ease;
}

.blog-nexus-read-more:hover .blog-nexus-arrow {
    transform: translateX(5px);
}

.blog-nexus-card-footer {
    padding: 1rem 1.5rem;
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
}

.blog-nexus-date-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #64748b;
    font-size: 0.875rem;
}

.blog-nexus-hero-logout-form {
    position: absolute;
    top: 1rem;
    right: 1rem;
}

/* Modal Styles */
.blog-nexus-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
    animation: fadeIn 0.3s ease;
}

.blog-nexus-modal-content {
    background-color: white;
    margin: 10vh auto;
    width: 80%;
    max-width: 800px;
    border-radius: 20px;
    box-shadow: 0 10px 50px rgba(0,0,0,0.3);
    animation: slideIn 0.3s ease;
    display: flex;
    flex-direction: column;
    max-height: 80vh;
}

.blog-nexus-modal-small {
    max-width: 500px;
}

.blog-nexus-modal-large {
    max-width: 900px;
}

.blog-nexus-modal-header {
    padding: 1.5rem 2rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px 20px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blog-nexus-modal-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.blog-nexus-modal-close {
    color: white;
    font-size: 1.75rem;
    cursor: pointer;
    line-height: 1;
}

.blog-nexus-modal-close:hover {
    opacity: 0.8;
}

.blog-nexus-modal-body {
    padding: 2rem;
    overflow-y: auto;
}

.blog-nexus-modal-image {
    margin-bottom: 1.5rem;
}

.blog-nexus-modal-image img {
    max-width: 100%;
    max-height: 300px;
    border-radius: 12px;
    object-fit: cover;
}

.blog-nexus-modal-date {
    display: flex;
    align-items: center;
    color: #64748b;
    font-size: 0.875rem;
    margin-bottom: 1.5rem;
}

.blog-nexus-modal-text {
    color: #2d3748;
    line-height: 1.8;
    white-space: pre-line;
}

.blog-nexus-modal-message {
    color: #2d3748;
    text-align: center;
    font-size: 1.1rem;
    margin: 1rem 0;
}

.blog-nexus-modal-footer {
    padding: 1.5rem 2rem;
    border-top: 1px solid #e2e8f0;
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { transform: translateY(-50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@media (max-width: 768px) {
    .blog-nexus-container {
        padding: 1rem;
    }
    
    .blog-nexus-main-title {
        font-size: 2rem;
    }
    
    .blog-nexus-gallery {
        grid-template-columns: 1fr;
    }
    
    .blog-nexus-auth-buttons {
        flex-direction: column;
    }
    
    .blog-nexus-action-buttons {
        flex-direction: column;
    }
}


</style>

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
