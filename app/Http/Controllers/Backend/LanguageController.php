<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LanguageController extends Controller
{

    public function index()
    {
        $languages = Language::paginate(3);
        return view("languages.all-language", compact("languages"));
    }


    public function create()
    {
        return view('languages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:languages,name',
        ]);

        Language::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('languages.index')
                         ->with('status','New Language Added Successfully.');
    }


    public function show(Language $language)
    {
        return view('languages.show', compact('language'));
    }


    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }


    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required|string|unique:languages,name,' . $language->id,
        ]);

        $language->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('languages.index')
                         ->with('status','Language Updated Successfully.');
    }


    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('languages.index')
                         ->with('status','Language Deleted Successfully.');
    }
}
