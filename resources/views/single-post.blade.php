@extends('frontend.app')
@section('title', $post->title ?? 'Topic')

@section('content')
    <div class="mx-auto flex w-full max-w-screen-2xl">
        @include('frontend.layouts.sidebar', ['posts' => $posts, 'pageTitle' => $pageTitle])

        <!-- Main Content -->
        <main class="flex-1  mx-auto mt-32 text-gray-800 px-2 sm:px-5">
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-8 text-center">{{ $post->title }}</h1>

            <!-- Prev/Next Navigation -->
            <div class="flex justify-between items-center mb-12 px-5">
                @if ($previousPost && $previousPost->slug)
                    <a href="{{ $context === 'framework'
                        ? route('posts.framework.show', [$previousPost->framework->name, $previousPost->slug])
                        : route('posts.topic.show', [$previousPost->topic->name, $previousPost->slug]) }}"
                        class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                        <span class="material-symbols-outlined">chevron_left</span> Previous
                    </a>
                @endif

                @if ($nextPost)
                    <a href="{{ $context === 'framework'
                        ? route('posts.framework.show', [$nextPost->framework->name, $nextPost->slug])
                        : route('posts.topic.show', [$nextPost->topic->name, $nextPost->slug]) }}"
                        class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                        Next <span class="material-symbols-outlined">chevron_right</span>
                    </a>
                @endif
            </div>

            <!-- Meta Info -->
            <section class="bg-gray-50 border border-gray-200 p-6 rounded-xl mb-12 shadow-sm">
                <h2 class="text-xl font-semibold mb-4 text-gray-700">Post Details</h2>
                <ul class="space-y-2 text-gray-600">
                    <li><strong>🧠 Topic:</strong> {{ $post->topic->name }}</li>
                    <li><strong>📂 Category:</strong> {{ $post->category->name }}</li>
                    <li><strong>⚙️ Framework:</strong> {{ $post->framework->name ?? 'No Framework' }}</li>
                    <li><strong>🏗️ Structure:</strong> {{ $post->structer->name }}</li>
                </ul>
            </section>

                <!-- Description -->
        @if(!empty($post->description))
        <section class="mb-12 bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">📄 Description</h2>
            <div class="prose prose-slate max-w-none text-gray-800 leading-relaxed">
                {!! $post->description !!}
            </div>
        </section>
        @endif

            <!-- Code Blocks -->
            @if (!empty($post->code_titles) && !empty($post->codes))
                <section class="mb-12">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Code Blocks</h2>
                    <div class="space-y-6">
                        @foreach ($post->code_titles as $index => $codeTitle)
                            <div id="codeContainer{{ $index }}" class="bg-white overflow-visible ">

                                {{-- Sticky Header --}}
                                <div class="sticky top-[95px] left-0 w-full z-10 flex justify-between items-center bg-gray-900 shadow-l rounded-t-xl text-white px-4 py-2"
                                    style="will-change: transform;">
                                    <span class="font-medium">{{ $codeTitle }}</span>

                                    <div class="flex gap-x-1">
                                        <button onclick="copySpecificCode({{ $index }})"
                                            class="text-gray-200 bg-gray-800 hover:bg-gray-700 px-3 py-1 rounded text-sm flex items-center gap-1">
                                            📋 Copy
                                        </button>

                                        <button onclick="toggleFullscreen('codeContainer{{ $index }}')"
                                            class="text-gray-200 bg-gray-800 hover:bg-gray-700 px-3 py-1 rounded text-sm">
                                            ⛶
                                        </button>
                                    </div>
                                </div>

                                {{-- Code Area --}}
                                <div class="bg-[#0D1117] text-gray-100 font-mono text-sm overflow-auto rounded-b-xl
">
                                    <pre class="whitespace-pre-wrap break-words px-4 py-2">
                                        <code id="codeBlock{{ $index }}" class="w-full ">{{ $post->codes[$index] ?? '' }}</code>
                                    </pre>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Image Gallery -->
            @if (!empty($post->images))
                <section class="mb-20">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Images</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($post->images as $img)
                            <div id="imageContainer{{ $loop->index }}"
                                class="relative rounded-xl overflow-hidden border border-gray-200 shadow-sm bg-white group">
                                {{-- Fullscreen --}}
                                <button onclick="toggleFullscreen('imageContainer{{ $loop->index }}')"
                                    class="absolute top-2 right-2 z-10 text-gray-600 bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition">
                                    ⛶
                                </button>
                                <img src="{{ asset('storage/' . $img) }}" alt="Post Image"
                                    class="w-full h-48 object-cover">
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

        </main>
    </div>
@endsection

@push('scripts')
<script>
  function toggleFullscreen(elementId) {
    const element = document.getElementById(elementId);

    if (!document.fullscreenElement) {
        element.requestFullscreen().then(() => {
            element.classList.add('fixed', 'inset-0', 'z-50', 'bg-white');
            element.style.overflowY = 'auto';

            const stickyHeader = element.querySelector('.sticky');
            if (stickyHeader) {
                stickyHeader.classList.remove('top-[95px]');
                stickyHeader.classList.add('top-0');
            }

            const img = element.querySelector('img');
            if (img) {
                img.classList.add('w-full', 'h-screen', 'object-contain');
                img.style.maxWidth = '100vw';
                img.style.maxHeight = '100vh';
                img.style.margin = 'auto'; // Center fullscreen image
            }
        }).catch(err => {
            console.error(`Fullscreen error: ${err.message}`);
        });
    } else {
        document.exitFullscreen().then(() => {
            element.classList.remove('fixed', 'inset-0', 'z-50', 'bg-white');
            element.style.overflowY = '';

            const stickyHeader = element.querySelector('.sticky');
            if (stickyHeader) {
                stickyHeader.classList.remove('top-0');
                stickyHeader.classList.add('top-[95px]');
            }

            const img = element.querySelector('img');
            if (img) {
                img.classList.remove('w-full', 'h-screen', 'object-contain');
                img.style.maxWidth = '';
                img.style.maxHeight = '';
                img.style.margin = '0 auto'; // Keep normal mode centered
            }
        }).catch(err => {
            console.error(`Exit fullscreen error: ${err.message}`);
        });
    }
}

    function copySpecificCode(index) {
        const codeBlock = document.getElementById('codeBlock' + index);
        if (!codeBlock) return;

        const btn = event.currentTarget;
        const originalText = btn.innerText;

        navigator.clipboard.writeText(codeBlock.innerText).then(() => {
            btn.innerText = 'Copied! 📋';
            setTimeout(() => {
                btn.innerText = originalText;
            }, 3000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
</script>
@endpush
