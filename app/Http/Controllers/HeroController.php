<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController
{

    public function edit()
    {
       $hero = Hero::first();
        return inertia('Hero/Edit', [
            'hero' => $hero,
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'highlight_text' => 'required',
            'description' => 'required',
            'primary_button_text' => 'required',
            'primary_button_link' => 'required',
            'secondary_button_text' => 'required',
            'secondary_button_link' => 'required',
            'feature_one_title' => 'required',
            'feature_two_title' => 'required',
            'feature_three_title' => 'required',
        ]);

        $hero = Hero::first();
        $hero->title = $request->title;
        $hero->highlight_text = $request->highlight_text;
        $hero->description = $request->description;
        $hero->primary_button_text = $request->primary_button_text;
        $hero->primary_button_link = $request->primary_button_link;
        $hero->secondary_button_text = $request->secondary_button_text;
        $hero->secondary_button_link = $request->secondary_button_link;
        $hero->feature_one_title = $request->feature_one_title;
        $hero->feature_two_title = $request->feature_two_title;
        $hero->feature_three_title = $request->feature_three_title;
        $hero->save();
        return redirect()->back()->with('success', 'Hero updated successfully.');
    }

}
