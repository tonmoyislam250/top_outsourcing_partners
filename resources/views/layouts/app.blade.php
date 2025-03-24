<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>SpringBoard</title>
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

</head>
<body>
    <div id="splash-screen">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading...">
    </div>

    <div id="main-content" style="display: none;">
        @include('partials.navigation')
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
                }, 1000); // Match this timeout with the CSS transition duration
            }, 3000); 
        });
    </script>
</body>
</html>
