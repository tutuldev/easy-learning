
<div class="bg-[#261F1E]">
    <div class="swiper container  cursor-pointer z-30">
        <div class="swiper-wrapper py-3  ">
            <div class="swiper-slide !w-auto">
                <a href="#" class="px-4 py-2 whitespace-nowrap hover:bg-black text-white  text-sm ">HTML </a>
            </div>
            @foreach($topics as $topic)
            <div class="swiper-slide !w-auto">
            <a href="{{ route('posts.topic', $topic->name) }}" class="px-4 py-2 whitespace-nowrap hover:bg-black text-white  text-sm ">{{ $topic->name }} </a>
            </div>
            @endforeach
            @foreach($frameworks as $framework)
            <div class="swiper-slide !w-auto">
            <a href="{{ route('posts.framework', $framework->name) }}" class="px-4 py-2 whitespace-nowrap hover:bg-black text-white  text-sm ">{{ $framework->name }} </a>
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
