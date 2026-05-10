<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ContingencyLeadership;
use App\Models\Item;

class ContingencyLeadershipController
{
    public function index()
    {
        $contingencyLeadership = ContingencyLeadership::first();
        return Inertia::render('ContingencyLeadership/Edit', [
            'contingencyLeadership' => $contingencyLeadership
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([

            'leadership_name' => 'required|string|max:255',
            'leadership_position' => 'required|string|max:255',
            'leadership_description' => 'required',
            'leadership_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'broker_title' => 'required|string|max:255',
            'broker_description' => 'required',
            'primary_broker_button_text' => 'required|string|max:255',
            'primary_broker_button_link' => 'required|string|max:255',
            'secondary_broker_button_text' => 'required|string|max:255',
            'secondary_broker_button_link' => 'required|string|max:255',
            'brokers_items_one' => 'required|string|max:255',
            'brokers_items_two' => 'required|string|max:255',
            'brokers_items_three' => 'required|string|max:255',
            'brokers_items_four' => 'required|string|max:255',
            'brokers_items_five' => 'required|string|max:255',
            'brokers_items_six' => 'required|string|max:255'

        ]);

        $contingencyLeadership = ContingencyLeadership::first();
        $contingencyLeadership->leadership_name = $request->leadership_name;
        $contingencyLeadership->leadership_title = $request->leadership_title;
        $contingencyLeadership->leadership_position = $request->leadership_position;
        $contingencyLeadership->leadership_description = $request->leadership_description;
        $contingencyLeadership->broker_title = $request->broker_title;
        $contingencyLeadership->broker_description = $request->broker_description;
        $contingencyLeadership->primary_broker_button_text = $request->primary_broker_button_text;
        $contingencyLeadership->primary_broker_button_link = $request->primary_broker_button_link;
        $contingencyLeadership->secondary_broker_button_text = $request->secondary_broker_button_text;
        $contingencyLeadership->secondary_broker_button_link = $request->secondary_broker_button_link;
        $contingencyLeadership->brokers_items_one = $request->brokers_items_one;
        $contingencyLeadership->brokers_items_two = $request->brokers_items_two;
        $contingencyLeadership->brokers_items_three = $request->brokers_items_three;
        $contingencyLeadership->brokers_items_four = $request->brokers_items_four;
        $contingencyLeadership->brokers_items_five = $request->brokers_items_five;
        $contingencyLeadership->brokers_items_six = $request->brokers_items_six;

        if (request()->hasFile('image')) {
            if ($contingencyLeadership->image) {
                unlink(public_path('ContingencyLeadership/'.$contingencyLeadership->image));
            }

            $image = request()->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('ContingencyLeadership'), $imageName);
            $contingencyLeadership->image = $imageName;
        }

        $contingencyLeadership->save();


        return redirect()->route('contingencyLeadership.index')->with('message', 'Contingency Leadership updated successfully.');
    }
}
