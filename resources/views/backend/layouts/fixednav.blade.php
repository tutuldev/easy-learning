
<div class="bg-[#261F1E]">
    <div class="swiper container  cursor-pointer z-30">
        <div class="swiper-wrapper py-2  ">

            @foreach($topics as $topic)
            <div class="swiper-slide !w-auto">
            <a href="{{ route('admin.posts.topic', $topic->name) }}" class="px-4 py-3 whitespace-nowrap text-sm  {{ Request::is('admin/posts/topic/' . $topic->name) ? 'bg-green-600 text-white' : 'hover:bg-black text-white' }} ">{{ $topic->name }} </a>
            </div>
            @endforeach
            @foreach($frameworks as $framework)
            <div class="swiper-slide !w-auto">
            <a href="{{ route('admin.posts.framework', $framework->name) }}" class="px-4 py-3 whitespace-nowrap text-sm  {{ Request::is('admin/posts/framework/' . $framework->name) ? 'bg-green-600 text-white' : 'hover:bg-black text-white' }} ">{{ $framework->name }} </a>
            </div>
            @endforeach

        </div>

        <div class="absolute swiper-button-prev !left-0 bg-black">
            <span class="material-symbols-outlined text-white text-sm">chevron_left</span>
        </div>
        <div class="absolute swiper-button-next !right-0 bg-black">
            <span class="material-symbols-outlined text-white text-sm">chevron_right</span>
        </div>
    </div>
</div>
