<nav>
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
        <a href="{{ url('/') }}">Home</a>
        <a>About us</a>
        <div class="services-dropdown">
            <a>Services</a>
            <div class="dropdown-menu">
                <div class="dropdown-row">
                    <a href="{{ url('/services/finance') }}">
                        <img src="{{ asset('images/finance/finance.svg') }}" alt="Finance Icon" class="dropdown-icon">
                        Accounting & Finance Outsourcing
                    </a>
                    <a href="{{ url('/services/ai-integration') }}">
                        <img src="{{ asset('images/ai/ai-.svg') }}" alt="AI Icon" class="dropdown-icon">
                        AI Integration for Businesses
                    </a>
                    <a href="{{ url('/corporate-training') }}">
                        <img src="{{ asset('images/icons/training.svg') }}" alt="Training Icon" class="dropdown-icon">
                        Corporate Training & Development
                    </a>
                </div>
                <div class="dropdown-row">
                    <a href="{{ url('/business-support') }}">
                        <img src="{{ asset('images/icons/support.svg') }}" alt="Support Icon" class="dropdown-icon">
                        Third-Party Business Support
                    </a>
                    <a href="{{ url('/data-entry') }}">
                        <img src="{{ asset('images/icons/data.svg') }}" alt="Data Icon" class="dropdown-icon">
                        Data Entry & Administrative Support
                    </a>
                    <a href="{{ url('/employee-training') }}">
                        <img src="{{ asset('images/icons/employee.svg') }}" alt="Employee Icon" class="dropdown-icon">
                        Employee Training Services
                    </a>
                </div>
            </div>
        </div>
        <a>Resources</a>
        <a>Industries</a>
        <a href="{{ url('/contact') }}">Contact Us</a>
    </div>
    <div class="social-links">
        <a><i class="fa-brands fa-facebook"></i></a>
        <a><i class="fa-brands fa-twitter"></i></a>
        <a><i class="fa-brands fa-instagram"></i></a>
    </div>
</nav>

<div class="slider-menu" id="slider-menu">
    <span class="close-btn" onclick="toggleMenu()">&times;</span>
    <div class="nav-links">
        <a href="{{ url('/') }}">Home</a>
        <a>About us</a>
        <a>Services</a>
        <a>Resources</a>
        <a>Help</a>
        <a>Contact Us</a>
    </div>
    <div class="social-links">
        <a><i class="fa-brands fa-facebook"></i></a>
        <a><i class="fa-brands fa-twitter"></i></a>
        <a><i class="fa-brands fa-instagram"></i></a>
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

    .dropdown-menu {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        z-index: 1000;
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .dropdown-row {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
    }

    .services-dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-menu a {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0;
        text-decoration: none;
        color: #000;
        transition: color 0.3s ease;
    }

    .dropdown-menu a:hover {
        color: #007bff;
    }

    .dropdown-icon {
        width: 20px;
        height: 20px;
    }
</style>
