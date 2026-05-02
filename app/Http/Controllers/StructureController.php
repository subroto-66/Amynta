<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class StructureController
{
    public function index()
    {
        $structures = Structure::orderBy('id', 'desc')->get();
        return Inertia::render('Structure/Index', ['structures' => $structures]);
    }

    public function create()
    {
        return Inertia::render('Structure/Create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'count_number' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $structure = new Structure();
        $structure->count_number = $request->count_number;
        $structure->title = $request->title;

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('structure'), $imageName);
            $structure->image = $imageName;
        }

        $structure->save();

        return redirect()->route('structure.index')->with('success', 'Structure created successfully.');
    }

    public function edit($id)
    {
        $structure = Structure::find($id);
        return Inertia::render('Structure/Edit', ['structure' => $structure]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'count_number' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $structure = Structure::find($id);
        $structure->count_number = $request->count_number;
        $structure->title = $request->title;

        if (request()->hasFile('image')) {
            if ($structure->image) {
                unlink(public_path('structure/'.$structure->image));
            }

            $image = request()->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('structure'), $imageName);
            $structure->image = $imageName;
        }

        $structure->save();

        return redirect()->route('structure.index')->with('success', 'Structure updated successfully.');
    }

    public function destroy($id)
    {
        $structure = Structure::find($id);

        if ($structure->image) {
            unlink(public_path('structure/'.$structure->image));
        }

        $structure->delete();
        return redirect()->route('structure.index')->with('success', 'Structure deleted successfully.');
    }
}
