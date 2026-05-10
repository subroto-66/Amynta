<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBuilt;

class ModelBuiltController
{
    public function index()
    {
        $modelBuilt = ModelBuilt::all();
        return inertia('ModelBuilt/Index', [
            'modelBuilt' => $modelBuilt,
        ]);
    }

    public function create()
    {
        return inertia('ModelBuilt/Create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'svg_icon' => 'nullable|mimes:svg|max:2048',

        ]);

        $modelBuilt = new ModelBuilt();
        $modelBuilt->title = $request->title;
        $modelBuilt->description = $request->description;

        if (request()->hasFile('svg_icon')) {
            if ($modelBuilt->svg_icon) {
                unlink(public_path('ModelBuilt/'.$modelBuilt->svg_icon));
            }

            $image = request()->file('svg_icon');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('ModelBuilt'), $imageName);
            $modelBuilt->svg_icon = $imageName;
        }

        $modelBuilt->save();
        
        return redirect()->route('modelBuilt.index')->with('message', 'Model Built created successfully.');
    }

    public function edit($id)
    {
        $modelBuilt = ModelBuilt::find($id);
        return inertia('ModelBuilt/Edit', [
            'modelBuilt' => $modelBuilt,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'svg_icon' => 'nullable|mimes:svg|max:2048',
            
        ]);

        $modelBuilt = ModelBuilt::first();
        $modelBuilt->title = $request->title;
        $modelBuilt->description = $request->description;

        if (request()->hasFile('svg_icon')) {

            $image = request()->file('svg_icon');
            if ($modelBuilt->svg_icon) {
                unlink(public_path('ModelBuilt/'.$modelBuilt->svg_icon));
            }

            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('ModelBuilt'), $imageName);
            $modelBuilt->svg_icon = $imageName;
        }

        $modelBuilt->save();
        
        return redirect()->route('modelBuilt.index')->with('message', 'Model Built updated successfully.');
    }

    public function destroy($id)
    {
        $modelBuilt = ModelBuilt::find($id);
        $modelBuilt->delete();
        return redirect()->route('modelBuilt.index')->with('message', 'Model Built deleted successfully.');

    }
}
