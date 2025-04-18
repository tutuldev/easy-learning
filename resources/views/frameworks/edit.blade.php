@extends('backend.app')
@section('content')
<h2 class="text-2xl font-semibold mt-16">Edit Framework</h2>
<a href="/dashboard" class="text-white px-2 py-1 text-sm rounded-md bg-green-600 hover:bg-green-700 my-2 inline-block"><span class="material-symbols-outlined align-middle text-xs mx-2">arrow_back_ios</span>Back</a>

<form action="{{ route('frameworks.update', $framework->slug) }}" method="POST" class="max-w-sm  bg-white p-6 rounded-lg shadow">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Framework Name</label>
        <input type="text" id="name" name="name"
               value="{{ old('name', $framework->name) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Update
    </button>
</form>


@endsection

