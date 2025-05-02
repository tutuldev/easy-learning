<!-- Sidebar Wrapper -->
<div class="md:w-64">
    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-28 md:left-auto left-0 z-20 w-64 bg-white shadow-md overflow-y-auto transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0">

        <!-- Sidebar Content -->
        <div class="py-2 space-y-1 pr-1">

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
