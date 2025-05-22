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
    {{-- heighlight  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/github-dark.min.css">

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

    <!-- Footer -->
     @include('frontend.layouts.footer')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
     {{-- highliter js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>

    @stack('scripts')
    {{-- highliter js  --}}
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            hljs.highlightAll(); // Initialize syntax highlighting
        });
    </script>
    {{-- highliter js  end--}}


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

            // for layout
      function updateSidebarHeight() {
      const footer = document.querySelector('footer');
      const sidebar = document.querySelector('#sidebar');
      const footerRect = footer.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      // Calculate overlap height if the footer is in the viewport
      const overlapHeight = footerRect.top < windowHeight && footerRect.top > 0
        ? Math.max(windowHeight - footerRect.top, 0)
        : 0;

      // Update the custom property for dynamic height adjustment
      document.documentElement.style.setProperty('--overlap-height', `${overlapHeight}px`);
    }

    // Attach scroll and resize event listeners
    window.addEventListener('scroll', updateSidebarHeight);
    window.addEventListener('resize', updateSidebarHeight);

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', updateSidebarHeight);
        // end layout js


        // for menu
        const btn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');

        // Toggle sidebar on button click
        btn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent click from bubbling to document
            sidebar.classList.toggle('-translate-x-full');
        });

        // Click outside to close sidebar
        document.addEventListener('click', function(e) {
            const isClickInsideSidebar = sidebar.contains(e.target);
            const isClickOnButton = btn.contains(e.target);

            if (!isClickInsideSidebar && !isClickOnButton) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Dropdown toggler
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const icon = document.getElementById(`${id}-icon`);
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // sidebar close by cross button
        function hideSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
        }




    </script>
</body>

</html>
