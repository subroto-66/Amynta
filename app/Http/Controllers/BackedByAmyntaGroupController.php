<?php

namespace App\Http\Controllers;

use App\Models\BackedByAmyntaGroup;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BackedByAmyntaGroupController
{
    public function index()
    {
        $backedAmynta = BackedByAmyntaGroup::first();
        $items = Item::where('section_name', 'backed_by_amynta_group')->get();

        return Inertia::render('BackedByAmyntaGroup/Edit', [
            'backedAmynta' => $backedAmynta,
            'items' => $items,
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'highlight_title' => 'required|string',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',
            'item_title' => 'nullable|string',

            'items' => 'required|array|min:1',
            'items.*.title' => 'required|string',
            'items.*.image' => 'required',
        ]);

        $backedAmynta = BackedByAmyntaGroup::first();
        $backedAmynta->highlight_title = $request->highlight_title;
        $backedAmynta->description_one = $request->description_one;
        $backedAmynta->description_two = $request->description_two;
        $backedAmynta->item_title = $request->item_title;
        $backedAmynta->save();

        Item::where('section_name', 'backed_by_amynta_group')->delete();

        foreach ($request->items as $item) {

            Item::create([
                'section_name' => 'backed_by_amynta_group',
                'title' => $item['title'],
                'image' => $item['image'],
            ]);
        }

        return redirect()->route('backedAmyntaGroup.index')->with('message', 'Backed by Amynta Group settings updated successfully.');
    }
}
