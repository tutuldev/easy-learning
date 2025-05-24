@extends('backend.app')
@section('title', 'Create Topic')

@section('content')
<div class="max-w-screen-2xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md border border-gray-100">

  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <span class="material-symbols-outlined text-blue-500">add_circle</span>
      Add New Topic
    </h2>
    <a href="/dashboard"
     class="text-sm text-white bg-green-600 hover:bg-green-700 px-3 py-1 rounded-md flex items-center">
      <span class="material-symbols-outlined text-xs mr-1">arrow_back_ios</span> Back
    </a>
  </div>

  <!-- Form -->
  <form action="{{ route('topics.store') }}" method="POST">
    @csrf

    <!-- Name -->
    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Topic Name</label>
      <input type="text" id="name" name="name" placeholder="Enter topic name"
         value="{{ old('name') }}"
         class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      @error('name')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
      <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
      <textarea id="description" name="description" rows="10"
           class="w-full border border-gray-300 rounded p-2">{{ old('description') }}</textarea>
      @error('description')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
      Create Topic
    </button>
  </form>
</div>
@endsection

@push('scripts')
<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/geb2o1qxfu1e6ygw5i81yv3l1mrmai8c6sdxx4wn6lwhdlm8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
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
