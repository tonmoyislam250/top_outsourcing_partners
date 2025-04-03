<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Top Outsourcing Partners</title>
    <style>
        /* Splash screen styles */
        #splash-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 1s ease-out;
        }
        #splash-screen img {
            width: 100px; /* Adjust the size as needed */
            height: 100px; /* Adjust the size as needed */
        }
        .fade-out {
            opacity: 0;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/finance.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manager.css') }}">
    <link rel="stylesheet" href="{{ asset('css/out.css') }}">
    <!-- Animate.css Library -->
    <link rel="stylesheet" href="{{asset('css/default/animate.min.css')}}" />

</head>
<body>
    <div id="splash-screen">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading...">
    </div>

    <div id="main-content" style="display: none;">
        @include('partials.navigation')
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
        @yield('footer')
    </div>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var splashScreen = document.getElementById('splash-screen');
                splashScreen.classList.add('fade-out');
                setTimeout(function() {
                    splashScreen.style.display = 'none';
                    document.getElementById('main-content').style.display = 'block';
                }, 500); // Match this timeout with the CSS transition duration
            }, 400); 
        });

        // Add observe-me class to elements you want to animate on scroll
        const animatedElements = document.querySelectorAll('.section-title, .service-card, .story-card, .reason-card');
        
        animatedElements.forEach(el => {
            el.classList.add('observe-me');
            // Remove initial animation classes and add them when scrolled into view
            if (el.classList.contains('animate__animated')) {
                const animationClass = Array.from(el.classList).find(cls => cls.startsWith('animate__') && cls !== 'animate__animated');
                if (animationClass) {
                    el.classList.remove(animationClass);
                    el.setAttribute('data-animation', animationClass);
                }
            }
        });
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const animationClass = entry.target.getAttribute('data-animation');
                    if (animationClass) {
                        entry.target.classList.add(animationClass);
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.observe-me').forEach(el => {
            observer.observe(el);
        });
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
