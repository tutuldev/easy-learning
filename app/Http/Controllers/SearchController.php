<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Framework;
use App\Models\Post;

class SearchController extends Controller
{
    public function searchAll(Request $request)
    {
        $q = trim($request->input('q'));

        if ($q === '') {
            return response()->json([
                'topics' => [],
                'frameworks' => [],
                'posts' => [],
            ]);
        }

        // Topic গুলোর জন্য
        $topics = Topic::select('id', 'name')
            ->where('name', 'like', "%{$q}%")
            ->orderBy('name')
            ->get();

        // Framework গুলোর জন্য
        $frameworks = Framework::select('id', 'name')
            ->where('name', 'like', "%{$q}%")
            ->orderBy('name')
            ->get();

        // Post গুলোর জন্য — সাথে slug, topic/framework নাম এবং context পাঠানো হচ্ছে
        $posts = Post::select('id', 'title', 'slug', 'topic_id', 'framework_id')
            ->with(['topic:id,name', 'framework:id,name'])
            ->where('title', 'like', "%{$q}%")
            ->orderBy('title')
            ->limit(20)
            ->get()
            ->map(function ($post) {
                return [
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'context' => $post->framework ? 'framework' : 'topic',
                    'name' => $post->framework ? $post->framework->name : $post->topic->name,
                ];
            });

        return response()->json([
            'topics' => $topics,
            'frameworks' => $frameworks,
            'posts' => $posts,
        ]);
    }
}
