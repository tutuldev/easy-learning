@extends('frontend.app')
@section('title', ($pageTitle ?? 'Topic') . ' Tutorial')
{{-- @section('title', $pageTitle ?? 'Topic') --}}

@section('content')

    <!-- Sidebar and Main Content Container -->
    <div class="mx-auto flex w-full max-w-screen-2xl">
        @include('frontend.layouts.sidebar')
        <!--Main Content -->
        <main class="flex-1  mt-32 px-2 sm:px-5">
            <h2 class="text-3xl md:text-5xl  my-10  px-5">{{ $pageTitle }} Tutorial </h2>
            <div class="flex justify-between  px-5">
                @if ($previousPost)
                    <a href="{{ $context === 'framework'
                        ? route('posts.framework.show', [$previousPost->framework->name, $previousPost->slug])
                        : route('posts.topic.show', [$previousPost->topic->name, $previousPost->slug]) }}"
                        class="btn flex items-center gap-1 pe-4 py-2 bg-green-600 text-white rounded-md">
                        <span class="material-symbols-outlined">chevron_left</span>
                        Previous
                    </a>
                @else
                    <span class="opacity-50 btn flex items-center gap-1 px-4 py-2 bg-gray-400 text-white rounded-md">

                        home
                    </span>
                @endif

                @if ($nextPost)
                    <a href="{{ $context === 'framework'
                        ? route('posts.framework.show', [$nextPost->framework->name, $nextPost->slug])
                        : route('posts.topic.show', [$nextPost->topic->name, $nextPost->slug]) }}"
                        class="btn flex items-center gap-1 ps-4 py-2 bg-green-600 text-white rounded-md">
                        Next
                        <span class="material-symbols-outlined">chevron_right</span>
                    </a>
                @else
                    <span class="opacity-50 btn flex items-center gap-1 ps-4 py-2 bg-gray-400 text-white rounded-md">
                        Next
                        <span class="material-symbols-outlined">chevron_right</span>
                    </span>
                @endif
            </div>
            <div class="bg-green-100 py-14 mt-3 rounded-lg px-5">
                <h2 class="text-xl mb-5 font-bold">
                    Learn {{ $currentItem->name }}
                </h2>
                <div class="flex flex-col space-y-4 leading-relaxed">
                    {!! $currentItem->description ?: '<p>Description coming soon…</p>' !!}
                </div>


            </div>
        </main>

    </div>

@endsection
