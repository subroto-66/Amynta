<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StructuredSolution;
use Inertia\Inertia;

class StructuredSolutionController
{
    public function index()
    {
        $structuredSolutions = StructuredSolution::orderBy('id', 'desc')->get();
        return Inertia::render('StructuredSolution/Index', [
            'structuredSolutions' => $structuredSolutions,
        ]);
    }

    public function create()
    {
        return Inertia::render('StructuredSolution/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'svg_icon' => 'required',
        ]);

        $structuredSolution = new StructuredSolution();
        $structuredSolution->title = $request->title;
        $structuredSolution->description = $request->description;
        $structuredSolution->svg_icon = $request->svg_icon;
        $structuredSolution->save();

        return redirect()->route('structuredSolution.index')->with('message', 'Structured Solution created successfully.');
    }

    public function edit($id)
    {
        $structuredSolution = StructuredSolution::find($id);

        return Inertia::render('StructuredSolution/Edit', [
            'structuredSolution' => $structuredSolution,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'svg_icon' => 'required',
        ]);

        $structuredSolution = StructuredSolution::find($id);
        $structuredSolution->title = $request->title;
        $structuredSolution->description = $request->description;
        $structuredSolution->svg_icon = $request->svg_icon;
        $structuredSolution->save();

        return redirect()->route('structuredSolution.index')->with('message', 'Structured Solution updated successfully.');
    }

    public function destroy($id)
    {
        $structuredSolution = StructuredSolution::find($id);
        $structuredSolution->delete();

        return redirect()->route('structuredSolution.index')->with('message', 'Structured Solution deleted successfully.');
    }
}
