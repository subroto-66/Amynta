<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController
{
    public function index()
    {

        return Inertia::render('UnderWrite/Items/Index');
    }

    public function create()
    {
        return Inertia::render('UnderWrite/Items/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $item = new Item();
        $item->title = $request->title;
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('Underwrite'), $imageName);
            $item->image = $imageName;
        }

        $item->save();

        return Inertia::render('UnderWrite/Items/Index');
    }

    public function edit($id)
    {
        return Inertia::render('UnderWrite/Items/Edit');
    }

    public function update(Request $request, $id)
    {
        return Inertia::render('UnderWrite/Items/Index');
    }

    public function destroy($id)
    {
        return Inertia::render('UnderWrite/Items/Index');
    }
}
