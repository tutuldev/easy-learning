@extends('backend.app')
@section('title', $title .' - Posts' ?? 'Filtered Posts')

@section('content')

<h2 class="text-2xl font-semibold flex mt-16 items-center">
    {{ $title }} Posts
    <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-red-600 rounded-full">
        {{ $posts->total() }}
    </span>
</h2>

@if($posts->isEmpty())
    <div class="text-center text-red-500 font-medium mt-6">
        No posts found for this filter.
    </div>
@else
    <div class="overflow-x-auto mt-6">
        <table class="min-w-full table-auto border text-center border-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-600 font-medium">
                    @php
                        $titleType = '';
                        if ($posts->count()) {
                            $first = $posts->first();
                            if ($first->category && $first->category->name === $title) $titleType = 'category';
                            elseif ($first->topic && $first->topic->name === $title) $titleType = 'topic';
                            elseif ($first->framework && $first->framework->name === $title) $titleType = 'framework';
                            elseif ($first->structer && $first->structer->name === $title) $titleType = 'structer';
                        }
                    @endphp
              <tr>
    <th class="px-4 py-2 border">Serial</th>
    <th class="px-4 py-2 border">Title</th>

    <th class="px-4 py-2 border {{ $titleType == 'category' ? 'bg-yellow-50 text-yellow-800 font-semibold border-y-red-600' : '' }}">
        Category
    </th>

    <th class="px-4 py-2 border {{ $titleType == 'topic' ? 'bg-yellow-50 text-yellow-800 font-semibold border-y-red-600' : '' }}">
        Topic
    </th>

    <th class="px-4 py-2 border {{ $titleType == 'framework' ? 'bg-yellow-50 text-yellow-800 font-semibold border-y-red-600' : '' }}">
        Framework
    </th>

    <th class="px-4 py-2 border {{ $titleType == 'structer' ? 'bg-yellow-50 text-yellow-800 font-semibold border-y-red-600' : '' }}">
        Structure
    </th>

    <th class="px-4 py-2 border">Created At</th>
    <th class="px-4 py-2 border">Actions</th>
</tr>

            </thead>
            <tbody>
                @foreach ($posts as $key => $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border max-w-sm truncate">{{ $post->title }}</td>

                        {{-- Highlight Category --}}
                        <td class="px-4 py-2 border {{ isset($post->category->name) && $post->category->name == $title ? 'bg-yellow-50 text-yellow-800 font-semibold border-b-red-600' : '' }}">
                            {{ $post->category->name ?? 'N/A' }}
                        </td>

                        {{-- Highlight Topic --}}
                        <td class="px-4 py-2 border {{ isset($post->topic->name) && $post->topic->name == $title ? 'bg-yellow-50 text-yellow-800 font-semibold border-b-red-600' : '' }}">
                            {{ $post->topic->name ?? 'N/A' }}
                        </td>

                        {{-- Highlight Framework --}}
                        <td class="px-4 py-2 border {{ isset($post->framework->name) && $post->framework->name == $title ? 'bg-yellow-50 text-yellow-800 font-semibold border-b-red-600' : '' }}">
                            {{ $post->framework->name ?? 'No Framework' }}
                        </td>

                        {{-- Highlight Structure --}}
                        <td class="px-4 py-2 border {{ isset($post->structer->name) && $post->structer->name == $title ? 'bg-yellow-50 text-yellow-800 font-semibold border-b-red-600' : '' }}">
                            {{ $post->structer->name ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-2 border">{{ $post->created_at->format('Y-m-d') }}</td>

                        <td class="px-4 py-2 border">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('posts.show', $post->slug) }}"
                                    class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">Show</a>
                                <a href="{{ route('posts.edit', $post->slug) }}"
                                    class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">Edit</a>
                                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this post?')"
                                        class="text-white px-2 py-1 rounded bg-red-600 hover:bg-red-700 text-xs">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
         {{-- Pagination --}}
        <div class="mt-6">
            {{-- {{ $posts->links('pagination::tailwind') }} --}}
             {{ $posts->links('vendor.pagination.custom') }}

        </div>
    </div>
@endif

@endsection
