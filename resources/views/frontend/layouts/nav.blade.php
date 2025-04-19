 {{-- nav bar start --}}
 <nav class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
    <nav class="w-full container mx-auto  flex ">
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
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                    1</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                    2</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                    3</a></li>
                        </ul>
                    </li>
                    <li class="relative group">
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
                    <li class="relative group">
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
                    <li class="relative group">
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
                <div class="menu  2xl:hidden">
                    <span class="material-symbols-outlined text-2xl text-gray-700 cursor-pointer hover:text-blue-500 transition">menu</span>

                </div>
                <div class="relative ml-5">
                    <input type="text" placeholder="Search..."
                        class="w-48 xl:w-full h-10 px-4 pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                    <button class="absolute inset-y-0 right-3 flex items-center">
                        <span class="material-symbols-outlined text-gray-500 text-xl cursor-pointer">search</span>
                    </button>
                </div>

            </div>
            <div class="action flex space-x-5 bg-green-2000 items-center">
                <div class="dark mood ml-5">
                    <span class="material-symbols-outlined cursor-pointer">brightness_6</span>
                </div>
                <ul class="hidden 2xl:flex space-x-5">
                    <li class="cursor-pointer flex items-center">
                        <a href="#" class="flex items-center">
                            <span class="material-symbols-outlined mr-2">credit_card</span>
                             Plus
                        </a>
                    </li>
                    <li class="cursor-pointer flex items-center">
                        <a href="#" class="flex items-center">
                            <span class="material-symbols-outlined mr-2">code</span>
                            Spaces
                        </a>
                    </li>
                    <li class="cursor-pointer flex items-center">

                        <a href="#" class="flex items-center">
                            <span class="material-symbols-outlined mr-2">school</span>
                             For Teachers
                        </a>
                    </li>
                    <li class="cursor-pointer flex items-center">

                        <a href="#" class="flex items-center">
                            <span class="material-symbols-outlined mr-2">shopping_cart</span>
                             Get Certified
                        </a>

                    </li>
                </ul>
                <div class="authentication">
                    <div class="hidden space-x-2 sm:flex">
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
                                <button
                                    type="submit"
                                    class="py-2 px-8 bg-red-500 text-white font-semibold rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50 cursor-pointer">
                                    Log out
                                </button>
                            </form>
                        @endguest
                    </div>

                    <div class="sm:hidden block mx-5">
                        <span class="material-symbols-outlined text-2xl text-gray-700 cursor-pointer hover:text-blue-500 transition">person</span>

                    </div>

                </div>
            </div>
        </div>
    </nav>
</nav>
{{-- nav bar end --}}
