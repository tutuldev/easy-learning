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
           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
           value="{{ old('title') }}" />
    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Description -->
<div>
    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
    <textarea id="description" name="description"
              class="w-full border border-gray-300 rounded p-2" rows="10">{{ old('description', $post->description ?? '') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Category -->
<div>
    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
    <select id="category" name="category"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
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
    <select id="framework" name="framework"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">No Framework</option>
        @foreach($frameworks as $framework)
            <option value="{{ $framework->id }}" {{ old('framework_id', optional($post)->framework_id) == $framework->id ? 'selected' : '' }}>
                {{ $framework->name }}
            </option>
        @endforeach
    </select>
    @error('framework')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Topic and framework both-->

<div>
    <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Topic</label>
    <select id="topic" name="topic"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach($topics as $topic)
            <option value="{{ $topic->id }}" {{ old('topic') == $topic->id ? 'selected' : '' }}>
                {{ $topic->name }}
            </option>
        @endforeach
         @foreach($frameworks as $framework)
            <option value="{{ $framework->id }}" {{ old('framework_id', optional($post)->framework_id) == $framework->id ? 'selected' : '' }}>
                {{ $framework->name }}
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
    <select id="structer" name="structer"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach($structers as $structer)
            <option value="{{ $structer->id }}" {{ old('structer') == $structer->id ? 'selected' : '' }}>
                {{ $structer->name }}
            </option>
        @endforeach
    </select>
    @error('structer')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Multiple Code Blocks with Titles -->
<div id="code-blocks-wrapper">
    <label class="block font-semibold text-gray-700 mb-1">Code Blocks</label>

    <div class="code-group mb-4 border p-3 rounded bg-gray-50 relative">
        <input type="text" name="code_titles[]" class="w-full mb-2 px-3 py-2 border rounded"
               placeholder="Code title (optional)">
        <textarea name="codes[]" rows="6"
                  class="w-full px-3 py-2 border rounded font-mono"
                  placeholder="Write your code here..."></textarea>

        <!-- ✅ Remove button: right-aligned, nice design -->
        <div class="text-right mt-2">
            <button type="button"
                    class="remove-code-btn bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm">
                Remove
            </button>
        </div>
    </div>
</div>

<button type="button" id="addCodeBtn"
        class="bg-green-500 text-white px-4 py-2 rounded mb-4 hover:bg-green-600">
    + Add Another Code Block
</button>



<!-- Multiple Image Upload with Preview and Remove -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Images (Optional)</label>
    <input type="file" id="images" name="images[]" multiple accept="image/*"
           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
           onchange="previewImages(event)" />

    <div id="image-preview" class="flex flex-wrap gap-3 mt-3"></div>

    @error('images.*')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
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

    // code section image field shadow
function codeTemplate() {
    return `
        <div class="code-group mb-4 border p-3 rounded bg-gray-50">
            <input type="text" name="code_titles[]" class="w-full mb-2 px-3 py-2 border rounded"
                   placeholder="Code title (optional)">
            <textarea name="codes[]" rows="6"
                      class="w-full px-3 py-2 border rounded font-mono"
                      placeholder="Write your code here..."></textarea>

            <div class="text-right mt-2">
                <button type="button"
                        class="remove-code-btn bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm">
                    Remove
                </button>
            </div>
        </div>`;
}


const codeWrapper = document.getElementById('code-blocks-wrapper');
document.getElementById('addCodeBtn').onclick = () => {
    codeWrapper.insertAdjacentHTML('beforeend', codeTemplate());
};

codeWrapper.addEventListener('click', e => {
    if (e.target.closest('.remove-code-btn')) {
        e.target.closest('.code-group').remove();
    }
});

/* ---------- IMAGE preview + remove ---------- */
const fileInput   = document.getElementById('images');          // id="images"
const previewBox  = document.getElementById('image-preview');   // div for thumbs
let   filesChosen = [];                                         // File[] array

fileInput.addEventListener('change', e => {
    filesChosen.push(...Array.from(e.target.files));
    renderThumbs();
});

function renderThumbs() {
    previewBox.innerHTML = '';
    const dt = new DataTransfer();

    filesChosen.forEach((file, idx) => {
        dt.items.add(file);

        const reader = new FileReader();
        reader.onload = ev => {
            const wrap = document.createElement('div');
            wrap.className = 'relative w-24 h-24';

            wrap.innerHTML = `
                <img src="${ev.target.result}" class="w-full h-full object-cover rounded shadow">
                <button type="button" data-i="${idx}"
                        class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                    ✕
                </button>`;
            previewBox.appendChild(wrap);
        };
        reader.readAsDataURL(file);
    });

    // update real FileList
    fileInput.files = dt.files;
}

// click to remove selected thumb
previewBox.addEventListener('click', e => {
    const btn = e.target.closest('button[data-i]');
    if (!btn) return;
    const i = +btn.dataset.i;
    filesChosen.splice(i, 1);
    renderThumbs();
});



</script>
@endpush
