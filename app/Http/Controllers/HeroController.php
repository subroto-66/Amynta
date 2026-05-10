<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController
{
    public function index()
    {
        $heroes = Hero::orderBy('id', 'desc')->get();
        return inertia('Hero/Index', [
            'heroes' => $heroes,
        ]);
    }

    public function create()
    {
        return inertia('Hero/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_one' => 'nullable',
            'title_two' => 'nullable',
            'highlight_text' => 'required',
            'description_one' => 'nullable',
            'description_two' => 'nullable',
            'primary_button_text' => 'nullable',
            'primary_button_link' => 'nullable',
            'secondary_button_text' => 'nullable',
            'secondary_button_link' => 'nullable',
            'page_name' => 'required|unique:heroes,page_name',
            'feature_one_title' => 'nullable',
            'feature_two_title' => 'nullable',
            'feature_three_title' => 'nullable',
            'short_title_one' => 'nullable',
            'short_title_two' => 'nullable',
            'short_description_one' => 'nullable',
            'short_description_two' => 'nullable',
        ]);

       $hero = new Hero;
       $hero->title_one = $request->title_one;
       $hero->title_two = $request->title_two;
       $hero->highlight_text = $request->highlight_text;
       $hero->description_one = $request->description_one;
       $hero->description_two = $request->description_two;
       $hero->primary_button_text = $request->primary_button_text;
       $hero->primary_button_link = $request->primary_button_link;
       $hero->secondary_button_text = $request->secondary_button_text;
       $hero->secondary_button_link = $request->secondary_button_link;
       $hero->page_name = $request->page_name;
       $hero->feature_one_title = $request->feature_one_title;
       $hero->feature_two_title = $request->feature_two_title;
       $hero->feature_three_title = $request->feature_three_title;
       $hero->short_title_one = $request->short_title_one;
       $hero->short_title_two = $request->short_title_two;
       $hero->short_description_one = $request->short_description_one;
       $hero->short_description_two = $request->short_description_two;
       $hero->save();
       
        return redirect()->route('hero.index')->with('message', 'Hero created successfully.');    
    }

    public function edit($id)
    {
        $hero = Hero::find($id);
        return inertia('Hero/Edit', [
            'hero' => $hero,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title_one' => 'nullable',
            'title_two' => 'nullable',
            'highlight_text' => 'required',
            'description_one' => 'nullable',
            'description_two' => 'nullable',
            'primary_button_text' => 'nullable',
            'primary_button_link' => 'nullable',
            'secondary_button_text' => 'nullable',
            'secondary_button_link' => 'nullable',
            'page_name' => 'required|unique:heroes,page_name,'.$id,
            'feature_one_title' => 'nullable',
            'feature_two_title' => 'nullable',
            'feature_three_title' => 'nullable',
            'short_title_one' => 'nullable',
            'short_title_two' => 'nullable',
            'short_description_one' => 'nullable',
            'short_description_two' => 'nullable',
        ]);

        $hero = Hero::find($id);
        $hero->title_one = $request->title_one;
        $hero->title_two = $request->title_two;
        $hero->highlight_text = $request->highlight_text;
        $hero->description_one = $request->description_one;
        $hero->description_two = $request->description_two;
        $hero->primary_button_text = $request->primary_button_text;
        $hero->primary_button_link = $request->primary_button_link;
        $hero->secondary_button_text = $request->secondary_button_text;
        $hero->secondary_button_link = $request->secondary_button_link;
        $hero->page_name = $request->page_name;
        $hero->feature_one_title = $request->feature_one_title;
        $hero->feature_two_title = $request->feature_two_title;
        $hero->feature_three_title = $request->feature_three_title;
        $hero->short_title_one = $request->short_title_one;
        $hero->short_title_two = $request->short_title_two;
        $hero->short_description_one = $request->short_description_one;
        $hero->short_description_two = $request->short_description_two;
        $hero->save();
        return redirect()->route('hero.index')->with('message', 'Hero updated successfully.');
    }

    public function destroy($id)
    {
        $hero = Hero::find($id);
        $hero->delete();
        return redirect()->route('hero.index')->with('message', 'Hero deleted successfully.');
    }
    

}
