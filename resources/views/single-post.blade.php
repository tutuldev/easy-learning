@extends('frontend.app')
@section('title', $post->title ?? 'Topic')
@section('content')

    <!-- Sidebar and Main Content Container -->
    <div class="mx-auto flex container">
        @include('frontend.layouts.sidebar', ['posts' => $posts, 'pageTitle' => $pageTitle])

        <!--Main Content -->
        <main class="flex-1 px-4 mt-32">
            <h2 class="text-5xl my-10">{{ $post->title }}</h2>
            <div class="flex justify-between">
                @if ($previousPost && $previousPost->slug)
                    <a href="{{ $context === 'framework'
                        ? route('posts.framework.show', [$previousPost->framework->name, $previousPost->slug])
                        : route('posts.topic.show', [$previousPost->topic->name, $previousPost->slug]) }}"
                        class="btn flex items-center gap-1 pe-4 py-2 bg-green-600 text-white rounded-md">
                        <span class="material-symbols-outlined">chevron_left</span>
                        Previous
                    </a>
                @endif

                @if ($nextPost)
                    <a href="{{ $context === 'framework'
                        ? route('posts.framework.show', [$nextPost->framework->name, $nextPost->slug])
                        : route('posts.topic.show', [$nextPost->topic->name, $nextPost->slug]) }}"
                        class="btn flex items-center gap-1 ps-4 py-2 bg-green-600 text-white rounded-md">
                        Next
                        <span class="material-symbols-outlined">chevron_right</span>
                    </a>
                @endif
            </div>

            <h2 class="text-2xl font-bold mb-4 mt-10">Details</h2>
            <div class="mb-2"><strong>Topic:</strong> {{ $post->topic->name }}</div>
            <div class="mb-2"><strong>Category:</strong> {{ $post->category->name }}</div>
            <div class="mb-2"><strong>Framework:</strong> {{ $post->framework->name ?? 'No Framework' }}</div>
            <div class="mb-2"><strong>Structer:</strong> {{ $post->structer->name }}</div>

            {{-- Code & Image Section --}}
            <div class="flex flex-col lg:flex-row gap-4 mt-10">
                {{-- Code --}}
                @if ($post->code)
                    <div id="codeContainer" class="flex-1 bg-[#0D1117]  rounded-lg relative overflow-auto px-4">
                        {{-- Buttons --}}
                        <div class="sticky top-0   flex justify-end gap-2 z-10">
                            {{-- Fullscreen --}}
                            <button id="codeFullscreenBtn" onclick="toggleFullscreen('codeContainer', 'codeFullscreenBtn')"
                                class="bg-gray-700  hover:bg-gray-600 text-white px-3 py-1 rounded">
                                ⛶
                            </button>
                            {{-- Copy --}}
                            <button onclick="copyCode()"
                                class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-1 rounded flex items-center gap-1">
                                📋 <span id="copyText">Copy</span>
                            </button>
                        </div>

                        {{-- Code Block --}}
                        <div class="h-[500px]">
                            <pre class="whitespace-pre-wrap break-words h-full pt-2">
                            <code id="codeBlock" class="text-gray-200">{{ $post->code }}</code>
                             </pre>
                        </div>
                    </div>
                @endif

                {{-- Image --}}
                @if ($post->image)
                    <div id="imageContainer" class="flex-1 relative rounded-lg overflow-hidden aspect-[16/9]">
                        {{-- Fullscreen --}}
                        <button onclick="toggleFullscreen('imageContainer', 'imageFullscreenBtn')" id="imageFullscreenBtn"
                            class="absolute top-2 right-2 z-10 bg-gray-700 hover:bg-gray-600 text-white px-3 py-1 rounded">
                            ⛶
                        </button>
                        <img id="fullscreenImage" class="w-full h-ful object-cover rounded-lg"
                            src="{{ asset('storage/' . $post->image) }}" alt="">
                    </div>
                @endif

            </div>




        </main>
    </div>
@endsection

@push('scripts')
    <script>
        function copyCode() {
            const code = document.getElementById('codeBlock').innerText;
            const copyText = document.getElementById('copyText');

            navigator.clipboard.writeText(code).then(() => {
                copyText.textContent = 'Copied ✅';
                setTimeout(() => {
                    copyText.textContent = 'Copy';
                }, 3000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }

        function toggleFullscreen(elementId, buttonId) {
            const element = document.getElementById(elementId);
            const button = document.getElementById(buttonId);
            const img = document.getElementById('fullscreenImage');

            if (!document.fullscreenElement) {
                element.requestFullscreen().then(() => {
                    // button.innerHTML = '🗕';
                    button.innerHTML = '⛶';
                    if (img) {
                        img.classList.remove('max-h-[500px]');
                        img.classList.add('w-screen', 'h-screen', 'object-contain');
                    }
                }).catch(err => {
                    console.error(`Error attempting full-screen mode: ${err.message}`);
                });
            } else {
                document.exitFullscreen().then(() => {
                    button.innerHTML = '⛶';
                    if (img) {
                        img.classList.remove('w-screen', 'h-screen', 'object-contain');
                        img.classList.add('max-h-[500px]', 'object-cover');
                    }
                });
            }
        }
    </script>
@endpush
