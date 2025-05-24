@extends('backend.app')
@section('title', 'All Topic')

@section('content')
<div class="mt-16">
  <div class="flex items-center justify-between flex-wrap gap-4">
    <h2 class="text-2xl font-semibold flex items-center">
      Topics
      <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-red-600 rounded-full">
        {{ $topics->total() }}
      </span>
    </h2>
    <a href="{{ route('topics.create') }}" class="text-white px-3 py-2 text-sm rounded-md bg-green-600 hover:bg-green-700 inline-flex items-center">
      <span class="material-symbols-outlined text-base mr-1">add</span> Add Topic
    </a>
  </div>

  <!-- Responsive Table Wrapper -->
  <div class="mt-6 overflow-x-auto">
    <table class="min-w-full table-auto border border-gray-200 text-center">
      <thead class="bg-gray-100 text-sm text-gray-600">
        <tr>
          <th class="px-4 py-2 border">Serial</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Description</th>
          <th class="px-4 py-2 border">Post Count</th>
          <th class="px-4 py-2 border">Actions</th>
        </tr>
      </thead>
      <tbody class="text-sm">
        @foreach ($topics as $key => $topic)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border">{{ $topics->firstItem() + $key }}</td>
          <td class="px-4 py-2 border">{{ $topic->name }}</td>
          <td class="px-4 py-2 border max-w-xs truncate">{{ strip_tags($topic->description) }}</td>
          <td class="px-4 py-2 border">
            <a href="{{ route('admin.posts.topic', $topic->name) }}"
             class="text-white px-3 py-1 rounded bg-cyan-600 hover:bg-cyan-700 text-xs">
              Show ({{ $topic->posts_count }})
            </a>
          </td>
          <td class="px-4 py-2 border">
            <div class="flex flex-wrap justify-center gap-2">
              <a href="{{ route('topics.show', $topic) }}" class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">Show</a>
              <a href="{{ route('topics.edit', $topic) }}" class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">Edit</a>
              <form action="{{ route('topics.destroy', $topic->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="text-white px-2 py-1 rounded bg-red-600 hover:bg-red-700 text-xs">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $topics->links('vendor.pagination.custom') }}
  </div>
</div>
@endsection
