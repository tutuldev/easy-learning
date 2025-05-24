@extends('backend.app')
@section('title', 'Edit - ' . $post->title)


@section('content')

  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
      <span class="material-symbols-outlined text-blue-500">edit</span>
      Edit Post
    </h2>
    <a href="javascript:history.back()" class="text-sm text-white bg-green-600 hover:bg-green-700 px-3 py-1 rounded-md flex items-center">
      <span class="material-symbols-outlined text-xs mr-1">arrow_back_ios</span>
      Back
    </a>
  </div>

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

<!-- Topic and framework both-->
<div>
    <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Topic</label>
    <select name="topic" id="topic"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach ($topics as $topic)
            <option value="{{ $topic->id }}" {{ old('topic', $post->topic_id) == $topic->id ? 'selected' : '' }}>
                {{ $topic->name }}
            </option>
        @endforeach
          @foreach ($frameworks as $framework)
            <option value="{{ $framework->id }}" {{ old('framework', $post->framework_id) == $framework->id ? 'selected' : '' }}>
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
{{-- Code Blocks --}}
<label class="block font-semibold mb-1">Code Blocks</label>

@php
    // যদি $post->code_titles আগেই array হয়, তাহলে সরাসরি ব্যবহার করুন, নইলে খালি অ্যারে দিন
    $codeTitles = is_array($post->code_titles) ? $post->code_titles : [];
    $codes = is_array($post->codes) ? $post->codes : [];
@endphp


@foreach ($codes as $index => $code)
    <div class="code-group mb-4 border p-3 rounded bg-gray-50">
        <input type="text" name="code_titles[]" class="w-full mb-2 px-3 py-2 border rounded"
               value="{{ $codeTitles[$index] ?? '' }}" placeholder="Code title (optional)">
        <textarea name="codes[]" rows="6"
                  class="w-full px-3 py-2 border rounded font-mono"
                  placeholder="Write your code here...">{{ $code }}</textarea>
        <div class="text-right mt-2">
            <button type="button"
                    class="remove-code-btn bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 text-sm">
                Remove
            </button>
        </div>
    </div>
@endforeach

<div id="code-blocks-wrapper"></div>

<button type="button" id="addCodeBtn"
        class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    + Add Code Block
</button>


<label class="block font-semibold mb-1 mt-6">Images</label>
<input type="file" name="images[]" id="images"
       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none"
       multiple>
@error('images')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror


{{-- Old Images (নিচে) --}}
<label id="oldImagesLabel" class="block font-semibold mb-1">Old Images</label>
<div id="existing-images" class="flex gap-3 flex-wrap mt-3">
    @foreach ($post->images as $img)
        <div class="relative w-24 h-24">
            <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover rounded shadow">
            <button type="button"
                    class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center old-del"
                    data-path="{{ $img }}">
                ✕
            </button>
        </div>
    @endforeach
</div>

{{-- for old image remove  --}}
<div id="removedImagesWrapper"></div>

<label id="new-images-label"
       class="font-semibold mb-1 mt-6 hidden">   {{-- hidden দিয়ে শুরু --}}
    New Images Preview
</label>
{{-- New Preview --}}
<div id="image-preview" class="flex gap-3 flex-wrap mt-2"></div>

    <!-- Submit -->
    <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
        Update Post
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
    // tinymce end

  // ==== CODE BLOCKS ====
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

document.addEventListener('click', e => {
    if (e.target.closest('.remove-code-btn')) {
        e.target.closest('.code-group').remove();
    }
});

// ==== IMAGE PREVIEW + REMOVE (New Images) ====
const fileInput = document.getElementById('images');
const previewBox = document.getElementById('image-preview');
let filesChosen = [];

fileInput.addEventListener('change', e => {
    filesChosen.push(...Array.from(e.target.files));
    renderThumbs();
    toggleNewImagesLabel();
});

function renderThumbs() {
    // প্রিভিউ বক্স পরিষ্কার
    previewBox.innerHTML = '';

    // নতুন FileList বানাতে DataTransfer
    const dt = new DataTransfer();

    // প্রতিটি নতুন ছবি লুপ
    filesChosen.forEach((file, idx) => {
        dt.items.add(file);   // FileList-এ যোগ করি

        const reader = new FileReader();
        reader.onload = ev => {
            // প্রতি ইমেজের wrapper div
            const wrap = document.createElement('div');
            wrap.className = 'relative w-24 h-24';

            // থাম্ব + ✕ বাটন
            wrap.innerHTML = `
                <img src="${ev.target.result}" class="w-full h-full object-cover rounded shadow">
                <button type="button" data-i="${idx}"
                        class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                    ✕
                </button>`;
            previewBox.appendChild(wrap);
        };
        reader.readAsDataURL(file);
    });

    // ইনপুটের FileList আপডেট
    fileInput.files = dt.files;

    // Tailwind label toggle for new images
    const lbl = document.getElementById('new-images-label'); // <label id="new-images-label" … hidden>
    if (filesChosen.length) {
        lbl.classList.remove('hidden');   // ছবি আছে → লেবেল দেখাও
    } else {
        lbl.classList.add('hidden');      // কোনো ছবি নেই → লুকাও
    }
}

// New images preview থেকে remove করার ইভেন্ট
previewBox.addEventListener('click', e => {
    const btn = e.target.closest('button[data-i]');
    if (!btn) return;
    const i = +btn.dataset.i;
    filesChosen.splice(i, 1);
    renderThumbs();
    toggleNewImagesLabel();
});

function toggleNewImagesLabel() {
    const newImagesLabel = document.querySelector('label[for="images"]');
    if (filesChosen.length === 0) {
        newImagesLabel.style.display = 'none';
    } else {
        newImagesLabel.style.display = 'block';
    }
}

// ==== OLD IMAGES REMOVE + HIDDEN INPUT + LABEL TOGGLE ====
const oldImagesLabel = document.getElementById('oldImagesLabel'); // পুরানো ইমেজের লেবেল
const existingImagesContainer = document.getElementById('existing-images');
const removedImagesWrapper = document.getElementById('removedImagesWrapper');
let removedOldImages = [];

existingImagesContainer.addEventListener('click', e => {
    const btn = e.target.closest('.old-del');
    if (!btn) return;

    const imgPath = btn.dataset.path; // data-path attribute থেকে আসবে
    removedOldImages.push(imgPath);

    // Hidden input form এ যুক্ত করি যাতে সার্ভারে ডাটা যায়
    const hidden = document.createElement('input');
    hidden.type = 'hidden';
    hidden.name = 'remove_images[]';
    hidden.value = imgPath;
    removedImagesWrapper.appendChild(hidden);

    // DOM থেকে ইমেজ remove
    btn.closest('div.relative').remove();

    // লেবেল টগল করবো একটু ডিলে দিয়ে যাতে DOM আপডেট হয়
    toggleOldImagesLabel();
});

function toggleOldImagesLabel() {
    setTimeout(() => {
        if (existingImagesContainer.children.length === 0) {
            oldImagesLabel.style.display = 'none';
        } else {
            oldImagesLabel.style.display = 'block';
        }
    }, 50);
}

// পেজ লোড হওয়ার সময় একবার লেবেল চেক করে নেয়া
toggleOldImagesLabel();
toggleNewImagesLabel();




</script>
@endpush
