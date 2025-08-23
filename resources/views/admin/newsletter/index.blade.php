@extends('layouts.app')

@section('title', 'Newsletter Management - Top Outsourcing Partners Admin')
@section('meta_description', 'Newsletter management dashboard for Top Outsourcing Partners administrators.')
@section('robots', 'noindex, nofollow')

@section('content')
<div class="newsletter-container">
    <div class="newsletter-content">
        <div class="row">
            <div class="col-12">
                <div class="newsletter-admin-header">
                    <h1 class="page-title">📧 Newsletter Management</h1>
                    <p class="page-subtitle">Manage your newsletter subscribers and send notifications</p>
                </div>
            </div>
        </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-info">
                    <h3>{{ $totalSubscribers }}</h3>
                    <p>Total Subscribers</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card active">
                <div class="stat-icon">✅</div>
                <div class="stat-info">
                    <h3>{{ $activeSubscribers }}</h3>
                    <p>Active Subscribers</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon">❌</div>
                <div class="stat-info">
                    <h3>{{ $totalSubscribers - $activeSubscribers }}</h3>
                    <p>Unsubscribed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Test Newsletter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="test-newsletter-card">
                <h3>🧪 Send Test Newsletter</h3>
                <p>Send a newsletter notification for an existing blog post to all active subscribers.</p>
                
                <form action="{{ route('admin.newsletter.test') }}" method="POST" class="test-form">
                    @csrf
                    <div class="form-group">
                        <label for="blog_id">Select Blog Post:</label>
                        <select name="blog_id" id="blog_id" class="form-control" required>
                            <option value="">Choose a blog post...</option>
                            @foreach(App\Models\Blog::latest()->limit(20)->get() as $blog)
                                <option value="{{ $blog->id }}">
                                    {{ $blog->title }} ({{ $blog->formatted_type }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-test">
                        📤 Send Test Newsletter
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Subscribers List -->
    <div class="row">
        <div class="col-12">
            <div class="subscribers-card">
                <div class="card-header">
                    <h3>📋 Newsletter Subscribers</h3>
                    <div class="header-actions">
                        <span class="badge badge-info">{{ $subscribers->total() }} total</span>
                    </div>
                </div>

                <div class="subscribers-table">
                    @if($subscribers->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Subscribed Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>
                                        <div class="email-cell">
                                            <strong>{{ $subscriber->email }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        @if($subscriber->is_active)
                                            <span class="status-badge active">✅ Active</span>
                                        @else
                                            <span class="status-badge inactive">❌ Unsubscribed</span>
                                        @endif
                                    </td>
                                    <td>{{ $subscriber->formatted_subscribed_at }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            @if($subscriber->is_active)
                                                <button class="btn btn-sm btn-outline-secondary" disabled>
                                                    Active
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-outline-success" disabled>
                                                    Unsubscribed
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="pagination-wrapper">
                            {{ $subscribers->links() }}
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">📧</div>
                            <h4>No Subscribers Yet</h4>
                            <p>When people subscribe to your newsletter, they'll appear here.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Newsletter Container with Margins */
.newsletter-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.newsletter-content {
    width: 100%;
}

/* Enhanced row spacing */
.newsletter-container .row {
    margin-bottom: 2rem;
}

.newsletter-container .row:last-child {
    margin-bottom: 0;
}

/* Enhanced column spacing */
.newsletter-container .col-md-4 {
    margin-bottom: 1rem;
}

.newsletter-container .col-12 {
    margin-bottom: 1rem;
}

.newsletter-container .col-12:last-child {
    margin-bottom: 0;
}

.newsletter-admin-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem;
    border-radius: 12px;
    margin-bottom: 2rem;
    text-align: center;
}

.page-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0 auto;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
    border-left: 4px solid #e2e8f0;
    transition: all 0.3s ease;
}

.stat-card.active {
    border-left-color: #10b981;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    font-size: 2.5rem;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8fafc;
    border-radius: 50%;
}

.stat-info h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #1a202c;
    margin: 0;
}

.stat-info p {
    color: #64748b;
    margin: 0;
    font-weight: 500;
}

.test-newsletter-card {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-left: 4px solid #f59e0b;
    margin-bottom: 2rem;
}

.test-newsletter-card h3 {
    color: #1a202c;
    margin-bottom: 0.5rem;
}

.test-newsletter-card p {
    color: #64748b;
    margin-bottom: 1.5rem;
}

.test-form {
    display: flex;
    gap: 1rem;
    align-items: end;
}

.test-form .form-group {
    flex: 1;
    margin-bottom: 0;
}

.test-form label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.btn-test {
    background: linear-gradient(45deg, #f59e0b, #d97706);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.btn-test:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
}

.subscribers-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.card-header {
    background: #f8fafc;
    padding: 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    margin: 0;
    color: #1a202c;
}

.badge-info {
    background: #3b82f6;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.875rem;
}

.subscribers-table {
    padding: 0;
}

.table {
    margin: 0;
}

.table th {
    background: #f8fafc;
    color: #374151;
    font-weight: 600;
    border-bottom: 2px solid #e2e8f0;
    padding: 1rem;
}

.table td {
    padding: 1rem;
    vertical-align: middle;
}

.email-cell strong {
    color: #1a202c;
    font-weight: 600;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.875rem;
    font-weight: 500;
}

.status-badge.active {
    background: #dcfce7;
    color: #166534;
}

.status-badge.inactive {
    background: #fef2f2;
    color: #991b1b;
}

.pagination-wrapper {
    padding: 1.5rem;
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
}

.empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: #64748b;
}

.empty-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.empty-state h4 {
    color: #374151;
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .test-form {
        flex-direction: column;
        align-items: stretch;
    }
    
    .card-header {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
}

/* Responsive Margins */
@media (max-width: 1400px) {
    .newsletter-container {
        padding: 2rem 1.5rem;
    }
}

@media (max-width: 768px) {
    .newsletter-container {
        padding: 1.5rem 1rem;
    }
    
    .newsletter-admin-header {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    /* Reduce row spacing on mobile */
    .newsletter-container .row {
        margin-bottom: 1.5rem;
    }
    
    .newsletter-container .col-md-4 {
        margin-bottom: 1rem;
    }
}

@media (max-width: 480px) {
    .newsletter-container {
        padding: 1rem 0.5rem;
    }
    
    .newsletter-admin-header {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .page-title {
        font-size: 1.75rem;
    }
    
    /* Further reduce spacing on small screens */
    .newsletter-container .row {
        margin-bottom: 1rem;
    }
    
    .newsletter-container .col-md-4,
    .newsletter-container .col-12 {
        margin-bottom: 0.75rem;
    }
    
    .stat-card,
    .test-newsletter-card,
    .subscribers-card {
        margin-bottom: 1rem;
    }
}
</style>

<script>
// Show success message if there is one
@if(session('success'))
    alert('{{ session('success') }}');
@endif

@if(session('error'))
    alert('{{ session('error') }}');
@endif
</script>
@endsection
