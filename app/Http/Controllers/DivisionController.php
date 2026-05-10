<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Division;

class DivisionController
{
    public function index()
    {

        $divisions = Division::orderBy('id', 'desc')->get();
        return Inertia::render('Divisions/Index', [
            'divisions' => $divisions,
        ]);
    }

    public function create()
    {
        return Inertia::render('Divisions/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:svg|max:2048',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
        ]);

        $division = new Division();

        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('divisions'), $imageName);
            $division->image = $imageName;
        }


        $division->title = $request->title;
        $division->description = $request->description;
        $division->button_text = $request->button_text;
        $division->button_link = $request->button_link;
        $division->save();

        return redirect()->route('divisions.index')->with('message', 'Division created successfully.');
    }

    public function edit($id)
    {
        $division = Division::find($id);
        return Inertia::render('Divisions/Edit', [
            'division' => $division,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:svg|max:2048',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
        ]);

        $division = Division::find($id);


        if($request->hasFile('image')){

            if(file_exists(public_path('divisions/' . $division->image))){
                unlink(public_path('divisions/' . $division->image));
            }

            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('divisions'), $imageName);
            $division->image = $imageName;
        }


        $division->title = $request->title;
        $division->description = $request->description;
        $division->button_text = $request->button_text;
        $division->button_link = $request->button_link;
        $division->save();

        return redirect()->route('divisions.index')->with('message', 'Division updated successfully.');
    }

    public function destroy($id)
    {
        $division = Division::find($id);
        if(file_exists(public_path('divisions/' . $division->image))){
            unlink(public_path('divisions/' . $division->image));
        }
        $division->delete();

        return redirect()->route('divisions.index')->with('message', 'Division deleted successfully.');
    }
}
