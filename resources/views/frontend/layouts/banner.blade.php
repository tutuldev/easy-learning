  {{-- banner section start  --}}
  <section class="banner relative">
    <img src="{{ asset('image/banner.png') }}" alt="Banner Image" class="w-full h-[90vh]">

    <!-- Centered Text -->
    <div class="absolute inset-0 flex flex-col gap-4 items-center justify-center text-center px-4">
        <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold">Learn to Code</h1>
        <h4 class="text-yellow-600 text-lg sm:text-xl font-bold mt-2 sm:mt-4">With the world's largest web developer site.</h4>
     <div class="relative w-full max-w-md sm:max-w-lg my-2">
    <input type="text" id="searchInput2" placeholder="Search our tutorials, e.g. HTML"
        class="w-full h-8 sm:h-10 bg-white px-4 py-5 sm:py-6 pr-10 sm:pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">

    <button class="absolute inset-y-0 right-0 bg-green-500 flex items-center justify-center rounded-r-full h-full px-3 sm:px-4">
        <span class="material-icons text-white text-lg sm:text-xl cursor-pointer">search</span>
    </button>

    {{-- Result Dropdown --}}
    <div id="searchResults2" class="absolute text-left top-full mt-1 w-64 max-h-[300px] overflow-y-auto bg-white shadow-md border border-gray-200 rounded-md z-10 hidden">
        {{-- results will be inserted here --}}
    </div>
</div>

        <h4 class="text-white underline text-lg sm:text-xl font-bold mt-2">Not Sure Where To Begin?</h4>
    </div>

</section>
{{-- banner section end --}}
@push('scripts')
<script>
    const input2 = document.getElementById("searchInput2");
const resultBox2 = document.getElementById("searchResults2");

input2.addEventListener("input", async function () {
    const query = this.value.trim();
    if (query.length < 1) {
        resultBox2.classList.add('hidden');
        resultBox2.innerHTML = '';
        return;
    }

    const res = await fetch(`/search?q=${encodeURIComponent(query)}`);
    const data = await res.json();

    if (data.topics.length === 0 && data.frameworks.length === 0) {
        resultBox2.innerHTML = `<p class="px-4 py-2 text-gray-500 text-sm">No Result Found</p>`;
        resultBox2.classList.remove('hidden');
        return;
    }

    let html = '';
    data.topics.forEach(item => {
        html += `<a href="/posts/topic/${item.name}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-green-100">${item.name} Tutorial<span class="text-xs text-gray-400">(Topic)</span></a>`;
    });
    data.frameworks.forEach(item => {
        html += `<a href="/posts/framework/${item.name}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-green-100">${item.name} Tutorial<span class="text-xs text-gray-400">(Framework)</span></a>`;
    });

    resultBox2.innerHTML = html;
    resultBox2.classList.remove('hidden');
});

</script>
@endpush
