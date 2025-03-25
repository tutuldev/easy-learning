<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- google front 1  --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_drop_down" />

        {{-- google fornt 2  --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @vite('resources/css/app.css')
        {{-- shiper js  --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    </head>
    <body class="font-sans antialiased">
       <section class="container mx-auto mt-2   flex ">
        <nav class="w-full">
            <div class="flex w-full justify-between">
                <div class="flex bg-amber-2000 items-center">
                    <div class="logo">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo" height="50px" width="60px">
                    </div>
                    <ul class="space-x-5 hidden 2xl:flex">
                        <li class="relative group">
                            Tutorials
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 3</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            Exercises
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 3</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            Certificates
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 3</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            Services
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option 3</a></li>
                            </ul>
                        </li>
                    </ul>
                    {{-- menu  --}}
                    <div class="menu  2xl:hidden">
                        <span class="material-icons cursor-pointer">menu</span>
                    </div>
                    <div class="relative ml-5">
                        <input type="text" placeholder="Search..."
                            class="w-48 xl:w-full h-10 px-4 pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
                        >
                        <button class="absolute inset-y-0 right-3 flex items-center">
                            <span class="material-icons text-gray-500 text-xl cursor-pointer">search</span>
                        </button>
                    </div>

                </div>
                <div class="action flex space-x-5 bg-green-2000 items-center">
                    <div class="dark mood ml-5">
                        <span class="material-icons cursor-pointer">brightness_6</span>
                    </div>
                    <ul class="hidden 2xl:flex space-x-5">
                        <li class="cursor-pointer flex items-center">
                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">credit_card</span> Plus
                            </a>
                        </li>
                        <li class="cursor-pointer flex items-center">
                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">code</span> Spaces
                            </a>
                        </li>
                        <li class="cursor-pointer flex items-center">

                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">school</span> For Teachers
                            </a>
                        </li>
                        <li class="cursor-pointer flex items-center">

                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">shopping_cart</span> Get Certified
                            </a>

                        </li>
                    </ul>
                    <div class="authentication  flex space-x-2">
                        <button class="py-2 px-8 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 cursor-pointer hidden sm:block">
                            Sign Up
                        </button>

                        <button class="py-2 px-8 bg-green-500 text-white font-semibold rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50 cursor-pointer">
                            Log in
                        </button>

                    </div>
                </div>
            </div>
        </nav>
       </section>
       <section class="bg-[#282A35]">
                   {{-- top bar  --}}
       {{-- swiper js start  --}}
   <div class="swiper container cursor-pointer  bg-[#282A35]">
    <div class="swiper-wrapper py-1">
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm ">HTML</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">CSS</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">JAVASCRIPT</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">SQL</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">PYTHON</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">JAVA</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">PHP</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">HOW TO</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">W3.CSS</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">C</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">C++</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">C#</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">BOOTSTRAP</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">REACT</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">MYSQL</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">JQUERY</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">EXCEL</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">XML</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">DJANGO</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">NUMPY</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">PANDAS</span></div>
        <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">NODEJS</span></div>
    </div>

         <!-- Add next and previous buttons -->
            {{-- <div class="absolute swiper-button-next "></div>
            <div class="absolute swiper-button-prev"></div> --}}
            <!-- Swiper Default Buttons (with Material Icons) -->
<div class="absolute swiper-button-prev !left-0 bg-black">
    <span class="material-icons text-white text-sm ">chevron_left</span>
</div>
<div class="absolute swiper-button-next !right-0 bg-black">
    <span class="material-icons text-white text-sm ">chevron_right</span>
</div>


           {{-- swiper js end --}}
    </div>
       </section>


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
        init: function () {
            updateNavButtons(this);
        },
        slideChange: function () {
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


