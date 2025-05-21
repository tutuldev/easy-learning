 {{-- nav bar start --}}
 <nav class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
     <nav class="w-full max-w-screen-2xl mx-auto  flex ">
         <div class="flex w-full justify-between">
             <div class="flex bg-amber-2000 items-center">
                 <div class="logo">
                     <img src="{{ asset('image/logo.png') }}" alt="Logo" height="50px" width="60px">
                 </div>
                 <ul class="space-x-3 2xl:space-x-5 md:flex hidden ">
                     <li class="relative group hover:text-green-500">
                         Tutorials
                         <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                         <!-- Dropdown -->
                         <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     1</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     2</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     3</a></li>
                         </ul>
                     </li>
                     <li class="relative group hover:text-green-500 hidden 2xl:block ">
                         Exercises
                         <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                         <!-- Dropdown -->
                         <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     1</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     2</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     3</a></li>
                         </ul>
                     </li>
                     <li class="relative group hover:text-green-500 hidden xl:block">
                         Certificates
                         <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                         <!-- Dropdown -->
                         <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     1</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     2</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     3</a></li>
                         </ul>
                     </li>
                     <li class="relative group hover:text-green-500">
                         Services
                         <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                         <!-- Dropdown -->
                         <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     1</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     2</a></li>
                             <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                     3</a></li>
                         </ul>
                     </li>
                 </ul>
                 {{-- menu  --}}
                 <!-- Mobile Menu Dropdown -->
                 <div class="relative md:hidden block mr-5">
                     <button onclick="toggleMenuDropdown()"
                         class="flex items-center space-x-1 text-gray-700 hover:text-green-500 transition">
                         <span>Menu</span>
                         <span class="material-symbols-outlined">arrow_drop_down</span>
                     </button>

                     <ul id="menuDropdown"
                         class="absolute left-0 mt-2 hidden min-w-[14rem] bg-white shadow-lg rounded-md z-[999] animate-slide-in-left">

                         <!-- Tutorials -->
                         <li class="group relative">
                             <a href="#"
                                 class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 text-gray-800">
                                 <div class="flex items-center gap-2">
                                     <span class="material-symbols-outlined">menu_book</span>
                                     Tutorials
                                 </div>
                                 <span
                                     class="material-symbols-outlined group-hover:rotate-180 transition">expand_more</span>
                             </a>
                             <ul
                                 class="hidden group-hover:block absolute left-full top-0 bg-white shadow-md rounded min-w-[12rem] z-[999]">
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">HTML</a></li>
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">CSS</a></li>
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">JavaScript</a></li>
                             </ul>
                         </li>

                         <!-- Exercises -->
                         <li class="group relative">
                             <a href="#"
                                 class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 text-gray-800">
                                 <div class="flex items-center gap-2">
                                     <span class="material-symbols-outlined">fitness_center</span>
                                     Exercises
                                 </div>
                                 <span
                                     class="material-symbols-outlined group-hover:rotate-180 transition">expand_more</span>
                             </a>
                             <ul
                                 class="hidden group-hover:block absolute left-full top-0 bg-white shadow-md rounded min-w-[12rem] z-[999]">
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">HTML</a></li>
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">CSS</a></li>
                             </ul>
                         </li>

                         <!-- Certificates -->
                         <li class="group relative">
                             <a href="#"
                                 class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 text-gray-800">
                                 <div class="flex items-center gap-2">
                                     <span class="material-symbols-outlined">workspace_premium</span>
                                     Certificates
                                 </div>
                                 <span
                                     class="material-symbols-outlined group-hover:rotate-180 transition">expand_more</span>
                             </a>
                             <ul
                                 class="hidden group-hover:block absolute left-full top-0 bg-white shadow-md rounded min-w-[12rem] z-[999]">
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Frontend</a></li>
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Backend</a></li>
                             </ul>
                         </li>

                         <!-- Services -->
                         <li class="group relative">
                             <a href="#"
                                 class="flex items-center justify-between px-4 py-2 hover:bg-gray-100 text-gray-800">
                                 <div class="flex items-center gap-2">
                                     <span class="material-symbols-outlined">handshake</span>
                                     Services
                                 </div>
                                 <span
                                     class="material-symbols-outlined group-hover:rotate-180 transition">expand_more</span>
                             </a>
                             <ul
                                 class="hidden group-hover:block absolute left-full top-0 bg-white shadow-md rounded min-w-[12rem] z-[999]">
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Consulting</a></li>
                                 <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Support</a></li>
                             </ul>
                         </li>

                         <!-- Others (without submenus) -->
                         <li><a href="#"
                                 class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-gray-800"><span
                                     class="material-symbols-outlined">workspace_premium</span> Plus</a></li>
                         <li><a href="#"
                                 class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-gray-800"><span
                                     class="material-symbols-outlined">hub</span> Spaces</a></li>
                         <li><a href="#"
                                 class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-gray-800"><span
                                     class="material-symbols-outlined">school</span> For Teachers</a></li>
                         <li><a href="#"
                                 class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 text-gray-800"><span
                                     class="material-symbols-outlined">military_tech</span> Get Certified</a></li>
                     </ul>
                 </div>


             </div>
               <div class="flex items-center">
               <div class="relative sm:ml-5">
            <!-- সার্চ ইনপুট -->
            <input type="text" id="searchInput"
                placeholder="Search..."
                class="w-48 xl:w-full h-10 px-4 pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500" />

            <!-- সার্চ বাটন -->
            <button class="absolute inset-y-0 right-3 flex items-center">
                <span class="material-symbols-outlined text-gray-500 text-xl cursor-pointer">search</span>
            </button>

            <!-- রেজাল্ট ড্রপডাউন -->
            <div id="searchDropdown"
                class="absolute w-full mt-2 bg-white border border-gray-300 rounded-md shadow-md z-50 max-h-[300px] overflow-y-auto hidden">
                <!-- রেজাল্ট এখানে যাবে -->
            </div>
        </div>

                 {{-- dark mood  --}}
                 <div class="dark mood ml-5 mt-2">
                     <span class="material-symbols-outlined cursor-pointer hover:text-green-500">brightness_6</span>
                 </div>
             </div>

             <div class="action flex space-x-2 2xl:space-x-4 bg-green-2000 items-center">
                 <ul class="flex space-x-3 2xl:space-x-5 ">
                     <li class="cursor-pointer hidden items-center hover:text-green-500 2xl:flex">
                         <a href="#" class="flex items-center">
                             <span class="material-symbols-outlined">workspace_premium</span>
                             Plus
                         </a>
                     </li>
                     <li class="cursor-pointer hidden items-center hover:text-green-500 2xl:flex">
                         <a href="#" class="flex items-center ">
                             <span class="material-symbols-outlined mr-2">code</span>
                             Spaces
                         </a>
                     </li>
                     <li class="cursor-pointer hidden items-center hover:text-green-500 xl:flex">

                         <a href="#" class="flex items-center">
                             <span class="material-symbols-outlined mr-2">school</span>
                             For Teachers
                         </a>
                     </li>
                     <li class="cursor-pointer hidden items-center hover:text-green-500 lg:flex">

                         <a href="#" class="flex items-center">
                             <span class="material-symbols-outlined mr-2">shopping_cart</span>
                             Get Certified
                         </a>

                     </li>
                 </ul>
                 <div class="authentication pr-5">
                     <div class="hidden space-x-2 md:flex">
                         @guest
                             <!-- Sign Up Button -->
                             <a href="{{ route('register') }}">
                                 <button
                                     class="py-2 px-8 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 cursor-pointer hidden sm:block">
                                     Sign Up
                                 </button>
                             </a>

                             <!-- Log In Button -->
                             <a href="{{ route('login') }}">
                                 <button
                                     class="py-2 px-8 bg-green-500 text-white font-semibold rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50 cursor-pointer">
                                     Log in
                                 </button>
                             </a>
                         @else
                             <!-- Log Out Button -->
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <button type="submit"
                                     class="py-2 px-8 bg-red-500 text-white font-semibold rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50 cursor-pointer">
                                     Log out
                                 </button>
                             </form>
                         @endguest
                     </div>

                     <!-- Person Dropdown (Mobile) -->
                     <div class="relative md:hidden block ">
                         <button onclick="togglePersonDropdown()"
                             class="flex items-center space-x-1 text-gray-700 hover:text-green-500 transition">
                             <span class="material-symbols-outlined text-2xl">person</span>
                         </button>
                         <ul id="personDropdown"
                             class="absolute right-0 mt-3 hidden min-w-[10rem] bg-white shadow-lg rounded-md overflow-hidden z-50">
                             <li><a href="{{ route('profile.edit') }}"
                                     class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                             </li>
                             <li><a href="#"
                                     class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Settings</a></li>

                             @guest
                                 <!-- If the user is NOT authenticated -->
                                 <li>
                                     <a href="{{ route('login') }}"
                                         class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Login</a>
                                 </li>
                                 <li>
                                     <a href="{{ route('register') }}"
                                         class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Signup</a>
                                 </li>
                             @else
                                 <!-- If the user IS authenticated -->
                                 <li>
                                     <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                         <button type="submit"
                                             class="w-full text-left block px-4 py-2 text-gray-800 hover:bg-gray-200">
                                             Logout
                                         </button>
                                     </form>
                                 </li>
                             @endguest



                         </ul>
                     </div>



                 </div>
             </div>

         </div>
     </nav>
 </nav>
 @push('scripts')
     <script>
         // user or persoon toggle
         function togglePersonDropdown() {
             const dropdown = document.getElementById('personDropdown');
             dropdown.classList.toggle('hidden');
         }

         // Optional: Outside click করলে dropdown বন্ধ
         document.addEventListener('click', function(e) {
             const dropdown = document.getElementById('personDropdown');
             const button = e.target.closest('button');
             const insideDropdown = e.target.closest('#personDropdown');

             if (!button && !insideDropdown) {
                 dropdown.classList.add('hidden');
             }
         });
         //  for menu
         function toggleMenuDropdown() {
             const dropdown = document.getElementById('menuDropdown');
             dropdown.classList.toggle('hidden');
         }

         document.addEventListener('click', function(e) {
             const menuDropdown = document.getElementById('menuDropdown');
             const clickedInsideMenu = e.target.closest('#menuDropdown') || e.target.closest(
                 '[onclick="toggleMenuDropdown()"]');
             if (!clickedInsideMenu) menuDropdown.classList.add('hidden');
         });
         //  toggle refresh when resize
         window.addEventListener('resize', function() {
             const personDropdown = document.getElementById('personDropdown');
             const menuDropdown = document.getElementById('menuDropdown');

             if (personDropdown) personDropdown.classList.add('hidden');
             if (menuDropdown) menuDropdown.classList.add('hidden');
         });

        //  search start

const input = document.getElementById('searchInput');
const resultBox = document.getElementById('searchDropdown');

input.addEventListener('input', function () {
    const query = this.value.trim();

    if (query.length === 0) {
        resultBox.innerHTML = '';
        resultBox.classList.add('hidden');
        return;
    }

    fetch(`/search?q=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            let html = '';

            if (data.topics.length === 0 && data.frameworks.length === 0) {
                html = `<div class="px-4 py-2 text-gray-500">No Result Found</div>`;
            } else {
                data.topics.forEach(item => {
                    html += `<a href="/posts/topic/${item.name}"
                        class="block px-4 py-2 hover:bg-green-100 text-sm text-gray-800">
                        ${item.name} Tutorial <span class="text-xs text-gray-400">(Topic)</span>
                    </a>`;
                });

                data.frameworks.forEach(item => {
                    html += `<a href="/posts/framework/${item.name}"
                        class="block px-4 py-2 hover:bg-green-100 text-sm text-gray-800">
                        ${item.name} Tutorial<span class="text-xs text-gray-400">(Framework)</span>
                    </a>`;
                });
            }

            resultBox.innerHTML = html;
            resultBox.classList.remove('hidden');
        });
});

// ইনপুট বা ড্রপডাউনের বাইরে ক্লিক করলে লুকিয়ে যাবে
document.addEventListener('click', function (e) {
    if (!input.contains(e.target) && !resultBox.contains(e.target)) {
        resultBox.classList.add('hidden');
    }
});
        //  search end
     </script>
 @endpush

 {{-- nav bar end --}}
