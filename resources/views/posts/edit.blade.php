@extends('backend.app')
@section('title', 'Edit Post')

@section('content')

<h2 class="mt-16 text-2xl font-semibold">Edit Post</h2>
<a href="{{ route('posts.index') }}" class="text-white px-2 py-1 text-sm rounded-md bg-green-600 hover:bg-green-700 my-2 inline-block">
    <span class="material-symbols-outlined align-middle text-xs mx-2">arrow_back_ios</span>Back
</a>

<form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data" class="w-full bg-white p-6 rounded-lg shadow space-y-4">
    @csrf
    @method('PUT')

  <!-- Title -->
<div>
    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Post Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Description -->
<div>
    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
    <textarea id="description" name="description" rows="10"
              class="w-full border border-gray-300 rounded p-2">{{ old('description', $post->description) }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Category -->
<div>
    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
    <select name="category" id="category"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Framework -->
<div>
    <label for="framework" class="block text-sm font-medium text-gray-700 mb-1">Framework</label>
    <select name="framework" id="framework"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Select Framework</option>
        @foreach ($frameworks as $framework)
            <option value="{{ $framework->id }}" {{ old('framework', $post->framework_id) == $framework->id ? 'selected' : '' }}>
                {{ $framework->name }}
            </option>
        @endforeach
    </select>
    @error('framework')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Topic -->
<div>
    <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Topic</label>
    <select name="topic" id="topic"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach ($topics as $topic)
            <option value="{{ $topic->id }}" {{ old('topic', $post->topic_id) == $topic->id ? 'selected' : '' }}>
                {{ $topic->name }}
            </option>
        @endforeach
    </select>
    @error('topic')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Structer -->
<div>
    <label for="structer" class="block text-sm font-medium text-gray-700 mb-1">Structer</label>
    <select name="structer" id="structer"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach ($structers as $structer)
            <option value="{{ $structer->id }}" {{ old('structer', $post->structer_id) == $structer->id ? 'selected' : '' }}>
                {{ $structer->name }}
            </option>
        @endforeach
    </select>
    @error('structer')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
     {{-- Code --}}
     <div>
        <label class="block font-semibold">Code</label>
        <textarea name="code" class="w-full p-2 border font-mono rounded" rows="8" required>{{ old('code', $post->code) }}</textarea>
        @error('code') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

<!-- Image -->
<div>
    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
    <input type="file" name="image"
           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none" />
    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

    <!-- Submit -->
    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Update
    </button>
</form>

@endsection

@push('scripts')
<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/geb2o1qxfu1e6ygw5i81yv3l1mrmai8c6sdxx4wn6lwhdlm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    // TinyMCE for description
    tinymce.init({
        selector: '#description',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
        height: 300,
        valid_elements: 'p,b,strong,i,em,u,ul,ol,li,a[href|target],img[src|alt|width|height],table,tr,td,th,thead,tbody,tfoot,br,span[style]',
        invalid_elements: 'script,iframe,object,embed',
        convert_urls: false,
        forced_root_block: 'p',
        force_p_newlines: true,
        cleanup: true,
        verify_html: true,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
@endpush
