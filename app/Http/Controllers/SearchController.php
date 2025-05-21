<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Framework;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // যদি কোনো ইনপুট না দেয়, খালি array ফেরত দাও
        if (!$q) {
            return response()->json([
                'topics' => [],
                'frameworks' => [],
            ]);
        }

        $topics = Topic::where('name', 'like', '%' . $q . '%')->get();
        $frameworks = Framework::where('name', 'like', '%' . $q . '%')->get();

        return response()->json([
            'topics' => $topics,
            'frameworks' => $frameworks,
        ]);
    }
}
