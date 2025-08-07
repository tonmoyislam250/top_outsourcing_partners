<nav class="sticky-nav">
    <head>
        <!-- Add Animate.css -->
        <link rel="stylesheet" href="{{ asset('css/default/animate.min.css') }}" />
    </head>
    <div class="menu-icon" onclick="toggleMenu()" style="display: none;">&#9776;</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function checkMobileLayout() {
                var menuIcon = document.querySelector('.menu-icon');
                if (window.innerWidth <= 768) {
                    menuIcon.style.display = 'block';
                } else {
                    menuIcon.style.display = 'none';
                }
            }

            checkMobileLayout();
            window.addEventListener('resize', checkMobileLayout);
        });
    </script>
    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo">
    </a>
    <div class="nav-links">
        <a href="{{ url('/') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 8px; {{ request()->is('/') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Home</a>
        <a href="{{ url('/about') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 8px; {{ request()->is('about') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">About Us</a>
        <a href="{{ url('/services') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 8px; {{ request()->is('services') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Services</a>
        <a href="{{ url('/solutions') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px; {{ request()->is('solutions') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Solutions</a>
        <a href="{{ url('/industries') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px; {{ request()->is('industries') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Industries</a>
        <a href="{{ url('/contact') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px; {{ request()->is('contact') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Contact Us</a>
        <a href="{{ url('/blogs') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px; {{ request()->is('blogs') ? 'box-shadow: 0 0 15px rgba(51, 51, 51, 0.5);' : '' }}" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Resources</a>
    </div>
    <div class="social-links" style="font-size: 2rem; margin-top: 1rem;">
        <a href="https://www.facebook.com/profile.php?id=61576043437938" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://x.com/topoutsourcingp" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/topoutsourcingpartners" target="_blank" style="color: #007bff;"><i class="fa-brands fa-linkedin"></i></a>
    </div>
</nav>

<style>
    /* Sticky navigation styles */
    .sticky-nav {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    /* Add a little padding to prevent content from jumping when nav becomes sticky */
    body {
        padding-top: 0;
    }
    
    @media (max-width: 768px) {
        .sticky-nav {
            position: relative;
        }
    }
</style>

<div class="slider-menu animate__animated animate__slideInRight animate__faster" id="slider-menu">
    <span class="close-btn animate__animated animate__fadeIn" onclick="toggleMenu()">&times;</span>
    <div class="company-name animate__animated animate__fadeIn animate__delay-1s">
        <i>Top Outsourcing Partners</i>
    </div>
    <div class="nav-links">
        <a href="{{ url('/') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('/') ? 'color: #007bff;' : '' }}">Home</a>
        <a href="{{ url('/about') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('about') ? 'color: #007bff;' : '' }}">About Us</a>
        <a href="{{ url('/services') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('services') ? 'color: #007bff;' : '' }}">Services</a>
        <a href="{{ url('/industries') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('industries') ? 'color: #007bff;' : '' }}">Industries</a>
        <a href="{{ url('/solutions') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('solutions') ? 'color: #007bff;' : '' }}">Solutions</a>
        <a href="{{ url('/contact') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('contact') ? 'color: #007bff;' : '' }}">Contact Us</a>
        <a href="{{ url('/blogs') }}" class="animate__animated animate__fadeInRight animate__faster animate__delay-1s" style="font-size: 1.2rem; font-weight: bold; {{ request()->is('blogs') ? 'color: #007bff;' : '' }}">Resources</a>
    </div>
    <div class="social-links animate__animated animate__fadeInUp animate__faster animate__delay-2s" style="font-size: 2rem; margin-top: 1rem;">
        <a href="https://www.facebook.com/profile.php?id=61576043437938" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://x.com/topoutsourcingp" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/topoutsourcingpartners" target="_blank" style="color: #007bff;"><i class="fa-brands fa-linkedin"></i></a>
    </div>
</div>

<style>
    .company-name {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
        color: #007bff;
        font-weight: bold;
    }
</style>

<script>
    function toggleMenu() {
        var sliderMenu = document.getElementById('slider-menu');
        if (sliderMenu.classList.contains('open')) {
            sliderMenu.classList.remove('open');
        } else {
            sliderMenu.classList.add('open');
        }
    }
</script>

<style>
    .services-dropdown {
        position: relative;
    }

    .services-link {
        cursor: pointer;
    }

    .dropdown-menu {
        display: none; /* Initially hidden */
        flex-direction: column;
        gap: 1rem;
        position: absolute;
        top: 100%;
        left: -350px;
        background-color: #fff; /* Keep white background */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Stronger shadow for thicker appearance */
        border-radius: 0.5rem;
        padding: 1rem 1.5rem; /* Increased padding for thicker appearance */
        z-index: 1000;
        border: 2px solid #f0f0f0; /* Adding border for thicker appearance */
        width: 920px; /* Slightly wider to accommodate thicker styling */
        margin-top: 10px; /* Add some space between menu and link */
    }

    /* Add a pseudo-element to bridge the gap between menu item and dropdown */
    .services-dropdown::after {
        content: '';
        display: block;
        height: 15px;
        width: 100%;
        position: absolute;
        top: 100%;
        left: 0;
    }

    .services-dropdown:hover .dropdown-menu {
        display: flex; /* Show menu on hover */
        animation: fadeIn 0.5s; /* Changed to a popup animation */
        transform-origin: top center; /* Sets the origin point for the transform */
        animation: zoomIn 0.3s;
    }

    .dropdown-row {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
    }

    .dropdown-menu a {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0;
        text-decoration: none;
        color: #000;
        font-size: 0.9rem; /* Decreased text size */
        transition: color 0.3s ease;
    }

    .dropdown-menu a:hover {
        color: #007bff;
    }

    .dropdown-icon {
        width: 30px;
        height: 30px;
    }
</style>
