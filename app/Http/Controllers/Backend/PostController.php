<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Framework;
use App\Models\Structer;
use App\Models\Topic;
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
        return view('posts.create', [
            'categories' => Category::all(),
            'frameworks' => Framework::all(),
            'topics'     => Topic::all(),
            'structers'  => Structer::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|exists:categories,id',
            'framework'   => 'required|exists:frameworks,id',
            'topic'       => 'required|exists:topics,id',
            'structer'    => 'required|exists:structers,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('uploads/posts', 'public')
            : null;

        Post::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'description'  => $request->description,
            'category_id'  => $request->category,
            'framework_id' => $request->framework,
            'topic_id'     => $request->topic,
            'structer_id'  => $request->structer,
            'code'         => $request->code,
            'image'        => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('status', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post'       => $post,
            'categories' => Category::all(),
            'frameworks' => Framework::all(),
            'topics'     => Topic::all(),
            'structers'  => Structer::all(),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|exists:categories,id',
            'framework'   => 'required|exists:frameworks,id',
            'topic'       => 'required|exists:topics,id',
            'structer'    => 'required|exists:structers,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('uploads/posts', 'public')
            : $post->image;

        $post->update([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title),
            'description'  => $request->description,
            'category_id'  => $request->category,
            'framework_id' => $request->framework,
            'topic_id'     => $request->topic,
            'structer_id'  => $request->structer,
            'code'         => $request->code,
            'image'        => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('status', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Post deleted successfully.');
    }

    // ✅ Filter by Topic (Frontend)
    public function filterByTopicFront($topicName)
    {
        $topic = Topic::whereRaw('LOWER(name) = ?', [strtolower($topicName)])->firstOrFail();
        $posts = Post::where('topic_id', $topic->id)->get();
        $topics = Topic::withCount('posts')->get();

        return view('filterpost', [
            'posts' => $posts,
            'topics' => $topics,
            'topicName' => ucfirst($topicName),
            'pageTitle' => ucfirst($topicName),
        ]);
    }

    // ✅ Filter by Framework (Frontend)
    public function filterByFrameworkFront($frameworkName)
    {
        $framework = Framework::whereRaw('LOWER(name) = ?', [strtolower($frameworkName)])->firstOrFail();
        $posts = Post::where('framework_id', $framework->id)->get();
        $frameworks = Framework::withCount('posts')->get();

        return view('filterpost', [
            'posts' => $posts,
            'frameworks' => $frameworks,
            'frameworkName' => ucfirst($frameworkName),
            'pageTitle' => ucfirst($frameworkName),
            'context' => 'framework',
        ]);
    }

    // ✅ Single Post View by Topic
    public function showFilteredPost($topicName, $slug)
    {
        $post = Post::where('slug', $slug)
                    ->whereHas('topic', function ($query) use ($topicName) {
                        $query->whereRaw('LOWER(name) = ?', [strtolower($topicName)]);
                    })->firstOrFail();

        $posts = Post::where('topic_id', $post->topic_id)->get();

        return view('single-post', [
            'post' => $post,
            'posts' => $posts,
            'pageTitle' => ucfirst($topicName),
        ]);
    }

    // ✅ Single Post View by Framework
    public function showFilteredPostByFramework($frameworkName, $slug)
    {
        $post = Post::where('slug', $slug)
                    ->whereHas('framework', function ($query) use ($frameworkName) {
                        $query->whereRaw('LOWER(name) = ?', [strtolower($frameworkName)]);
                    })->firstOrFail();

        $posts = Post::where('framework_id', $post->framework_id)->get();

        return view('single-post', [
            'post' => $post,
            'posts' => $posts,
            'pageTitle' => ucfirst($frameworkName),
            'context' => 'framework',
        ]);
    }
}
