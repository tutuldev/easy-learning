@extends('backend.app')

@section('content')
    <div class="max-w-xl mx-auto mt-20 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Category Details</h2>

        <div class="mb-4">
            <strong class="text-gray-700">ID:</strong>
            <span class="text-gray-900">{{ $category->id }}</span>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Name:</strong>
            <span class="text-gray-900">{{ $category->name }}</span>
        </div>

        <a href="{{ route('categories.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md text-sm">Back to List</a>
    </div>
@endsection
