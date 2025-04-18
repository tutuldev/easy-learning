<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- google front 1  --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')

     {{-- swiper js  --}}
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


</head>
<body class="bg-gray-100 ">
   <!-- Fixed Top Navbar -->
   @include('backend.layouts.topbar')
    <div class="flex h-screen  container mx-auto ">

    <!-- Sidebar -->
    @include('backend.layouts.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex min-w-0 ">

        <!-- Content -->
        <main class="md:pl-4 overflow-y-auto h-screen w-full">
        {{-- fixed nav bar  --}}
        @include('backend.layouts.fixednav')

        @yield('content')
        </main>
      </div>
    </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- Initialize Swiper -->
    <!-- Scripts -->
    <script>
const btn = document.getElementById('menu-btn');
const sidebar = document.getElementById('sidebar');

// Toggle sidebar on button click
btn.addEventListener('click', (e) => {
    e.stopPropagation(); // Prevent click from bubbling to document
    sidebar.classList.toggle('-translate-x-full');
});

// Click outside to close sidebar
document.addEventListener('click', function (e) {
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


    // Profile dropdown toggle
const profileBtn = document.getElementById('profile-btn');
const profileDropdown = document.getElementById('profile-dropdown');
const profileIcon = document.getElementById('profile-icon');

profileBtn.addEventListener('click', (e) => {
  e.stopPropagation(); // Prevent click from bubbling to document
  profileDropdown.classList.toggle('hidden');
  profileIcon.classList.toggle('rotate-180');
});

// Hide dropdown on outside click
document.addEventListener('click', (e) => {
  const isClickInside = profileDropdown.contains(e.target) || profileBtn.contains(e.target);
  if (!isClickInside) {
    profileDropdown.classList.add('hidden');
    profileIcon.classList.remove('rotate-180');
  }
});

    //   <!-- Initialize Swiper -->
    //   for swiper js and fixed Navbar
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
