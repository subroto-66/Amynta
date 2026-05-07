<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoreReinsuranceSolution;
use Inertia\Inertia;
use App\Models\Item;

class CoreReinsuranceSolutionController
{
    public function index()
    {
        $coreReinsuranceSolution = CoreReinsuranceSolution::first();
        $items = Item::where('section_name', 'core_reinsurance_solution')->get();

        return Inertia::render('CoreReinsuranceSolution/Edit', [
            'coreReinsuranceSolution' => $coreReinsuranceSolution,
            'items' => $items
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'subtitle' => 'required',
            'excess_title' => 'required',
            'excess_description' => 'required',
            'proportional_title' => 'required',
            'proportional_description' => 'required',

            'items' => 'required|array',
            'items.*.title' => 'required|string|max:255',
            'items.*.image' => 'required'

        ]);

        $coreReinsuranceSolution = CoreReinsuranceSolution::first();
        $coreReinsuranceSolution->title = $request->title;
        $coreReinsuranceSolution->subtitle = $request->subtitle;
        $coreReinsuranceSolution->excess_title = $request->excess_title;
        $coreReinsuranceSolution->excess_description = $request->excess_description;
        $coreReinsuranceSolution->proportional_title = $request->proportional_title;
        $coreReinsuranceSolution->proportional_description = $request->proportional_description;
        $coreReinsuranceSolution->save();

        Item::where('section_name', 'core_reinsurance_solution')->delete();

        foreach ($request->items as $item) {

            Item::create([
                'section_name' => 'core_reinsurance_solution',
                'title' => $item['title'],
                'image' => $item['image'],
            ]);
        }

        return redirect()->route('coreReinsuranceSolution.index')->with('success', 'Core Reinsurance Solution updated successfully.');
    }
}
