<nav>
    <a class="logo">SpringBoard</a>
    <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
    <div class="nav-links">
        <a>Home</a>
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
</nav>

<div class="slider-menu" id="slider-menu">
    <span class="close-btn" onclick="toggleMenu()">&times;</span>
    <div class="nav-links">
        <a>Home</a>
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
