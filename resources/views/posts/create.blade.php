@extends('backend.app')
@section('title', 'Create Post')

@section('content')
<h2 class="mt-16 text-2xl font-semibold">Add Post</h2>
<a href="/dashboard" class="text-white px-2 py-1 text-sm rounded-md bg-green-600 hover:bg-green-700 my-2 inline-block">
    <span class="material-symbols-outlined align-middle text-xs mx-2">arrow_back_ios</span>Back
</a>

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="w-full bg-white p-6 rounded-lg shadow space-y-4">
    @csrf

    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Post Title</label>
        <input type="text" id="title" name="title" placeholder="Enter post title"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description" class="w-full border border-gray-300 rounded p-2" rows="10">
            {{ old('description', $post->description ?? '') }}
        </textarea>
    </div>

    <!-- Category -->
    <div>
        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <select id="category" name="category"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Framework -->
    <div>
        <label for="framework" class="block text-sm font-medium text-gray-700 mb-1">Framework</label>
        <select id="framework" name="framework"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($frameworks as $framework)
                <option value="{{ $framework->id }}">{{ $framework->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Topic -->
    <div>
        <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Topic</label>
        <select id="topic" name="topic"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
            @endforeach
            @foreach($frameworks as $framework)
            <option value="{{ $framework->id }}">{{ $framework->name }}</option>
             @endforeach
        </select>
    </div>

    <!-- Structer -->
    <div>
        <label for="structer" class="block text-sm font-medium text-gray-700 mb-1">Structer</label>
        <select id="structer" name="structer"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach($structers as $structer)
                <option value="{{ $structer->id }}">{{ $structer->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Code -->
    <div>
        <label for="code" class="block text-sm font-medium text-gray-700 mb-1">Code (Optional)</label>
        <textarea id="code" name="code" rows="6"
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Paste your code here..."></textarea>
    </div>

    <!-- Image -->
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image (Optional)</label>
        <input type="file" id="image" name="image"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <!-- Submit -->
    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Submit
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
