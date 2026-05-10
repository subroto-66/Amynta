<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController
{
    public function index()
    {
        $specialists = Specialist::orderBy('id', 'desc')->get();

        return Inertia('Specialist/Index', ['specialists' => $specialists]);
    }

    public function create()
    {
        return Inertia('Specialist/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('specalists'), $imageName);
        }

        $specialist = new Specialist;
        $specialist->name = $request->name;
        $specialist->position = $request->position;
        $specialist->image = $imageName;
        $specialist->status = $request->status;
        $specialist->save();

        return redirect()->route('specialists.index')->with('message', 'Specalist created successfully.');
    }

    public function edit($id)
    {
        $specialist = Specialist::findOrFail($id);

        return Inertia('Specialist/Edit', ['specialist' => $specialist]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
        ]);

        $specialist = Specialist::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($specialist->image) {
                $imagePath = public_path('specalists/'.$specialist->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('specalists'), $imageName);

            $specialist->image = $imageName;
        }

        $specialist->name = $request->name;
        $specialist->position = $request->position;
        $specialist->status = $request->status;
        $specialist->save();

        return redirect()->route('specialists.index')->with('message', 'Specialist updated successfully.');
    }

    public function destroy($id)
    {
       $specialist = Specialist::findOrFail($id);
        
        if ($specialist->image) {
            $imagePath = public_path('specalists/'.$specialist->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $specialist->delete();

        return redirect()->route('specialists.index')->with('message', 'Specialist deleted successfully.');
    }
}
