<!-- Sidebar Wrapper -->
<div class="md:w-64">
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-[92px] md:left-auto left-0 z-20 w-64 bg-white shadow-md overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0">

                <!-- Close Button (Mobile only) -->
                <div class="absolute top-1 right-4 z-50 md:hidden">
                    <button onclick="hideSidebar()"
                        class="rounded-full bg-gray-100 hover:bg-gray-300 text-gray-700 hover:text-black shadow-md transition w-12 h-12 p-2">
                        <span class="material-symbols-outlined text-2xl">close</span>
                    </button>
                </div>

        <!-- Sidebar Content -->
        <div class="py-2 space-y-1 ">

            {{-- Home Button --}}
            <a href="{{ Request::is('posts/framework/*') ? url('posts/framework/' . $pageTitle) : url('posts/topic/' . $pageTitle) }}"
            class="block py-2.5 px-4 rounded {{ (Request::is('posts/topic/' . $pageTitle) || Request::is('posts/framework/' . $pageTitle)) ? 'bg-green-600 text-white' : 'hover:bg-gray-300' }}">
            {{$pageTitle}}  Home
        </a>

            {{-- Posts List --}}
            @if (isset($posts) && count($posts))
                @foreach ($posts as $item)
                    <a href="{{ isset($context) && $context === 'framework'
                        ? route('posts.framework.show', [$item->framework->name, $item->slug])
                        : route('posts.topic.show', [$item->topic->name, $item->slug]) }}"
                        class="block py-2.5 px-4 rounded
                    {{ Request::is('posts/topic/*/' . $item->slug) || Request::is('posts/framework/*/' . $item->slug)
                        ? 'bg-green-600 text-white'
                        : 'hover:bg-gray-300' }} truncate">
                        {{ $item->title }}
                    </a>
                @endforeach
            @endif

        </div>
    </aside>
</div>
