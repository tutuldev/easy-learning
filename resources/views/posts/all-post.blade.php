@extends('backend.app')
@section('title', 'All Posts')

@section('content')
<div class="mt-16">
 <!-- Header and Add Button -->
 <div class="flex items-center justify-between flex-wrap gap-4">
  <h2 class="text-2xl font-semibold flex items-center">
   Posts
   <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-red-600 rounded-full">
    {{ $posts->total() }}
   </span>
  </h2>
  <a href="{{ route('posts.create') }}"
   class="text-white px-3 py-2 text-sm rounded-md bg-green-600 hover:bg-green-700 inline-flex items-center">
   <span class="material-symbols-outlined text-base mr-1">add</span>
   Add Post
  </a>
 </div>

 <!-- Responsive Table -->
 <div class="mt-6 overflow-x-auto">
 <table class="min-w-full table-auto border border-gray-200 text-center text-sm">
  <thead class="bg-gray-100 text-gray-600 font-medium">
    <tr>
      <th class="px-4 py-2 border">Serial</th>
      <th class="px-4 py-2 border">Title</th>
      {{-- <th class="px-4 py-2 border">Author</th> --}}
      <th class="px-4 py-2 border">Category</th>
      <th class="px-4 py-2 border">Topic</th>
      <th class="px-4 py-2 border">Framework</th>
      <th class="px-4 py-2 border">Structure</th>
      <th class="px-4 py-2 border">Created At</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $key => $post)
      <tr class="hover:bg-gray-50">
        <td class="px-4 py-2 border">{{ $posts->firstItem() + $key }}</td>
        <td class="px-4 py-2 border max-w-sm truncate">{{ $post->title }}</td>
        {{-- <td class="px-4 py-2 border">{{ $post->user->name ?? 'N/A' }}</td> --}}
        <td class="px-4 py-2 border">{{ $post->category->name ?? 'Uncategorized' }}</td>
        <td class="px-4 py-2 border">{{ $post->topic->name ?? 'N/A' }}</td>
        <td class="px-4 py-2 border">{{ $post->framework->name ?? 'No Framework' }}</td>
        <td class="px-4 py-2 border">{{ $post->structer->name ?? 'N/A' }}</td>
        <td class="px-4 py-2 border">{{ $post->created_at->format('Y-m-d') }}</td>
        <td class="px-4 py-2 border">
          <div class="flex flex-wrap justify-center gap-2">
            <a href="{{ route('posts.show', $post->slug) }}"
              class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">
              Show
            </a>
            <a href="{{ route('posts.edit', $post->slug) }}"
              class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">
              Edit
            </a>
            <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
              @csrf
              @method('DELETE')
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

 </div>

 <!-- Pagination -->
 <div class="mt-6">
  {{ $posts->links('vendor.pagination.custom') }}
 </div>
</div>
@endsection
