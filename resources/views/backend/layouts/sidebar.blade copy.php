<!-- Sidebar -->
<aside id="sidebar" class="borderr border-red-300 bg-white min-w-64 mt-16  px-2  fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out shadow-md z-20">

    <!-- Fixed Close Button (only on mobile) -->
    <div class="absolute top-1 right-4 z-50 md:hidden">
        <button onclick="hideSidebar()" class="rounded-full bg-gray-100 hover:bg-gray-300 text-gray-700 hover:text-black shadow-md transition w-12 h-12 p-2">
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>
    </div>



    {{-- top nav bar --}}
    <div class="py-2 space-y-1 overflow-y-auto h-[calc(100vh-4rem)] pr-1 ">

        <a href="/dashboard" class="block py-2.5 px-4 rounded hover:hover:bg-gray-300  {{ Request::is('dashboard') ? 'bg-green-600 text-white' : '' }}">
            Dashboard
        </a>
        <!-- Home Page Link -->
        <a href="/" class="block">
            <div class="flex justify-between items-center py-2.5 px-4 rounded hover:bg-gray-300 cursor-pointer">
                <span>Front Page</span>
                <span class="material-symbols-outlined text-sm">home</span>
            </div>
        </a>


        <!-- Categories Dropdown -->
        <div>
            <button class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:hover:bg-gray-300 {{ Route::is('categories.index') || Request::is('categories*') ? 'bg-green-600 text-white' : '' }}" onclick="toggleDropdown('dropdown1')">
                <span>Categories</span>
                <svg class="w-4 h-4 transform transition-transform" id="dropdown1-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdown1" class="ml-6 mt-1 hidden space-y-1">
                @foreach($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">
                    {{ $category->name }}
                </a>
                @endforeach
                <a href="{{ route('categories.index') }}" class="flex items-center justify-between py-2 px-4 text-sm rounded hover:bg-gray-200 {{ Route::is('categories.index') ? 'bg-gray-300' : '' }}">
                    All Categories
                    <span class="material-symbols-outlined text-sm">category</span>
                </a>
            </div>
        </div>

        <!-- Languages Dropdown -->
        <div>
            <button class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:hover:bg-gray-300 {{ Route::is('languages.index') || Request::is('languages*') ? 'bg-green-600 text-white' : '' }}" onclick="toggleDropdown('dropdown2')">
                <span>Languages</span>
                <svg class="w-4 h-4 transform transition-transform" id="dropdown2-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdown2" class="ml-6 mt-1 hidden space-y-1">
                @foreach($languages as $language)
                <a href="{{ route('languages.show', $language) }}" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">
                    {{ $language->name }}
                </a>
                @endforeach
                <a href="{{ route('languages.index') }}" class="flex items-center justify-between py-2 px-4 text-sm rounded hover:bg-gray-200 {{ Route::is('languages.index') ? 'bg-gray-300' : '' }}">
                    All Languages
                    <span class="material-symbols-outlined text-sm">frame_source</span>
                </a>
            </div>
        </div>

        <!-- Frameworks Dropdown -->
        <div>
            <button class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:hover:bg-gray-300 {{ Route::is('frameworks.index') || Request::is('frameworks*') ? 'bg-green-600 text-white' : '' }}" onclick="toggleDropdown('dropdown3')">
                <span>Frameworks</span>
                <svg class="w-4 h-4 transform transition-transform" id="dropdown3-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdown3" class="ml-6 mt-1 hidden space-y-1">
                @foreach($frameworks as $framework)
                <a href="{{ route('frameworks.show', $framework) }}" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">
                    {{ $framework->name }}
                </a>
                @endforeach
                <a href="{{ route('frameworks.index') }}" class="flex items-center justify-between py-2 px-4 text-sm rounded hover:bg-gray-200 {{ Route::is('frameworks.index') ? 'bg-gray-300' : '' }}">
                    All Frameworks
                    <span class="material-symbols-outlined text-sm">integration_instructions</span>
                </a>
            </div>
        </div>

        <!-- Settings Link -->
        <a href="/settings" class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:hover:bg-gray-300 {{ Request::is('settings') ? 'bg-green-600 text-white' : '' }}">
            Settings
            <span class="material-symbols-outlined text-sm">settings</span>
        </a>
    </div>
</aside>
