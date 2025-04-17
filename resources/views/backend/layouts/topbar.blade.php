    <header class="flex justify-between items-center  bg-white p-4 shadow-md fixed top-0 left-0 right-0 z-30 container mx-auto">
    <div class="flex items-center space-x-4">
        <button id="menu-btn" class="text-gray-600 md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <a href="/dashboard" class="text-xl font-semibold cursor-pointer">Dashboard</a>
    </div>

    @include('backend.layouts.profile')
  </header>
