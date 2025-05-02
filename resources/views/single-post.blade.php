@extends('frontend.app')
{{-- @section('title', $pageTitle ?? 'Topic')  // eta main topic show korbe --}}
@section('title', $post->title  ?? 'Topic')
@section('content')

    <!-- Sidebar and Main Content Container -->
    <div class="mx-auto flex container">
        @include('frontend.layouts.sidebar', ['posts' => $posts, 'pageTitle' => $pageTitle])

        <!--Main Content -->
        <main class="flex-1 px-4 mt-32">
            <h2 class="text-5xl my-10">{{$post->title}}</h2>
            <div class="flex justify-between">
                <a href="#" class="btn flex items-center gap-1 pe-4 py-2 bg-green-600 text-white rounded-md">
                    <span class="material-symbols-outlined">chevron_left</span>
                    Previous
                </a>

                <a href="#" class="btn flex items-center gap-1 ps-4 py-2 bg-green-600 text-white rounded-md">
                    Next
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>

            </div>
            <div class="max-w-3xl mx-auto mt-20 p-6 bg-white rounded shadow">
                <h2 class="text-2xl font-bold mb-4">Post Details</h2>

                <div class="mb-2"><strong>Title:</strong> {{ $post->title }}</div>
                <div class="mb-2"><strong>Slug:</strong> {{ $post->slug }}</div>
                <div class="mb-2"><strong>Category:</strong> {{ $post->category->name }}</div>
                <div class="mb-2"><strong>Framework:</strong> {{ $post->framework->name }}</div>
                <div class="mb-2"><strong>Topic:</strong> {{ $post->topic->name }}</div>
                <div class="mb-2"><strong>Structer:</strong> {{ $post->structer->name }}</div>
                <div class="mb-2"><strong>Description:</strong> {!! nl2br(e($post->description)) !!}</div>
                @if($post->code)
                    <div class="mb-2"><strong>Code:</strong> <pre class="bg-gray-100 p-2">{{ $post->code }}</pre></div>
                @endif
                @if($post->image)
                    <div class="mb-4">
                        <strong>Image:</strong><br>
                        <img src="{{ asset('storage/' . $post->image) }}" class="mt-2 max-w-xs rounded" />
                    </div>
                @endif

                <a href="{{ route('posts.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md text-sm">Back to List</a>
            </div>
        </main>
    </div>

@endsection
