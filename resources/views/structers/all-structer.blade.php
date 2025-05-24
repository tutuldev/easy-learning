@extends('backend.app')
@section('title', 'All Structer')

@section('content')
<div class="mt-16">
  <!-- Header and Add Button -->
  <div class="flex items-center justify-between flex-wrap gap-4">
    <h2 class="text-2xl font-semibold flex items-center">
      Structers
      <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-red-600 rounded-full">
        {{ $structers->total() }}
      </span>
    </h2>
    <a href="{{ route('structers.create') }}"
      class="text-white px-3 py-2 text-sm rounded-md bg-green-600 hover:bg-green-700 inline-flex items-center">
      <span class="material-symbols-outlined text-base mr-1">add</span>
      Add Structer
    </a>
  </div>

  <!-- Responsive Table -->
  <div class="mt-6 overflow-x-auto">
    <table class="min-w-full table-auto border border-gray-200 text-center text-sm">
      <thead class="bg-gray-100 text-gray-600 font-medium">
        <tr>
          <th class="px-4 py-2 border">Serial</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($structers as $key => $structer)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border">{{ $structers->firstItem() + $key }}</td>
          <td class="px-4 py-2 border">{{ $structer->name }}</td>
           <td class="px-4 py-2 border">
            <a href="{{ route('admin.posts.structer', $structer->name) }}"
             class="text-white px-3 py-1 rounded bg-cyan-600 hover:bg-cyan-700 text-xs">
              Show ({{ $structer->posts_count }})
            </a>
          </td>
          <td class="px-4 py-2 border">
            <div class="flex flex-wrap justify-center gap-2">
              <a href="{{ route('structers.show', $structer->slug) }}"
                class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">
                Show
              </a>
              <a href="{{ route('structers.edit', $structer->slug) }}"
                class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">
                Edit
              </a>
              <form action="{{ route('structers.destroy', $structer->slug) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit"
                  onclick="return confirm('Are you sure you want to delete this structer?')"
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
    {{ $structers->links('vendor.pagination.custom') }}
  </div>
</div>
@endsection
