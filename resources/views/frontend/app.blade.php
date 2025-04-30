<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Easy Learning')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- google front  --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
    {{-- shiper js  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class="font-sans antialiased">
    <header>
        {{-- nav bar start --}}
        @include('frontend.layouts.nav')
        {{-- nav bar end --}}

        {{-- top bar start --}}
        @include('frontend.layouts.topbar')
        {{-- top bar end  --}}
    </header>

    @yield('content')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: "auto",
            spaceBetween: 10,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                init: function() {
                    updateNavButtons(this);
                },
                slideChange: function() {
                    updateNavButtons(this);
                }
            }
        });

        function updateNavButtons(swiper) {
            let prevBtn = document.querySelector(".swiper-button-prev");
            let nextBtn = document.querySelector(".swiper-button-next");

            // প্রথমে থাকলে "Previous" বাটন পুরোপুরি লুকিয়ে দিন
            if (swiper.isBeginning) {
                prevBtn.classList.add("hidden");
            } else {
                prevBtn.classList.remove("hidden");
            }

            // শেষ হলে "Next" বাটন পুরোপুরি লুকিয়ে দিন
            if (swiper.isEnd) {
                nextBtn.classList.add("hidden");
            } else {
                nextBtn.classList.remove("hidden");
            }
        }
    </script>
</body>

</html>
