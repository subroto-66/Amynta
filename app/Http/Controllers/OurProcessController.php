<?php

namespace App\Http\Controllers;

use App\Models\OurProcess;
use Illuminate\Http\Request;

class OurProcessController
{
    public function index()
    {
        $ourProcess = OurProcess::orderBy('id', 'asc')->get();

        return inertia('OurProcess/Index', [
            'ourProcess' => $ourProcess,
        ]);
    }

    public function create()
    {
        return inertia('OurProcess/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'svg_icon' => 'required|mimes:svg|max:2048',
        ]);

        $ourProcess = new OurProcess;

        if (request()->hasFile('svg_icon')) {

            $image = request()->file('svg_icon');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('ourProcess'), $imageName);
            $ourProcess->svg_icon = $imageName;

        }

        $ourProcess->number = $request->number;
        $ourProcess->title = $request->title;
        $ourProcess->description = $request->description;
        $ourProcess->save();

        return redirect()->route('ourProcess.index')->with('success', 'Our Process created successfully.');
    }

    public function edit($id)
    {
        $ourProcess = OurProcess::find($id);

        return inertia('OurProcess/Edit', [
            'ourProcess' => $ourProcess,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required',
            'title' => 'required',
            'description' => 'required',
            'svg_icon' => 'nullable|mimes:svg|max:2048',
        ]);

        $ourProcess = OurProcess::find($id);

        if (request()->hasFile('svg_icon')) {

            $image = request()->file('svg_icon');
            if ($ourProcess->svg_icon) {
                unlink(public_path('ourProcess').'/'.$ourProcess->svg_icon);
            }

            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('ourProcess'), $imageName);
            $ourProcess->svg_icon = $imageName;

        }

        $ourProcess->number = $request->number;
        $ourProcess->title = $request->title;
        $ourProcess->description = $request->description;
        $ourProcess->save();

        return redirect()->route('ourProcess.index')->with('success', 'Our Process updated successfully.');
    }

    public function destroy($id)
    {
        $ourProcess = OurProcess::find($id);

        if ($ourProcess->svg_icon) {
            unlink(public_path('ourProcess').'/'.$ourProcess->svg_icon);
        }
        $ourProcess->delete();

        return redirect()->route('ourProcess.index')->with('success', 'Our Process deleted successfully.');
    }
}
