@extends('backend.app')
@section('title', 'All Framework')

@section('content')
<div class="mt-16">
  <div class="flex items-center justify-between flex-wrap gap-4">
    <h2 class="text-2xl font-semibold flex items-center">
      Framework
      <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-red-600 rounded-full">
        {{ $frameworks->total() }}
      </span>
    </h2>
    <a href="{{ route('frameworks.create') }}" class="text-white px-3 py-2 text-sm rounded-md bg-green-600 hover:bg-green-700 inline-flex items-center">
      <span class="material-symbols-outlined text-base mr-1">add</span> Add Framework
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
        @foreach ($frameworks as $key => $framework)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border">{{ $frameworks->firstItem() + $key }}</td>
          <td class="px-4 py-2 border">{{ $framework->name }}</td>
          <td class="px-4 py-2 border max-w-xs truncate">{{ strip_tags($framework->description) }}</td>
          <td class="px-4 py-2 border">
            <a href="{{ route('admin.posts.framework', $framework->name) }}"
             class="text-white px-3 py-1 rounded bg-cyan-600 hover:bg-cyan-700 text-xs">
              Show ({{ $framework->posts_count }})
            </a>
          </td>
          <td class="px-4 py-2 border">
            <div class="flex flex-wrap justify-center gap-2">
              <a href="{{ route('frameworks.show', $framework) }}" class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">Show</a>
              <a href="{{ route('frameworks.edit', $framework) }}" class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">Edit</a>
              <form action="{{ route('frameworks.destroy', $framework->slug) }}" method="POST">
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
    {{ $frameworks->links('vendor.pagination.custom') }}
  </div>
</div>
@endsection
