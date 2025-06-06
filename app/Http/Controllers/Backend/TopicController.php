<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function index()
    {
          $topics = Topic::withCount('posts')->paginate(4);
        return view("topics.all-topic", compact("topics"));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:topics,name',
            'description' => 'required|string',

        ]);

        Topic::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description'  => $request->description,

        ]);

        return redirect()->route('topics.index')
                         ->with('status','New Topic Added Successfully.');
    }

    public function show(Topic $topic)
    {
         $topic->loadCount('posts');
        return view('topics.show', compact('topic'));
    }

    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'name' => 'required|string|unique:topics,name,' . $topic->id,
            'description' => 'required|string',

        ]);

        $topic->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description'  => $request->description,

        ]);

        return redirect()->route('topics.index')
                         ->with('status','Topic Updated Successfully.');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')
                         ->with('status','Topic Deleted Successfully.');
    }
}
