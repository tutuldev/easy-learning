@extends('backend.app')
@section('title', 'Dashboard')

@section('content')

<div class="flex-1 dashbord-main pt-6 px-4">
    <h3 class="text-2xl font-bold text-[#261F1E] mb-4">📂 Category Details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('admin.posts.category', $category->name) }}" class="block transition-transform transform hover:scale-105">
            <div class="bg-[#D9EEE1] border border-[#B0D9C0] text-[#261F1E] rounded-2xl p-6 shadow-md flex justify-between items-center">
                <span class="font-semibold text-lg">{{ $category->name }}</span>
                <span class="text-sm bg-[#96D4D4] text-[#261F1E] px-2 py-1 rounded-full">Posts: {{ $category->posts_count }}</span>
            </div>
        </a>
        @endforeach
    </div>

    <h3 class="text-2xl font-bold text-[#261F1E] mt-10 mb-4">💻 Framework Details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($frameworks as $framework)
        <a href="{{ route('admin.posts.framework', $framework->name) }}" class="block transition-transform transform hover:scale-105">
            <div class="bg-[#FFF4A3] border border-yellow-300 text-[#261F1E] rounded-2xl p-6 shadow-md flex justify-between items-center">
                <span class="font-semibold text-lg">{{ $framework->name }}</span>
                <span class="text-sm bg-yellow-400 text-white px-2 py-1 rounded-full">Posts: {{ $framework->posts_count }}</span>
            </div>
        </a>
        @endforeach
    </div>

    <h3 class="text-2xl font-bold text-[#261F1E] mt-10 mb-4">📘 Topic Details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($topics as $topic)
        <a href="{{ route('admin.posts.topic', $topic->name) }}" class="block transition-transform transform hover:scale-105">
            <div class="bg-[#F3ECEA] border border-[#E0D6D4] text-[#261F1E] rounded-2xl p-6 shadow-md flex justify-between items-center">
                <span class="font-semibold text-lg">{{ $topic->name }}</span>
                <span class="text-sm bg-[#D9AAA3] text-white px-2 py-1 rounded-full">Posts: {{ $topic->posts_count }}</span>
            </div>
        </a>
        @endforeach
    </div>

    <h3 class="text-2xl font-bold text-[#261F1E] mt-10 mb-4">📦 Structure Details</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($structers as $structer)
        <a href="{{ route('admin.posts.structer', $structer->name) }}" class="block transition-transform transform hover:scale-105">
            <div class="bg-[#96D4D4] border border-[#75BDBD] text-[#261F1E] rounded-2xl p-6 shadow-md flex justify-between items-center">
                <span class="font-semibold text-lg">{{ $structer->name }}</span>
                <span class="text-sm bg-[#61BFBF] text-white px-2 py-1 rounded-full">Posts: {{ $structer->posts_count }}</span>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection
