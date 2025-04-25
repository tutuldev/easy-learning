@extends('backend.app')
@section('content')

<h2 class="mt-16 text-2xl font-semibold">Edit Post</h2>
<a href="{{ route('posts.index') }}" class="text-white px-2 py-1 text-sm rounded-md bg-green-600 hover:bg-green-700 my-2 inline-block">
    <span class="material-symbols-outlined align-middle text-xs mx-2">arrow_back_ios</span>Back
</a>

<form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data" class="w-full bg-white p-6 rounded-lg shadow">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $post->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <select name="category" id="category"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->name }}" {{ $post->category === $category->name ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="framework" class="block text-sm font-medium text-gray-700 mb-1">Framework</label>
        <select name="framework" id="framework"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select Framework</option>
            @foreach ($frameworks as $framework)
                <option value="{{ $framework->name }}" {{ $post->framework === $framework->name ? 'selected' : '' }}>
                    {{ $framework->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Language</label>
        <select name="language" id="language"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select Language</option>
            @foreach ($languages as $language)
                <option value="{{ $language->name }}" {{ $post->language === $language->name ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="structer" class="block text-sm font-medium text-gray-700 mb-1">Structer</label>
        <select name="structer" id="structer"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select Structer</option>
            @foreach ($structers as $structer)
                <option value="{{ $structer->name }}" {{ $post->structer === $structer->name ? 'selected' : '' }}>
                    {{ $structer->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="code" class="block text-sm font-medium text-gray-700 mb-1">Code</label>
        <textarea name="code" id="code" rows="4"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('code', $post->code) }}</textarea>
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
        @if ($post->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="h-20 rounded">
            </div>
        @endif
        <input type="file" name="image"
               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none">
    </div>

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
    // TinyMCE for description (rich text)
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
