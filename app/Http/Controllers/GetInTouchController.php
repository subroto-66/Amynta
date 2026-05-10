<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetInTouch;
use Inertia\Inertia;

class GetInTouchController
{
    public function index()
    {
        $getInTouch = GetInTouch::first();
        return Inertia::render('GetInTouch/Edit', ['getInTouch' => $getInTouch]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'commitment_title' => 'required|string|max:255',
            'commitment_desc_one' => 'required|string',
            'commitment_desc_two' => 'required|string',
            'get_in_touch_title' => 'required|string|max:255',
            'get_in_touch_desc_one' => 'required|string',
            'get_in_touch_desc_two' => 'required|string',
            'get_in_touch_primary_button_text' => 'required|string|max:255',
            'get_in_touch_primary_button_url' => 'required|string|max:255',
            'get_in_touch_secondary_button_text' => 'required|string|max:255',
            'get_in_touch_secondary_button_url' => 'required|string|max:255',
        ]);

        $getInTouch = GetInTouch::first();
        $getInTouch->commitment_title = $request->commitment_title;
        $getInTouch->commitment_desc_one = $request->commitment_desc_one;
        $getInTouch->commitment_desc_two = $request->commitment_desc_two;
        $getInTouch->get_in_touch_title = $request->get_in_touch_title;
        $getInTouch->get_in_touch_desc_one = $request->get_in_touch_desc_one;
        $getInTouch->get_in_touch_desc_two = $request->get_in_touch_desc_two;
        $getInTouch->get_in_touch_primary_button_text = $request->get_in_touch_primary_button_text;
        $getInTouch->get_in_touch_primary_button_url = $request->get_in_touch_primary_button_url;
        $getInTouch->get_in_touch_secondary_button_text = $request->get_in_touch_secondary_button_text;
        $getInTouch->get_in_touch_secondary_button_url = $request->get_in_touch_secondary_button_url;
        $getInTouch->save();

        return redirect()->route('getInTouch.index')->with('message', 'Get in touch updated successfully.');
    }
}
