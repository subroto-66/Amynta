<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BackedStrengthAmynta;
use Inertia\Inertia;

class BackedStrengthAmyntaController
{

    public function index()
    {
        $backedStrength = BackedStrengthAmynta::first();
        return Inertia::render('BackedStrengthAmynta/Edit', [
            'backedStrength' => $backedStrength,
        ]);
    }

    public function update(Request $request)
    {
        $backedStrength = BackedStrengthAmynta::first();
        $backedStrength->highlight_title = $request->highlight_title;
        $backedStrength->description = $request->description;
        $backedStrength->item_title = $request->item_title;
        $backedStrength->item_one = $request->item_one;
        $backedStrength->item_two = $request->item_two;
        $backedStrength->item_three = $request->item_three;
        $backedStrength->item_four = $request->item_four;
        $backedStrength->save();

        return redirect()->route('backedStrength.index')->with('success', 'Others Settings updated successfully.');
    }


}
