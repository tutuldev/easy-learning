<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Framework;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrameworkController extends Controller
{

    public function index()
    {
        $frameworks = Framework::withCount('posts')->paginate(4);
        return view("frameworks.all-framework", compact("frameworks"));
    }


    public function create()
    {
        return view('frameworks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:frameworks,name',
            'description' => 'required|string',

        ]);

        Framework::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description'  => $request->description,

        ]);

        return redirect()->route('frameworks.index')
                         ->with('status', 'New Framework Added Successfully.');
    }


    public function show(Framework $framework)
    {
         $framework->loadCount('posts');
        return view('frameworks.show', compact('framework'));
    }


    public function edit(Framework $framework)
    {
        return view('frameworks.edit', compact('framework'));
    }


    public function update(Request $request, Framework $framework)
    {
        $request->validate([
            'name' => 'required|string|unique:frameworks,name,' . $framework->id,
            'description' => 'required|string',

        ]);

        $framework->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description'  => $request->description,

        ]);

        return redirect()->route('frameworks.index')
                         ->with('status', 'Framework Updated Successfully.');
    }


    public function destroy(Framework $framework)
    {
        $framework->delete();

        return redirect()->route('frameworks.index')
                         ->with('status', 'Framework Deleted Successfully.');
    }
}
