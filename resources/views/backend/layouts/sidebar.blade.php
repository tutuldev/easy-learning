<!-- Sidebar Wrapper -->
<div class="md:w-64">
    <!-- Sidebar -->
    <aside id="sidebar-dash"
        class="fixed top-[100px] md:left-auto left-0 z-20 w-64 bg-gray-100 shadow-md overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0">

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

            <!-- Dropdown Menu Section -->
            @php
                $menus = [
                    ['title' => 'Categories', 'id' => 'dropdown1', 'items' => $categories, 'route' => 'categories'],
                    ['title' => 'Topics & Language', 'id' => 'dropdown2', 'items' => $topics, 'route' => 'topics'],
                    ['title' => 'Frameworks', 'id' => 'dropdown3', 'items' => $frameworks, 'route' => 'frameworks'],
                    ['title' => 'Structers', 'id' => 'dropdown4', 'items' => $structers, 'route' => 'structers'],
                    ['title' => 'Posts', 'id' => 'dropdown5', 'items' => $posts->take(5), 'route' => 'posts'], // Posts limited to 5
                ];
            @endphp

            @foreach($menus as $menu)
                @php
                    $isMenuActive = Request::is($menu['route']) || Request::is($menu['route'].'/*');
                @endphp

                <div>
                    <!-- Parent Button -->
                    <button
                        class="flex justify-between items-center w-full py-2.5 px-4 rounded {{ $isMenuActive ? 'bg-green-600 text-white' : 'hover:bg-gray-300' }}"
                        onclick="toggleDropdown('{{ $menu['id'] }}')">
                        <span>{{ $menu['title'] }}</span>
                        <svg class="w-4 h-4 transform transition-transform {{ $isMenuActive ? 'rotate-180' : '' }}"
                             id="{{ $menu['id'] }}-icon"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Child Links -->
                    <div id="{{ $menu['id'] }}" class="ml-6 mt-1 {{ $isMenuActive ? '' : 'hidden' }} space-y-1">
                        @foreach($menu['items'] as $item)
                            @php
                                $slug = $item->slug;
                                $isChildActive = Request::is($menu['route'].'/'.$slug);
                            @endphp
                            <a href="{{ route($menu['route'].'.show', $slug) }}"
                               class="block py-2 px-4 text-sm rounded {{ $isChildActive ? 'bg-gray-300' : 'hover:bg-gray-200' }}">
                                {{ $menu['route'] === 'posts' ? $item->title : $item->name }}
                            </a>
                        @endforeach

                        <a href="{{ route($menu['route'].'.index') }}"
                           class="flex items-center justify-between py-2 px-4 text-sm rounded hover:bg-gray-200">
                            All {{ $menu['title'] }}
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
            @endforeach

            <!-- Settings -->
            <a href="/settings"
               class="flex justify-between items-center w-full py-2.5 px-4 rounded {{ Request::is('settings') ? 'bg-green-600 text-white' : 'hover:bg-gray-300' }}">
                Settings
                <span class="material-symbols-outlined text-sm">settings</span>
            </a>

        </div>
    </aside>
</div>
