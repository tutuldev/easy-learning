@extends('backend.app')
@section('title', 'Show Post')

@section('content')
<div class="max-w-3xl mx-auto mt-20 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Post Details</h2>

    <div class="mb-2"><strong>Title:</strong> {{ $post->title }}</div>
    <div class="mb-2"><strong>Slug:</strong> {{ $post->slug }}</div>
    <div class="mb-2"><strong>Category:</strong> {{ $post->category->name }}</div>
    <div class="mb-2"><strong>Framework:</strong> {{ $post->framework->name ?? 'No Framework' }}</div>
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
@endsection
