@extends('layouts.app')

@section('title', 'Login - Top Outsourcing Partners Admin')
@section('meta_description', 'Login to Top Outsourcing Partners admin dashboard to manage your business outsourcing services and content.')
@section('robots', 'noindex, nofollow')

@section('content')
<div class="quantum-auth-container">
    <div class="cosmic-background">
        <div class="floating-orb orb-1"></div>
        <div class="floating-orb orb-2"></div>
        <div class="floating-orb orb-3"></div>
    </div>
    
    <div class="auth-glass-panel login-variant">
        <div class="panel-header">
            <div class="cosmic-logo">
                <i class="fas fa-space-shuttle"></i>
            </div>
            <h2 class="stellar-title">Welcome Back</h2>
            <p class="cosmic-subtitle">Continue your journey</p>
        </div>
        
        <!-- Session Messages -->
        @if(session('success'))
            <div class="success-constellation">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('info'))
            <div class="info-constellation">
                <i class="fas fa-info-circle"></i>
                {{ session('info') }}
            </div>
        @endif
        
        <div class="quantum-form-container">
            <form method="POST" action="{{ route('login') }}" class="stellar-form">
                @csrf
                
                <div class="input-constellation">
                    <div class="cosmic-input-wrapper">
                        <i class="fas fa-envelope input-star"></i>
                        <input type="email" id="email" name="email" class="quantum-input @error('email') input-error @enderror" value="{{ old('email') }}" placeholder=" " required autofocus>
                        <label for="email" class="floating-label">Email Address</label>
                        <div class="input-aurora"></div>
                    </div>
                    @error('email')
                        <div class="error-nebula">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="input-constellation">
                    <div class="cosmic-input-wrapper password-galaxy">
                        <i class="fas fa-lock input-star"></i>
                        <input type="password" id="password" name="password" class="quantum-input @error('password') input-error @enderror" placeholder=" " required>
                        <label for="password" class="floating-label">Password</label>
                        <div class="visibility-toggle" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye-slash" id="password-icon"></i>
                        </div>
                        <div class="input-aurora"></div>
                    </div>
                    @error('password')
                        <div class="error-nebula">
                            <i class="fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button type="submit" class="cosmic-submit-btn">
                    <span class="btn-text">Enter Portal</span>
                    <span class="btn-glow"></span>
                    <i class="fas fa-sign-in-alt btn-icon"></i>
                </button>
            </form>
        </div>
        
        <div class="portal-footer">
            <div class="connection-bridge">
                <span>New explorer?</span>
                <a href="{{ route('signup') }}" class="portal-link">
                    Create Account <i class="fas fa-user-plus"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const passwordIcon = document.getElementById('password-icon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordIcon.className = 'fas fa-eye';
        } else {
            passwordField.type = 'password';
            passwordIcon.className = 'fas fa-eye-slash';
        }
    }
</script>

<style>
    .quantum-auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        overflow: hidden;
        padding: 2rem;
    }

    .cosmic-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .floating-orb {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
        backdrop-filter: blur(10px);
        animation: float 6s ease-in-out infinite;
    }

    .orb-1 {
        width: 300px;
        height: 300px;
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .orb-2 {
        width: 200px;
        height: 200px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }

    .orb-3 {
        width: 150px;
        height: 150px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(10deg); }
    }

    .auth-glass-panel {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(30px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 24px;
        padding: 3rem;
        width: 100%;
        max-width: 420px;
        position: relative;
        z-index: 10;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .auth-glass-panel:hover {
        transform: translateY(-5px);
    }

    .panel-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .cosmic-logo {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #4ecdc4, #45b7d1);
        border-radius: 50%;
        margin-bottom: 1rem;
        animation: pulse 2s infinite;
    }

    .cosmic-logo i {
        font-size: 2rem;
        color: white;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(78, 205, 196, 0.4); }
        70% { box-shadow: 0 0 0 20px rgba(78, 205, 196, 0); }
        100% { box-shadow: 0 0 0 0 rgba(78, 205, 196, 0); }
    }

    .stellar-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
    }

    .cosmic-subtitle {
        color: rgba(255, 255, 255, 0.8);
        margin: 0.5rem 0 0 0;
        font-size: 1.1rem;
    }

    .input-constellation {
        margin-bottom: 2rem;
    }

    .cosmic-input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-star {
        position: absolute;
        left: 1rem;
        color: rgba(255, 255, 255, 0.6);
        z-index: 2;
        font-size: 1.1rem;
        transition: color 0.3s ease;
    }

    .quantum-input {
        width: 100%;
        padding: 1.2rem 1rem 1.2rem 3rem !important;
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .quantum-input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }

    .quantum-input:focus + .floating-label,
    .quantum-input:not(:placeholder-shown) + .floating-label {
        transform: translateY(-2.5rem) scale(0.85);
        color: #4ecdc4;
    }

    .quantum-input:focus ~ .input-aurora {
        opacity: 1;
        animation: aurora 2s ease-in-out infinite;
    }

    .input-error {
        border-color: rgba(239, 68, 68, 0.5) !important;
        background: rgba(239, 68, 68, 0.05) !important;
    }

    .error-nebula {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(239, 68, 68, 0.1);
        padding: 0.5rem;
        border-radius: 8px;
        border-left: 3px solid #ef4444;
    }

    .success-constellation {
        color: #10b981;
        font-size: 0.875rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(16, 185, 129, 0.1);
        padding: 0.75rem;
        border-radius: 8px;
        border-left: 3px solid #10b981;
        backdrop-filter: blur(10px);
    }

    .info-constellation {
        color: #3b82f6;
        font-size: 0.875rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(59, 130, 246, 0.1);
        padding: 0.75rem;
        border-radius: 8px;
        border-left: 3px solid #3b82f6;
        backdrop-filter: blur(10px);
    }

    .floating-label {
        position: absolute;
        left: 3rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
        pointer-events: none;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        background: transparent;
        padding: 0 0.5rem;
    }

    .input-aurora {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #4ecdc4, #45b7d1, #667eea);
        border-radius: 1px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    @keyframes aurora {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .password-galaxy .visibility-toggle {
        position: absolute;
        right: 1rem;
        cursor: pointer;
        color: rgba(255, 255, 255, 0.6);
        font-size: 1.1rem;
        transition: color 0.3s ease;
        z-index: 2;
    }

    .visibility-toggle:hover {
        color: #4ecdc4;
    }

    .cosmic-submit-btn {
        width: 100%;
        padding: 1.2rem;
        background: linear-gradient(135deg, #4ecdc4, #45b7d1);
        border: none;
        border-radius: 16px;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        margin: 1rem 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .cosmic-submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .btn-glow {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s ease;
    }

    .cosmic-submit-btn:hover .btn-glow {
        left: 100%;
    }

    .btn-icon {
        transition: transform 0.3s ease;
    }

    .cosmic-submit-btn:hover .btn-icon {
        transform: translateX(5px);
    }

    .portal-footer {
        text-align: center;
        margin-top: 2rem;
    }

    .connection-bridge {
        color: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .portal-link {
        color: #4ecdc4;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .portal-link:hover {
        color: #45b7d1;
        transform: translateX(3px);
    }

    @media (max-width: 768px) {
        .quantum-auth-container {
            padding: 1rem;
        }
        
        .auth-glass-panel {
            padding: 2rem;
            max-width: 100%;
        }
        
        .stellar-title {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('footer')
    @include('components.footer') 
@endsection
