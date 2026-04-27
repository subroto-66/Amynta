<?php

namespace App\Http\Controllers;

use App\Models\SpecialtyRisk;
use Illuminate\Http\Request;


class SpecialtyRiskController
{
    public function index()
    {
        $specialtyRisks = SpecialtyRisk::all();
        return inertia('SpecialtyRisk/Index', [
            'specialtyRisks' => $specialtyRisks,
        ]);
    }

    public function create()
    {
        return inertia('SpecialtyRisk/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'index' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $specialtyRisk = new SpecialtyRisk();
        $specialtyRisk->index = $request->index;
        $specialtyRisk->title = $request->title;
        $specialtyRisk->description = $request->description;
        $specialtyRisk->save();

        return redirect()->route('specialty-risk.index')->with('success', 'Specialty Risk created successfully.');
    }

    public function edit($id)
    {
        $specialtyRisk = SpecialtyRisk::find($id);
        return inertia('SpecialtyRisk/Edit', [
            'specialtyRisk' => $specialtyRisk,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'index' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $specialtyRisk = SpecialtyRisk::find($id);
        $specialtyRisk->index = $request->index;
        $specialtyRisk->title = $request->title;
        $specialtyRisk->description = $request->description;
        $specialtyRisk->save();

        return redirect()->route('specialty-risk.index')->with('success', 'Specialty Risk updated successfully.');
    }

    public function destroy($id)
    {
        $specialtyRisk = SpecialtyRisk::find($id);
        $specialtyRisk->delete();
        return redirect()->route('specialty-risk.index')->with('success', 'Specialty Risk deleted successfully.');
    }
}
