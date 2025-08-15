<nav class="sticky-nav">
    <div class="container">
        {{-- Mobile Menu Icon (Hamburger) --}}
        <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>

        {{-- Logo --}}
        <a class="logo" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo">
        </a>

        {{-- Desktop Navigation Links --}}
        <div class="nav-links">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/about-us') }}" class="{{ request()->is('about') ? 'active' : '' }}">About Us</a>
            <a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}">Services</a>
            <a href="{{ url('/solutions') }}" class="{{ request()->is('solutions') ? 'active' : '' }}">Solutions</a>
            <a href="{{ url('/industries') }}" class="{{ request()->is('industries') ? 'active' : '' }}">Industries</a>
            <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact Us</a>
            <a href="{{ url('/blogs') }}" class="{{ request()->is('blogs') ? 'active' : '' }}">Resources</a>
        </div>

        {{-- Desktop Social Links --}}
        <div class="social-links">
            <a href="https://www.facebook.com/profile.php?id=61576043437938" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://x.com/topoutsourcingp" target="_blank" aria-label="Twitter/X"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.linkedin.com/company/topoutsourcingpartners" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
    </div>
</nav>

{{-- Mobile Slide Menu --}}
<div class="slider-menu" id="slider-menu" aria-hidden="true" role="dialog" aria-label="Mobile menu">
    <span class="close-btn" role="button" aria-label="Close menu" onclick="toggleMenu()">
        <i class="fa-solid fa-xmark"></i>
    </span>

    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo">
    </a>

    <div class="nav-links">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}" onclick="toggleMenu()">Home</a>
        <a href="{{ url('/about-us') }}" class="{{ request()->is('about') ? 'active' : '' }}" onclick="toggleMenu()">About Us</a>
        <a href="{{ url('/services') }}" class="{{ request()->is('services') ? 'active' : '' }}" onclick="toggleMenu()">Services</a>
        <a href="{{ url('/solutions') }}" class="{{ request()->is('solutions') ? 'active' : '' }}" onclick="toggleMenu()">Solutions</a>
        <a href="{{ url('/industries') }}" class="{{ request()->is('industries') ? 'active' : '' }}" onclick="toggleMenu()">Industries</a>
        <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}" onclick="toggleMenu()">Contact Us</a>
        <a href="{{ url('/blogs') }}" class="{{ request()->is('blogs') ? 'active' : '' }}" onclick="toggleMenu()">Resources</a>
    </div>

    <div class="social-links">
        <a href="https://www.facebook.com/profile.php?id=61576043437938" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://x.com/topoutsourcingp" target="_blank" aria-label="Twitter/X"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/topoutsourcingpartners" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
</div>

{{-- JavaScript --}}
<script>
    function toggleMenu() {
        const menu = document.getElementById('slider-menu');
        const isOpen = menu.classList.toggle('open');
        // Toggle aria-hidden for accessibility
        menu.setAttribute('aria-hidden', !isOpen);
    }

    document.addEventListener('DOMContentLoaded', function() {
        function checkMobileLayout() {
            const menuIcon = document.querySelector('.menu-icon');
            const navLinks = document.querySelector('.sticky-nav .nav-links');
            if (window.innerWidth <= 1200) {
                menuIcon.style.display = 'block';
                navLinks.style.display = 'none';
            } else {
                menuIcon.style.display = 'none';
                navLinks.style.display = 'flex';
                // Make sure slider menu is closed if resizing larger
                const slider = document.getElementById('slider-menu');
                slider.classList.remove('open');
                slider.setAttribute('aria-hidden', true);
            }
        }
        checkMobileLayout();
        window.addEventListener('resize', checkMobileLayout);
    });
</script>


