<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotConfusion;
use App\Models\Item;
use Inertia\Inertia;

class NotConfusionController
{
    public function index()
    {
        $notConfusion = NotConfusion::first();
        $items = Item::where('section_name', 'not_confusion')->get();

        return Inertia::render('NotConfusion/Edit', [
            'notConfusion' => $notConfusion,
            'items' => $items
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([

            'title'=> 'required',
            'description_one'=> 'required',
            'description_two'=> 'required',
            'button_text'=> 'required',
            'button_link'=> 'required',
            'understanding_title'=> 'required',
            'understanding_item_one'=> 'required',
            'understanding_item_two'=> 'required',
            'understanding_item_three' => 'required',

            'items' => 'required|array',
            'items.*.title' => 'required|string|max:255',
            'items.*.image' => 'required',
        ]);

        $notConfusion = NotConfusion::first();
        $notConfusion->title = $request->title;
        $notConfusion->description_one = $request->description_one;
        $notConfusion->description_two = $request->description_two;
        $notConfusion->button_text = $request->button_text;
        $notConfusion->button_link = $request->button_link;
        $notConfusion->understanding_title = $request->understanding_title;
        $notConfusion->understanding_item_one = $request->understanding_item_one;
        $notConfusion->understanding_item_two = $request->understanding_item_two;
        $notConfusion->understanding_item_three = $request->understanding_item_three;
        $notConfusion->save();

        Item::where('section_name', 'not_confusion')->delete();

        foreach ($request->items as $item) {

            Item::create([
                'section_name' => 'not_confusion',
                'title' => $item['title'],
                'image' => $item['image'],
            ]);
        }

        return redirect()->route('notConfusion.index')->with('success', 'Not Confusion updated successfully.');
    }
}
