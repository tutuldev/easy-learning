  {{-- banner section start  --}}
  <section class="banner relative">
    <img src="{{ asset('image/banner.png') }}" alt="Banner Image" class="w-full h-[90vh]">

    <!-- Centered Text -->
    <div class="absolute inset-0 flex flex-col gap-4 items-center justify-center text-center px-4">
        <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold">Learn to Code</h1>
        <h4 class="text-yellow-600 text-lg sm:text-xl font-bold mt-2 sm:mt-4">With the world's largest web developer site.</h4>
        <div class="relative w-full max-w-md sm:max-w-lg my-2">
            <input type="text" placeholder="Search our tutorials, e.g. HTML"
                class="w-full h-8 sm:h-10 bg-white px-4 py-5 sm:py-6 pr-10 sm:pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
            <button class="absolute inset-y-0 right-0 bg-green-500 flex items-center justify-center rounded-r-full h-full px-3 sm:px-4">
                <span class="material-icons text-white text-lg sm:text-xl cursor-pointer">search</span>
            </button>
        </div>
        <h4 class="text-white underline text-lg sm:text-xl font-bold mt-2">Not Sure Where To Begin?</h4>
    </div>

</section>
{{-- banner section end --}}
