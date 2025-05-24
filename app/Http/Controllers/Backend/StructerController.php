<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Structer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StructerController extends Controller
{
    public function index()
    {
        $structers = Structer::withCount('posts')->paginate(4);

        return view('structers.all-structer', compact('structers'));
    }

    public function create()
    {
        return view('structers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:structers,name',
        ]);

        Structer::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('structers.index')
                         ->with('status', 'New Structer Added Successfully.');
    }

    public function show(Structer $structer)
    {
         $structer->loadCount('posts');
        return view('structers.show', compact('structer'));
    }

    public function edit(Structer $structer)
    {
        return view('structers.edit', compact('structer'));
    }

    public function update(Request $request, Structer $structer)
    {
        $request->validate([
            'name' => 'required|string|unique:structers,name,' . $structer->id,
        ]);

        $structer->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('structers.index')
                         ->with('status', 'Structer Updated Successfully.');
    }

    public function destroy(Structer $structer)
    {
        $structer->delete();

        return redirect()->route('structers.index')
                         ->with('status', 'Structer Deleted Successfully.');
    }
}
