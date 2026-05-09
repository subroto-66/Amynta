<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheProblem;
use App\Models\Item;
use Inertia\Inertia;

class TheProblemController
{
    public function index()
    {
        $theProblem = TheProblem::first();
        $items = Item::where('section_name', 'the_problem')->get();

        return Inertia::render('TheProblem/Edit', [
            'theProblem' => $theProblem,
            'items' => $items
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'subtitle' => 'required|string|max:255',
            'items' => 'required|array',
            'items.*.title' => 'required|string|max:255',
            'items.*.image' => 'required',
        ]);

        $theProblem = TheProblem::first();
        $theProblem->title = $request->title;
        $theProblem->description = $request->description;
        $theProblem->subtitle = $request->subtitle;
        $theProblem->save();

        Item::where('section_name', 'the_problem')->delete();

        foreach ($request->items as $item) {

            Item::create([
                'section_name' => 'the_problem',
                'title' => $item['title'],
                'image' => $item['image'],
            ]);
        }

        return redirect()->route('theProblem.index')->with('success', 'The problem updated successfully.');
    }
}
