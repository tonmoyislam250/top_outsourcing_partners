<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h2><a href="{{ url('/') }}" style="text-decoration: none; color: inherit; text-align:left;">Top <br>OutSourcing <br>Partners</a></h2>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=61576043437938" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://x.com/topoutsourcingp" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/topoutsourcingpartners/" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="footer-section" style="text-align: left; margin-left: 186px; @media (max-width: 768px) { margin-left: 20px; }">
            <ul style="text-align: left;">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About us</a></li>
            <li><a href="{{ url('/services') }}" onclick="event.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' });">Services</a></li>
            <li><a href="{{ url('/solutions') }}">Solutions</a></li>
            <li><a href="{{ url('/industries') }}">Industries</a></li>
            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3 style="text-align: left;"><strong>Contact</strong></h3>
            <!-- <p style="color: white; text-align: left;">Head Office: SEL Trident Tower, Dhaka 1000<br> Other Offices: Green Road (Dhaka)|Chittagong|Khulna<br>USA Office: 801 Travis Street, Suite 2101, Houston, TX 77002</p> -->
            <p style="color: white; text-align: left; margin-bottom: 0px;">Phone: +1 346 777 4586</p>
            <p style="color: white; text-align: left;">Email: <a href="mailto:info@topoutsourcingpartners.com" style="color: white;">contact@topoutsourcingpartners.com</a></p>
            <div style="text-align: left;">
                <a href="{{ url('/consult') }}" class="footer-button" style="font-size: smaller;">Get in touch</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p style="font-size: small; color: #ccc;">Copyright © 2025 Top Outsourcing Partners, All Rights Reserved</p>
            <ul class="footer-links">
            <li><a href="{{ url('/privacy-policy') }}" style="color: #ccc;">Privacy Policy</a></li>
            <li><a href="{{ url('/breach') }}" style="color: #ccc;">Breach Policy</a></li>
            <li><a href="{{ url('/retention') }}" style="color: #ccc;">Retention & Deletion</a></li>
            </ul>
        </div>
    </div>
</footer>

<style>
/* Style for the footer bottom section */
.footer-bottom {
    background-color: #333; /* dark gray */
    padding: 10px 20px;
    font-size: 14px;
    color: black;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
}

.footer-bottom-content p {
    margin: 0;
    flex: 1;
    text-align: left;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
    flex: 1;
    justify-content: flex-end;
}

.footer-links li {
    display: inline;
    text-align: left;
}

.footer-links li a {
    color: #666;
    text-decoration: none;
}

.footer-links li a:hover {
    text-decoration: underline;
}
</style>
