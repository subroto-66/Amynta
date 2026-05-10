<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnderwritingApproach;
use Inertia\Inertia;

class UnderwritingApproachController
{
    public function index()
    {
        $underwritingApproach = UnderwritingApproach::orderBy('id', 'desc')->get();

        return Inertia::render('UnderwritingApproach/Index', [
            'underwritingApproaches' => $underwritingApproach,
        ]);
    }

    public function create()
    {
        return Inertia::render('UnderwritingApproach/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'number' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:svg|max:2048',
        ]);

       $underwritingApproach = new UnderwritingApproach();
       $underwritingApproach->title = $request->title;
       $underwritingApproach->number = $request->number;
       $underwritingApproach->description = $request->description;

       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imageName = time().'_'.$image->getClientOriginalName();
           $image->move(public_path('underwritingApproach'), $imageName);
           $underwritingApproach->image = $imageName;
      }

      $underwritingApproach->save();

      return redirect()->route('underwritingApproach.index')->with('message', 'Underwriting Approach created successfully.');
    }

    public function edit($id)
    {
        $underwritingApproach = UnderwritingApproach::findOrFail($id);

        return Inertia::render('UnderwritingApproach/Edit', [
            'underwritingApproach' => $underwritingApproach,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'number' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:svg|max:2048',
        ]);

        $underwritingApproach = UnderwritingApproach::find($id);
        $underwritingApproach->title = $request->title;
        $underwritingApproach->number = $request->number;
        $underwritingApproach->description = $request->description;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $oldImage = $underwritingApproach->image;
            if ($oldImage) {
                unlink(public_path('underwritingApproach').'/'.$oldImage);
            }
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('underwritingApproach'), $imageName);
            $underwritingApproach->image = $imageName;

        }

        $underwritingApproach->save();

        return redirect()->route('underwritingApproach.index')->with('message', 'Underwriting Approach updated successfully.');
    }

    public function destroy($id)
    {
        $underwritingApproach = UnderwritingApproach::findOrFail($id);
        $oldImage = $underwritingApproach->image;
        if ($oldImage) {
            unlink(public_path('underwritingApproach').'/'.$oldImage);
        }
        $underwritingApproach->delete();

        return redirect()->route('underwritingApproach.index')->with('message', 'Underwriting Approach deleted successfully.');
    }
}
