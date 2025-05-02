@extends('backend.app')
@section('title', 'Dashboard')
@section('content')
{{-- dashbord topbar  --}}

{{-- dashbord topbar  end--}}
<div class="flex-1 dashbord-main pt-2">
    <h3 class="text-xl pb-4 font-bold">Category details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
    @foreach($categories as $category)
        <a href="{{ route('posts.category', $category->name) }}" class="block">
            <div class="bg-white rounded-lg p-6 shadow flex justify-between items-center">
                <span>{{ $category->name }}</span>
                <span>post-{{ $category->posts_count }}</span>
            </div>
        </a>
    @endforeach


    </div>

    <h3 class="text-xl py-4 font-bold">Framework details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
    @foreach($frameworks as $framework)
        <a href="{{ route('admin.posts.framework', $framework->name) }}" class="block">
            <div class="bg-white rounded-lg p-6 shadow flex justify-between items-center">
                <span>{{ $framework->name }}</span>
                <span>post-{{ $framework->posts_count }}</span>
            </div>
        </a>
    @endforeach
    </div>

    <h3 class="text-xl py-4 font-bold">Topic details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
        @foreach($topics as $topic)
        <a href="{{ route('admin.posts.topic', $topic->name) }}" class="block">
            <div class="bg-white rounded-lg p-6 shadow flex justify-between items-center">
                <span>{{ $topic->name }}</span>
                <span>post-{{ $topic->posts_count }}</span>
            </div>
        </a>
    @endforeach
    </div>
    <h3 class="text-xl py-4 font-bold">Structer details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
        @foreach($structers as $structer)
        <a href="{{ route('posts.structer', $structer->name) }}" class="block">
            <div class="bg-white rounded-lg p-6 shadow flex justify-between items-center">
                <span>{{ $structer->name }}</span>
                <span>post-{{ $structer->posts_count }}</span>
            </div>
        </a>
    @endforeach
    </div>
</div>
@endsection
