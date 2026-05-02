<?php

namespace App\Http\Controllers;

use App\Models\Underwrite;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnderwriteController
{
    public function index()
    {
        $underwrite = Underwrite::first();

        return Inertia::render('UnderWrite/Edit', ['underwrite' => $underwrite]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description_one' => 'required|string|max:255',
            'description_two' => 'required|string|max:255',
            'qoute' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'author_position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $underwrite = Underwrite::first();
        $underwrite->title = $request->title;
        $underwrite->description_one = $request->description_one;
        $underwrite->description_two = $request->description_two;
        $underwrite->qoute = $request->qoute;
        $underwrite->author_name = $request->author_name;
        $underwrite->author_position = $request->author_position;

        if (request()->hasFile('image')) {
            if ($underwrite->image) {
                unlink(public_path('Underwrite/'.$underwrite->image));
            }

            $image = request()->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('Underwrite'), $imageName);
            $underwrite->image = $imageName;
        }

        if (request()->hasFile('author_image')) {
            if ($underwrite->author_image) {
                unlink(public_path('Underwrite/'.$underwrite->author_image));
            }

            $author_image = request()->file('author_image');
            $imageName = time().'_'.$author_image->getClientOriginalName();
            $author_image->move(public_path('Underwrite'), $imageName);
            $underwrite->author_image = $imageName;
        }

        $underwrite->save();

        return redirect()->route('underwrite.index')->with('success', 'Underwrite updated successfully.');
    }
}
