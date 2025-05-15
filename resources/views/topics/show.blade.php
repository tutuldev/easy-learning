@extends('backend.app')
@section('title', 'Show Topic')
@section('content')
    <div class="max-w-xl mx-auto mt-20 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Topic Details</h2>

        <div class="mb-4">
            <strong class="text-gray-700">ID:</strong>
            <span class="text-gray-900">{{ $topic->id }}</span>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Name:</strong>
            <span class="text-gray-900">{{ $topic->name }}</span><br>
              <strong class="text-gray-700">Descript:</strong>
            <span class="text-gray-900">{{ strip_tags($topic->description) }}</span>
        </div>

        <a href="{{ route('topics.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md text-sm">
            Back to List
        </a>
    </div>
@endsection
