@extends('backend.app')
@section('title', $title  ?? 'Topics')

@section('content')
<h2 class="text-2xl font-semibold mt-16">Filtered Posts</h2>

@if($posts->isEmpty())
    <div class="text-center text-red-500 font-medium mt-6">
        No posts found for this filter.
    </div>
@else
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full table-auto border text-center border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600 border">ID</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600 border">Title</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600 border">Category</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600 border">Topic</th>
                    <th class="px-4 py-2 text-sm font-medium text-gray-600 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $post->id }}</td>
                    <td class="px-4 py-2 border">{{ $post->title }}</td>
                    <td class="px-4 py-2 border">{{ $post->category->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $post->topic->name ?? 'N/A' }}</td>
                    <td class="flex space-x-2 justify-center py-2">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-white px-2 py-1 rounded-md bg-indigo-600 hover:bg-indigo-700 text-sm">Show</a>
                        <a href="{{ route('posts.edit', $post->slug) }}" class="text-white px-2 py-1 rounded-md bg-sky-600 hover:bg-sky-700 text-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="text-white px-2 py-1 rounded-md bg-red-600 hover:bg-red-700 text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
