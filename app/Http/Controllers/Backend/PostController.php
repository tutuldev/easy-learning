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
        $categories = Category::all();
        $frameworks = Framework::all();
        $topics     = Topic::all();
        $structers  = Structer::all();

        return view('posts.create', compact('categories', 'frameworks', 'topics', 'structers'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|exists:categories,id',
            'framework'   => 'required|exists:frameworks,id',
            'topic'       => 'required|exists:topics,id',
            'structer'    => 'required|exists:structers,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
        }

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
        $topics     = Topic::all();
        $structers  = Structer::all();

        return view('posts.edit', compact('post', 'categories', 'frameworks', 'topics', 'structers'));
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

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
        }

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

        return redirect()->route('posts.index')
                         ->with('status', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('status', 'Post deleted successfully.');
    }

    // filter by topic for backend
    public function filterByTopicBack($topicName)
    {
        $posts = Post::whereHas('topic', function($query) use ($topicName) {
            $query->where('name', $topicName);
        })->get();

        return view('posts.filterpost', compact('posts', 'topicName'));
    }



    // filter by topic for frontend
    public function filterByTopicFront($topicName)
    {

        $topic = Topic::whereRaw('LOWER(name) = ?', [strtolower($topicName)])->first();

        if (!$topic) {
            abort(404, 'Topic not found');
        }

        $posts = Post::where('topic_id', $topic->id)->get();

        $topics = Topic::withCount('posts')->get();

        return view('filterpost', [
            'posts' => $posts,
            'topics' => $topics,
            'topicName' => ucfirst($topicName),
            'pageTitle' => ucfirst($topicName),
        ]);
    }






    // Filter by Category
    public function filterByCategory($categoryName)
    {
        $posts = Post::whereHas('category', function($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->get();

        return view('posts.filterpost', compact('posts', 'categoryName'));
    }

    // Filter by Structure
    public function filterByStructer($structerName)
    {
        $posts = Post::whereHas('structer', function($query) use ($structerName) {
            $query->where('name', $structerName);
        })->get();

        return view('posts.filterpost', compact('posts', 'structerName'));
    }

    // Filter by Framework
    public function filterByFramework($frameworkName)
    {
        $posts = Post::whereHas('framework', function($query) use ($frameworkName) {
            $query->where('name', $frameworkName);
        })->get();

        return view('posts.filterpost', compact('posts', 'frameworkName'));
    }
}

