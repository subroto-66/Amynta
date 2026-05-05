<?php

namespace App\Http\Controllers;

use App\Models\CoreCoverage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CoreCoverageController
{
    public function index()
    {
        $coreCoverage = CoreCoverage::orderBy('id', 'desc')->get();

        return Inertia::render('CoreCoverage/Index', [
            'coreCoverages' => $coreCoverage,
        ]);
    }

    public function create()
    {
        return Inertia::render('CoreCoverage/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'required',
        ]);

       $coreCoverage = new CoreCoverage();
       $coreCoverage->title = $request->title;
       $coreCoverage->description = $request->description;
       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imageName = time().'_'.$image->getClientOriginalName();
           $image->move(public_path('coreCoverage'), $imageName);
           $coreCoverage->image = $imageName;
      }

      $coreCoverage->save();

      return redirect()->route('coreCoverage.index')->with('success', 'Core Coverage created successfully.');
    }

    public function edit($id)
    {
        $coreCoverage = CoreCoverage::findOrFail($id);

        return Inertia::render('CoreCoverage/Edit', [
            'coreCoverage' => $coreCoverage,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $coreCoverage = CoreCoverage::find($id);
        $coreCoverage->title = $request->title;
        $coreCoverage->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $oldImage = $coreCoverage->image;
            if ($oldImage) {
                unlink(public_path('coreCoverage').'/'.$oldImage);
            }
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('coreCoverage'), $imageName);
            $coreCoverage->image = $imageName;
        }

        $coreCoverage->save();

        return redirect()->route('coreCoverage.index')->with('success', 'Core Coverage updated successfully.');
    }

    public function destroy($id)
    {
        $coreCoverage = CoreCoverage::findOrFail($id);
        $oldImage = $coreCoverage->image;
        if ($oldImage) {
            unlink(public_path('coreCoverage').'/'.$oldImage);
        }
        $coreCoverage->delete();

        return redirect()->route('coreCoverage.index')->with('success', 'Core Coverage deleted successfully.');
    }
}
