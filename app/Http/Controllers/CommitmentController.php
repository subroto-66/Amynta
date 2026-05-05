<?php

namespace App\Http\Controllers;

use App\Models\Commitment;
use Illuminate\Http\Request;

class CommitmentController
{
    public function index()
    {
        $commitment = Commitment::first();

        return inertia('Commitment/Edit', [
            'commitment' => $commitment,
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'title_two' => 'required',
            'description' => 'required',
            'title_three' => 'required',
            'primary_button_text' => 'required',
            'primary_button_link' => 'nullable',
            'secondary_button_text' => 'required',
            'secondary_button_link' => 'nullable',
        ]);

        $commitment = Commitment::first();
        $commitment->title = $request->title;
        $commitment->sub_title = $request->sub_title;
        $commitment->title_two = $request->title_two;
        $commitment->description = $request->description;
        $commitment->title_three = $request->title_three;
        $commitment->primary_button_text = $request->primary_button_text;
        $commitment->primary_button_link = $request->primary_button_link;
        $commitment->secondary_button_text = $request->secondary_button_text;
        $commitment->secondary_button_link = $request->secondary_button_link;
        $commitment->save();

        return redirect()->route('commitment.index')->with('success', 'Commitment updated successfully.');
    }
}
