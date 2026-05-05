<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkController
{
    public function index()
    {
        $works = Work::all();

        return Inertia::render('Work/Index', [
            'work' => $works,
        ]);
    }

    public function create()
    {
        return Inertia::render('Work/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|mimes:svg|max:2048',
        ]);

        $work = new Work;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('work'), $imageName);
            $work->image = $imageName;
        }

        $work->title = $request->title;
        $work->save();

        return redirect()->route('work.index')->with('success', 'Work created successfully');
    }

    public function edit($id)
    {
        $work = Work::find($id);

        return Inertia::render('Work/Edit', [
            'work' => $work,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:svg|max:2048',
        ]);

        $work = Work::find($id);

        if ($request->hasFile('image')) {

            if ($work->image) {
                $imagePath = public_path('work/'.$work->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('work'), $imageName);

            $work->image = $imageName;
        }

        $work->title = $request->title;
        $work->save();

        return redirect()->route('work.index')->with('success', 'Work updated successfully');
    }

    public function destroy($id)
    {
        $work = Work::find($id);

        if ($work->image) {
            $imagePath = public_path('work/'.$work->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $work->delete();

        return redirect()->route('work.index')->with('success', 'Work deleted successfully');
    }
}
