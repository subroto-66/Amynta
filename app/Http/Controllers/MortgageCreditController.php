<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MortgageCredit;

class MortgageCreditController
{
    public function index()
    {
        $mortgageCredit = MortgageCredit::first();
        return Inertia('MortgageCredit/Edit', compact('mortgageCredit'));
    }

    public function update(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description_one' => 'required',
            'description_two' => 'required',
            'contact_icon' => 'required',
            'contact_title' => 'required',
            'contact_item_one' => 'required',
            'contact_item_two' => 'required',

        ]);

        $mortgageCredit = MortgageCredit::first();
        $mortgageCredit->title = $request->title;
        $mortgageCredit->description_one = $request->description_one;
        $mortgageCredit->description_two = $request->description_two;
        $mortgageCredit->contact_icon = $request->contact_icon;
        $mortgageCredit->contact_title = $request->contact_title;
        $mortgageCredit->contact_item_one = $request->contact_item_one;
        $mortgageCredit->contact_item_two = $request->contact_item_two;
        $mortgageCredit->save();

        return back()->with('success', 'Mortgage Credit updated successfully');
    }
}
