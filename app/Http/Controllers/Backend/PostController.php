<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Framework;
use App\Models\Structer;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'post' => new Post(), // নতুন Post Object পাঠানো
            'categories' => Category::all(),
            'frameworks' => Framework::all(),
            'topics'     => Topic::all(),
            'structers'  => Structer::all(),
        ]);
    }

  public function store(Request $request)
{
    $request->validate([
        'title'        => 'required|string|max:25',
        'description'  => 'required|string',
        'category'     => 'required|exists:categories,id',
        'framework'    => 'nullable|exists:frameworks,id',
        'topic'        => 'required|exists:topics,id',
        'structer'     => 'required|exists:structers,id',
        'code_titles'  => 'nullable|array',
        'code_titles.*'=> 'nullable|string|max:50',
        'codes'        => 'nullable|array',
        'codes.*'      => 'nullable|string',
        'images.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // multiple image upload
    $imagePaths = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {
            $imagePaths[] = $img->store('uploads/posts', 'public');
        }
    }

    Post::create([
        'title'        => $request->title,
        'slug'         => Str::slug($request->title),
        'description'  => $request->description,
        'category_id'  => $request->category,
        'framework_id' => $request->framework,
        'topic_id'     => $request->topic,
        'structer_id'  => $request->structer,
        'code_titles'  => $request->code_titles ?? [],
        'codes'        => $request->codes       ?? [],
        'images'       => $imagePaths,
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
        'title'         => 'required|string|max:25',
        'description'   => 'required|string',
        'category'      => 'required|exists:categories,id',
        'framework'     => 'nullable|exists:frameworks,id',
        'topic'         => 'required|exists:topics,id',
        'structer'      => 'required|exists:structers,id',
        'code_titles'   => 'nullable|array',
        'code_titles.*' => 'nullable|string|max:50',
        'codes'         => 'nullable|array',
        'codes.*'       => 'nullable|string',
        'images.*'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'remove_images' => 'nullable|array',
    ]);

    // পুরোনো ইমেজ
    $currentImages = $post->images ?? [];

    // 🗑️ remove_images থেকে যেগুলো আসছে, সেগুলো মুছে ফেলুন
    $removeList = $request->remove_images ?? [];

    foreach ($removeList as $delPath) {
        if (in_array($delPath, $currentImages)) {
            if (Storage::disk('public')->exists($delPath)) {
                Storage::disk('public')->delete($delPath);
            }
            $currentImages = array_filter($currentImages, fn($img) => $img !== $delPath);
        }
    }

    // 📥 নতুন ইমেজ এড করুন
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {
            $path = $img->store('uploads/posts', 'public');
            $currentImages[] = $path;
        }
    }

    // 🔄 Post আপডেট
    $post->update([
        'title'         => $request->title,
        'slug'          => Str::slug($request->title),
        'description'   => $request->description,
        'category_id'   => $request->category,
        'framework_id'  => $request->framework,
        'topic_id'      => $request->topic,
        'structer_id'   => $request->structer,
        'code_titles'   => $request->code_titles ?? [],
        'codes'         => $request->codes ?? [],
        'images'        => array_values($currentImages), // রি-ইনডেক্সড
    ]);

    return redirect()->route('posts.index')->with('status', 'Post updated successfully.');
}



    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', 'Post deleted successfully.');
    }

       // filter in  backend start
      // Filter by Topic
    public function filterByTopicBack($topicName)
{
    $posts   = Post::whereHas('topic', fn($q)=>$q->where('name',$topicName))
                   ->paginate(10);
    $title   = $topicName;
    $context = 'topic';
    return view('posts.filterpost', compact('posts','title','context'));
}

public function filterByCategory($categoryName)
{
    $posts   = Post::whereHas('category', fn($q)=>$q->where('name',$categoryName))
                   ->paginate(10);
    $title   = $categoryName;
    $context = 'category';
    return view('posts.filterpost', compact('posts','title','context'));
}

public function filterByStructer($structerName)
{
    $posts   = Post::whereHas('structer', fn($q)=>$q->where('name',$structerName))
                   ->paginate(10);
    $title   = $structerName;
    $context = 'structer';
    return view('posts.filterpost', compact('posts','title','context'));
}

public function filterByFramework($frameworkName)
{
    $posts   = Post::whereHas('framework', fn($q)=>$q->where('name',$frameworkName))
                   ->paginate(10);
    $title   = $frameworkName;
    $context = 'framework';
    return view('posts.filterpost', compact('posts','title','context'));
}

        // filter in  backend end


    public function filterByTopicFront($topicName)
    {
        $topic = Topic::whereRaw('LOWER(name) = ?', [strtolower($topicName)])->firstOrFail();
        $posts = Post::where('topic_id', $topic->id)->orderBy('id')->get();
        $topics = Topic::withCount('posts')->get();


        $currentIndex = $posts->search(fn($item) => request()->route('slug') == $item->slug);

        if ($currentIndex !== false) {
            $previousPost = ($currentIndex > 0) ? $posts[$currentIndex - 1] : null;
            $nextPost = ($currentIndex < $posts->count() - 1) ? $posts[$currentIndex + 1] : null;
        } else {
            $previousPost = null;
            $nextPost = $posts->first();
        }

        return view('filterpost', [
            'posts' => $posts,
            'topics' => $topics,
            'currentItem'  => $topic,
            'topicName' => ucfirst($topicName),
            'pageTitle' => ucfirst($topicName),
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'context' => 'topic',
        ]);
    }

    public function filterByFrameworkFront($frameworkName)
    {
        $framework = Framework::whereRaw('LOWER(name) = ?', [strtolower($frameworkName)])->firstOrFail();
        $posts = Post::where('framework_id', $framework->id)->orderBy('id')->get();
        $frameworks = Framework::withCount('posts')->get();


        $currentIndex = $posts->search(fn($item) => request()->route('slug') == $item->slug);

        if ($currentIndex !== false) {
            $previousPost = ($currentIndex > 0) ? $posts[$currentIndex - 1] : null;
            $nextPost = ($currentIndex < $posts->count() - 1) ? $posts[$currentIndex + 1] : null;
        } else {
            $previousPost = null;
            $nextPost = $posts->first();
        }

        return view('filterpost', [
            'posts' => $posts,
            'frameworks' => $frameworks,
             'currentItem'  => $framework,
            'frameworkName' => ucfirst($frameworkName),
            'pageTitle' => ucfirst($frameworkName),
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'context' => 'framework',
        ]);
    }


    public function showFilteredPost($topicName, $slug)
    {
        $post = Post::where('slug', $slug)
                    ->whereHas('topic', function ($query) use ($topicName) {
                        $query->whereRaw('LOWER(name) = ?', [strtolower($topicName)]);
                    })->firstOrFail();

        $posts = Post::where('topic_id', $post->topic_id)->orderBy('id')->get();

        $currentIndex = $posts->search(fn($item) => $item->id === $post->id);


        $previousPost = ($currentIndex > 0) ? $posts[$currentIndex - 1] : (object) ['topic' => (object) ['name' => $topicName], 'slug' => ''];

        $nextPost = ($currentIndex < $posts->count() - 1) ? $posts[$currentIndex + 1] : null;

        return view('single-post', [
            'post' => $post,
            'posts' => $posts,
            'pageTitle' => ucfirst($topicName),
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'context' => 'topic',
        ]);
    }

    public function showFilteredPostByFramework($frameworkName, $slug)
    {
        $post = Post::where('slug', $slug)
                    ->whereHas('framework', function ($query) use ($frameworkName) {
                        $query->whereRaw('LOWER(name) = ?', [strtolower($frameworkName)]);
                    })->firstOrFail();

        $posts = Post::where('framework_id', $post->framework_id)->orderBy('id')->get();

        $currentIndex = $posts->search(fn($item) => $item->id === $post->id);


        $previousPost = ($currentIndex > 0) ? $posts[$currentIndex - 1] : (object) ['framework' => (object) ['name' => $frameworkName], 'slug' => ''];

        $nextPost = ($currentIndex < $posts->count() - 1) ? $posts[$currentIndex + 1] : null;

        return view('single-post', [
            'post' => $post,
            'posts' => $posts,
            'pageTitle' => ucfirst($frameworkName),
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
            'context' => 'framework',
        ]);
    }


}
