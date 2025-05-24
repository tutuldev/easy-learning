@extends('backend.app')
@section('title', 'Framework - ' . $framework->name)

@section('content')
<div class="max-w-2xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-md border border-gray-100">

  <!-- Header -->
  <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
    {{-- <span class="material-symbols-outlined text-blue-500">Framework</span> --}}
    Framework Details
  </h2>

  <!-- Framework ID -->
  <div class="mb-4">
    <p class="text-sm text-gray-500">Framework ID</p>
    <p class="text-lg font-medium text-gray-800">{{ $framework->id }}</p>
  </div>

  <!-- Framework Name -->
  <div class="mb-4">
    <p class="text-sm text-gray-500">Name</p>
    <p class="text-lg font-medium text-gray-800">{{ $framework->name }}</p>
  </div>

  <!-- Framework Description -->
  <div class="mb-6">
    <p class="text-sm text-gray-500">Description</p>
    <p class="text-base text-gray-700">{{ strip_tags($framework->description) }}</p>
  </div>

  <!-- Show All Posts Under This Framework -->
  <div class="mb-6">
    <a href="{{ route('admin.posts.framework', $framework->name) }}">
      <div class="bg-gray-50 hover:bg-gray-100 transition rounded-md py-4 px-5 border border-gray-200 flex justify-between items-center">
        <span class="text-sm text-gray-700">View all posts under <strong>{{ $framework->name }}</strong></span>
        <span class="text-xs bg-indigo-600 text-white px-2 py-1 rounded-full">Posts: {{ $framework->posts_count }}</span>
      </div>
    </a>
  </div>

  <!-- Action Buttons -->
  <div class="flex flex-wrap gap-3">
    <a href="{{ route('frameworks.index') }}"
     class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md">
      <span class="material-symbols-outlined text-sm mr-1">arrow_back</span>
      Back to List
    </a>

    <a href="{{ route('frameworks.edit', $framework->slug) }}"
     class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
      <span class="material-symbols-outlined text-sm mr-1">edit</span>
      Edit
    </a>

    <form action="{{ route('frameworks.destroy', $framework->slug) }}" method="POST"
       onsubmit="return confirm('Are you sure you want to delete this Framework?');">
      @csrf
      @method('DELETE')
      <button type="submit"
          class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
        <span class="material-symbols-outlined text-sm mr-1">delete</span>
        Delete
      </button>
    </form>
  </div>

</div>
@endsection
