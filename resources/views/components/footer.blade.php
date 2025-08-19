<footer class="footer">
    <div class="footer-container">
        <div class="footer-section footer-logo">
            <a class="logo" href="{{ url('/') }}">
            <img src="{{ asset('images/logo_white.webp') }}" alt="Logo">
        </a>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=61576043437938" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/topoutsourcingp" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/topoutsourcingpartners/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <div class="footer-section footer-links-list">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about-us') }}">About us</a></li>
                <li><a href="{{ url('/services') }}" onclick="event.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' });">Services</a></li>
                <li><a href="{{ url('/solutions') }}">Solutions</a></li>
                <li><a href="{{ url('/industries') }}">Industries</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-section footer-contact">
            <h4>Contact</h4>
            <p>Address: 801 Travis Street, Suite 2101, Houston, Texas 77002, USA</p>
            <p>Phone: +13467774586</p>
            <p>Email: <a href="mailto:contact@TopOutsourcingPartners.com">contact@TopOutsourcingPartners.com</a></p>
            <a href="{{ url('/consult') }}" class="footer-button">Get in touch</a>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>Copyright © 2025 <a href="{{ url('/') }}">Top Outsourcing Partners</a>, All Rights Reserved</p>
            <ul class="footer-links">
                <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="{{ url('/breach') }}">Breach Policy</a></li>
                <li><a href="{{ url('/retention') }}">Retention & Deletion</a></li>
            </ul>
        </div>
    </div>
</footer>
