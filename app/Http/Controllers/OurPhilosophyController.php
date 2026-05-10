<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurPhilosophy;
use Inertia\Inertia;

class OurPhilosophyController
{
    public function index()
    {
        $ourPhilosophy = OurPhilosophy::first();
        return Inertia::render('OurPhilosophy/Edit', [
            'ourPhilosophy' => $ourPhilosophy
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'qoute_one' => 'required',
            'qoute_two' => 'required',
            'item_one' => 'required',
            'item_two' => 'required',
            'item_three' => 'required',
            'item_four' => 'required',
            'item_five' => 'required',

        ]);


        $data = OurPhilosophy::first();
        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->description = $request->description;
        $data->qoute_one = $request->qoute_one;
        $data->qoute_two = $request->qoute_two;
        $data->item_one = $request->item_one;
        $data->item_two = $request->item_two;
        $data->item_three = $request->item_three;
        $data->item_four = $request->item_four;
        $data->item_five = $request->item_five;
        $data->save();

        return redirect()->route('ourPhilosophy.index')->with('message', 'Our Philosophy updated successfully.');
    }
}
