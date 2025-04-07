<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Framework;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frameworks = Framework::paginate(4);
        return view("frameworks.all-framework", compact("frameworks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frameworks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        Framework::create([
            'name' => $request->name,
        ]);

        return redirect()->route('frameworks.index')
                        ->with('status','New Framework Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $framework = Framework::findOrFail($id);
        return view('frameworks.edit',compact('framework'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $framework =Framework::where('id',$id)
        ->update([
            'name' => $request->name,
        ]);

        return redirect()->route('frameworks.index')
        ->with('status','Framework Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $frameworks=Framework::find($id);
        $frameworks->delete();
        return redirect()->route('categories.index')
        ->with('status','Framework Deleted Successfully.');
    }
}
