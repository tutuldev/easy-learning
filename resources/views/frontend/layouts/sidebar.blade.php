<!-- Sidebar Wrapper -->
<div class="md:w-64">
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-28 md:left-auto left-0 z-20 w-64 bg-white shadow-md overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0">

        <!-- Close Button (Mobile only) -->
        <div class="absolute top-1 right-4 z-50 md:hidden">
            <button onclick="hideSidebar()"
                class="rounded-full bg-gray-100 hover:bg-gray-300 text-gray-700 hover:text-black shadow-md transition w-12 h-12 p-2">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>
        </div>

        <!-- Sidebar Content -->
        <div class="py-2 space-y-1 pr-1">
            <!-- Dashboard -->
            <a href="/dashboard"
               class="block py-2.5 px-4 rounded {{ Request::is('dashboard') ? 'bg-green-600 text-white' : 'hover:bg-gray-300' }}">
                Dashboard
            </a>

            <!-- Front Page -->
            <a href="/" class="block">
                <div class="flex justify-between items-center py-2.5 px-4 rounded {{ Request::is('/') ? 'bg-green-600 text-white' : 'hover:bg-gray-300' }} cursor-pointer">
                    <span>Front Page</span>
                    <span class="material-symbols-outlined text-sm">home</span>
                </div>
            </a>

         
            <!-- Settings -->
            <a href="/settings"
               class="flex justify-between items-center w-full py-2.5 px-4 rounded {{ Request::is('settings') ? 'bg-green-600 text-white' : 'hover:bg-gray-300' }}">
                Settings
                <span class="material-symbols-outlined text-sm">settings</span>
            </a>

        </div>
    </aside>
</div>
