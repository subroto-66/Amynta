<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingPlan;

class WorkingPlanController
{
    public function index()
    {
        $workingPlan = WorkingPlan::first();
        return inertia('WorkingPlan/Edit', [
            'workingPlan' => $workingPlan,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'one_button_text' => 'required',
            'one_button_link' => 'required',
            'two_button_text' => 'required',
            'two_button_link' => 'required',
            'three_button_text' => 'required',
            'three_button_link' => 'required'

        ]);

        $workingPlan = WorkingPlan::first();
        $workingPlan->title = $request->title;
        $workingPlan->description = $request->description;
        $workingPlan->one_button_text = $request->one_button_text;
        $workingPlan->two_button_text = $request->two_button_text;
        $workingPlan->three_button_text = $request->three_button_text;
        $workingPlan->one_button_link = $request->one_button_link;
        $workingPlan->two_button_link = $request->two_button_link;
        $workingPlan->three_button_link = $request->three_button_link;
        $workingPlan->save();
        
        return redirect()->route('workingPlan.index')->with('message', 'Working Plan updated successfully.');
    }
}
