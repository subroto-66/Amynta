<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LongtermCommitment;
use Inertia\Inertia;

class LongtermCommitmentController
{
    public function index()
    {
        $longtermCommitment = LongtermCommitment::first();
        return Inertia::render('LongTermCommitment/Edit', [
            'longtermCommitment' => $longtermCommitment
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'description_one' => 'required',
            'description_two' => 'required',
            'primary_button_text' => 'required',
            'primary_button_url' => 'nullable',
            'secondary_button_text' => 'required',
            'secondary_button_url' => 'nullable',
            'item_title' => 'required',
            'item_one' => 'nullable',
            'item_two' => 'nullable',
            'item_three' => 'nullable',
            'item_four' => 'nullable',

        ]);


        $data = LongtermCommitment::first();
        $data->title = $request->title;
        $data->description_one = $request->description_one;
        $data->description_two = $request->description_two;
        $data->primary_button_text = $request->primary_button_text;
        $data->primary_button_url = $request->primary_button_url;
        $data->secondary_button_text = $request->secondary_button_text;
        $data->secondary_button_url = $request->secondary_button_url;
        $data->item_title = $request->item_title;
        $data->item_one = $request->item_one;
        $data->item_two = $request->item_two;
        $data->item_three = $request->item_three;
        $data->item_four = $request->item_four;
        $data->save();

        return redirect()->route('longtermCommitment.index')->with('message', 'Long Term Commitment updated successfully.');
    }
}
