<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Framework;
use App\Models\Language;
use App\Models\Structer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.all-post', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $frameworks = Framework::all();
        $languages  = Language::all();
        $structers  = Structer::all();

        return view('posts.create', compact('categories', 'frameworks', 'languages', 'structers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'required|string',
            'category'   => 'required|string',
            'framework'  => 'required|string',
            'language'   => 'required|string',
            'structer'   => 'required|string',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
        }

        Post::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'category'    => $request->category,
            'framework'   => $request->framework,
            'language'    => $request->language,
            'structer'    => $request->structer,
            'code'        => $request->code,
            'image'       => $imagePath,
        ]);

        return redirect()->route('posts.index')
                         ->with('status', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $frameworks = Framework::all();
        $languages  = Language::all();
        $structers  = Structer::all();

        return view('posts.edit', compact('post', 'categories', 'frameworks', 'languages', 'structers'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'required|string',
            'category'   => 'required|string',
            'framework'  => 'required|string',
            'language'   => 'required|string',
            'structer'   => 'required|string',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
        }

        $post->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'category'    => $request->category,
            'framework'   => $request->framework,
            'language'    => $request->language,
            'structer'    => $request->structer,
            'code'        => $request->code,
            'image'       => $imagePath,
        ]);

        return redirect()->route('posts.index')
                         ->with('status', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('status', 'Post deleted successfully.');
    }
}
