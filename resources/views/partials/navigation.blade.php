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
        <a href="{{ url('/') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 8px;" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Home</a>
        <a href="{{ url('/about') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 8px;" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">About us</a>
        <div class="services-dropdown">
            <a class="services-link" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 8px;" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Services</a>
            <div class="dropdown-menu" style="width: 900px;">
                <div class="dropdown-row">
                    <a href="{{ url('/services/finance') }}" style="font-size: 1rem; font-weight: bold; color: #000; transition: box-shadow 0.3s ease; border-radius: 8px;" onmouseover="this.style.boxShadow='0 0 15px rgba(0, 0, 0, 0.5)'" onmouseout="this.style.boxShadow='none'">
                        <img src="{{ asset('images/finance/finance.svg') }}" alt="Finance Icon" class="dropdown-icon">
                        Accounting & Finance Outsourcing
                    </a>
                    <a href="{{ url('/services/ai-integration') }}" style="font-size: 1rem; font-weight: bold; color: #000; transition: box-shadow 0.3s ease; border-radius: 8px;" onmouseover="this.style.boxShadow='0 0 15px rgba(0, 0, 0, 0.5)'" onmouseout="this.style.boxShadow='none'">
                        <img src="{{ asset('images/ai/ai-icon.svg') }}" alt="AI Icon" class="dropdown-icon">
                        AI Integration for Businesses
                    </a>
                    <a href="{{ url('/services/corporate-training') }}" style="font-size: 1rem; font-weight: bold; color: #000; transition: box-shadow 0.3s ease; border-radius: 8px;" onmouseover="this.style.boxShadow='0 0 15px rgba(0, 0, 0, 0.5)'" onmouseout="this.style.boxShadow='none'">
                        <img src="{{ asset('images/corporate/corporate.svg') }}" alt="Training Icon" class="dropdown-icon">
                        Corporate Training & Development
                    </a>
                </div>
                <div class="dropdown-row" style="justify-content: center; gap: 2rem;">
                    <a href="{{ url('/services/third-party') }}" style="font-size: 1rem; font-weight: bold; color: #000; transition: box-shadow 0.3s ease; border-radius: 8px; flex: 0 1 auto;" onmouseover="this.style.boxShadow='0 0 15px rgba(0, 0, 0, 0.5)'" onmouseout="this.style.boxShadow='none'">
                        <img src="{{ asset('images/third-party/third-party.svg') }}" alt="Support Icon" class="dropdown-icon">
                        Third-Party Business Support
                    </a>
                    <a href="{{ url('/services/hr-pay') }}" style="font-size: 1rem; font-weight: bold; color: #000; transition: box-shadow 0.3s ease; border-radius: 8px; flex: 0 1 auto;" onmouseover="this.style.boxShadow='0 0 15px rgba(0, 0, 0, 0.5)'" onmouseout="this.style.boxShadow='none'">
                        <img src="{{ asset('images/hr/hr.svg') }}" alt="Data Icon" class="dropdown-icon">
                        HR & Payroll Services
                    </a>
                </div>
            </div>
        </div>
        <a href="{{ url('/solutions') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px;" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Solutions</a>
        <a href="{{ url('/industries') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px;" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Industries</a>
        <a href="{{ url('/contact') }}" style="font-size: 1.2rem; font-weight: bold; color: #333; transition: box-shadow 0.3s ease; border-radius: 10px;" onmouseover="this.style.boxShadow='0 0 15px rgba(51, 51, 51, 0.5)'" onmouseout="this.style.boxShadow='none'">Contact Us</a>
    </div>
    <div class="social-links" style="font-size: 2rem; margin-top: 1rem;">
        <a href="https://www.facebook.com/RickAstley/" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://x.com/elonmusk" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.instagram.com/officialrickastley/" target="_blank" style="color: #007bff;"><i class="fa-brands fa-instagram"></i></a>
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

<div class="slider-menu" id="slider-menu">
    <span class="close-btn" onclick="toggleMenu()">&times;</span>
    <div class="nav-links">
        <a href="{{ url('/') }}" style="font-size: 1.2rem; font-weight: bold;">Home</a>
        <a href="{{ url('/about') }}" style="font-size: 1.2rem; font-weight: bold;">About us</a>
        <div class="services-mobile-dropdown">
            <a class="services-link" onclick="toggleServicesMenu()" style="font-size: 1.2rem; font-weight: bold; color: #007bff; cursor: pointer;">Services</a>
            <div class="mobile-dropdown-menu" id="mobile-services-menu" style="display: none; background-color: #f8f9fa; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <a href="{{ url('/services/finance') }}" style="display: block; margin-bottom: 0.5rem; font-size: 1rem; color: #000; font-weight: bold;">Accounting & Finance Outsourcing</a>
                <a href="{{ url('/services/ai-integration') }}" style="display: block; margin-bottom: 0.5rem; font-size: 1rem; color: #000; font-weight: bold;">AI Integration for Businesses</a>
                <a href="{{ url('/services/corporate-training') }}" style="display: block; margin-bottom: 0.5rem; font-size: 1rem; color: #000; font-weight: bold;">Corporate Training & Development</a>
                <a href="{{ url('/services/third-party') }}" style="display: block; margin-bottom: 0.5rem; font-size: 1rem; color: #000; font-weight: bold;">Third-Party Business Support</a>
                <a href="{{ url('/services/hr-pay') }}" style="display: block; margin-bottom: 0.5rem; font-size: 1rem; color: #000; font-weight: bold;">HR & Payroll Services</a>
            </div>
        </div>

        <script>
            function toggleServicesMenu() {
                var menu = document.getElementById('mobile-services-menu');
                if (menu.style.display === 'none' || menu.style.display === '') {
                    menu.style.display = 'block';
                } else {
                    menu.style.display = 'none';
                }
            }
        </script>
        <a href="{{ url('/industries') }}" style="font-size: 1.2rem; font-weight: bold;">Industries</a>
        <a href="{{ url('/solutions') }}" style="font-size: 1.2rem; font-weight: bold;">Solutions</a>
        <a href="{{ url('/contact') }}" style="font-size: 1.2rem; font-weight: bold;">Contact Us</a>
    </div>
    <div class="social-links" style="font-size: 2rem; margin-top: 1rem;">
        <a href="https://www.facebook.com/RickAstley/" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://x.com/elonmusk" target="_blank" style="margin-right: 1rem; color: #007bff;"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.instagram.com/officialrickastley/" target="_blank" style="color: #007bff;"><i class="fa-brands fa-instagram"></i></a>
    </div>
</div>

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
