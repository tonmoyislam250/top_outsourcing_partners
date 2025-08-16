<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="Obtv3mmaGnLncwwV1CCtglU1C2NN61qR3Hl6cN2jL7A" />
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0X7BVWG21V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-0X7BVWG21V');
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MNHR9CMF');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Top Outsourcing Partners</title>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/default/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/default/swiper-bundle.min.css') }}"> <!-- Swiper styles -->
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solutions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/industries.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all_policies.css') }}">
    <link rel="stylesheet" href="{{ asset('css/finance.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schedule-consultation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/manager.css') }}">
    <link rel="stylesheet" href="{{ asset('css/out.css') }}">
    <link rel="stylesheet" href="{{ asset('css/team.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blogs.css') }}">
    <!-- Animate.css Library -->
    <link rel="stylesheet" href="{{asset('css/default/animate.min.css')}}" />
    <!-- TinyMCE Rich Text Editor -->
    <script src="https://cdn.tiny.cloud/1/si1oqrkmp8u8g75rhq9vf6hz3vdegcww6rkzb9iakkz3t5ss/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNHR9CMF"
            height="0" width="0" style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
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
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.observe-me').forEach(el => {
            observer.observe(el);
        });
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>