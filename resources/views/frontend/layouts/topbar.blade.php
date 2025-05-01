 {{-- top bar start --}}
 <section class="bg-[#261F1E] fixed top-14 left-0 w-full z-40 py-1">
    {{-- swiper js start  --}}
    <div class="swiper container cursor-pointer ">
        <div class="swiper-wrapper py-1 ">
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

        <!-- Add next and previous buttons -->
        {{-- <div class="absolute swiper-button-next "></div>
                    <div class="absolute swiper-button-prev"></div> --}}
        <!-- Swiper Default Buttons (with Material Icons) -->
        <div class="absolute swiper-button-prev !left-0 bg-black">
            <span class="material-symbols-outlined text-white text-sm">chevron_left</span>
        </div>
        <div class="absolute swiper-button-next !right-0 bg-black">
            <span class="material-symbols-outlined text-white text-sm">chevron_right</span>
        </div>
    </div>

</section>

{{-- top bar end  --}}
