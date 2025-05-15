@extends('backend.app')
@section('title', 'Edit Topic')

@section('content')
<h2 class="text-2xl font-semibold mt-16">Edit Topic</h2>
<a href="/dashboard" class="text-white px-2 py-1 text-sm rounded-md bg-green-600 hover:bg-green-700 my-2 inline-block">
    <span class="material-symbols-outlined align-middle text-xs mx-2">arrow_back_ios</span>Back
</a>

<form action="{{ route('topics.update', $topic->slug) }}" method="POST" class=" bg-white p-6 rounded-lg shadow">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Topic Name</label>
        <input type="text" id="name" name="name"
               value="{{ old('name', $topic->name) }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>
    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea id="description" name="description" rows="10"
                class="w-full border border-gray-300 rounded p-2">{{ old('description', $topic->description) }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
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
