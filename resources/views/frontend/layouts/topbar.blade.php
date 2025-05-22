 {{-- top bar start --}}
 <section class="bg-[#261F1E] fixed top-14 left-0 w-full z-40 ">
    {{-- button and swiper js container  --}}
     <div class="flex max-w-screen-2xl w-full mx-auto items-center ">

         @if (request()->is('/'))
         @else
             <div id="menu-btn" class="menu px-4 h-full flex md:hidden items-center ">

             <span
                 class="material-symbols-outlined text-2xl   text-white cursor-pointer hover:text-green-500 transition ">menu</span>
         </div>
         @endif

         {{-- swiper js container  start  --}}
         <div class="swiper  cursor-pointer ">
             <div class="swiper-wrapper py-2">
                 @foreach ($topics as $topic)
                     <div class="swiper-slide !w-auto">
                         <a href="{{ route('posts.topic', $topic->name) }}"
                             class="px-4 py-3 whitespace-nowrap text-sm
                   {{ Request::is('posts/topic/' . $topic->name . '*') ? 'bg-green-600 text-white' : 'hover:bg-black text-white' }}">
                             {{ $topic->name }}
                         </a>
                     </div>
                 @endforeach

                 @foreach ($frameworks as $framework)
                     <div class="swiper-slide !w-auto">
                         <a href="{{ route('posts.framework', $framework->name) }}"
                             class="px-4 py-3 whitespace-nowrap text-sm
                   {{ Request::is('posts/framework/' . $framework->name . '*') ? 'bg-green-600 text-white' : 'hover:bg-black text-white' }}">
                             {{ $framework->name }}
                         </a>
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
     </div>

 </section>

 {{-- top bar end  --}}
