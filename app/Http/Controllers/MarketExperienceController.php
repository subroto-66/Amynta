<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MarketExperience;

class MarketExperienceController
{
    public function index()
    {
        $marketExperience = MarketExperience::first();
        return Inertia::render('MarketExperience/Edit', [
            'marketExperience' => $marketExperience
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([

            'platform_title' => 'required',
            'platform_description_one' => 'required',
            'platform_item_one' => 'required',
            'platform_item_two' => 'required',
            'platform_item_three' => 'required',
            'platform_description_two' => 'required',
            'market_experience_title' => 'required',
            'market_experience_description' => 'required',
            'market_experience_name' => 'required',
            'market_experience_name_description' => 'required',
            'market_experience_quote' => 'required',

        ]);


        $data = MarketExperience::first();
        $data->platform_title = $request->platform_title;
        $data->platform_description_one = $request->platform_description_one;
        $data->platform_item_one = $request->platform_item_one;
        $data->platform_item_two = $request->platform_item_two;
        $data->platform_item_three = $request->platform_item_three;
        $data->platform_description_two = $request->platform_description_two;
        $data->market_experience_title = $request->market_experience_title;
        $data->market_experience_description = $request->market_experience_description;
        $data->market_experience_name = $request->market_experience_name;
        $data->market_experience_name_description = $request->market_experience_name_description;
        $data->market_experience_quote = $request->market_experience_quote;
        $data->save();

        return redirect()->route('marketExperience.index')->with('success', 'Market Experience updated successfully.');
    }
}
