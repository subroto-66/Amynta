<?php

namespace App\Http\Controllers;

use App\Models\CorporateCredit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CorporateCreditController
{
    public function index()
    {
        $corporateCredit = CorporateCredit::first();

        return Inertia::render('CorporateCredit/Edit', [
            'corporateCredit' => $corporateCredit,
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'insure_title' => 'required',
            'insure_description' => 'required',
            'insure_icon' => 'required',
            'covered_title' => 'required',
            'covered_item_one_title' => 'required',
            'covered_item_two_title' => 'required',
            'covered_item_three_title' => 'required',
            'covered_item_one_icon' => 'required',
            'covered_item_two_icon' => 'required',
            'covered_item_three_icon' => 'required',
            'contact_title' => 'required',
            'contact_item_one_title' => 'required',
            'contact_item_two_title' => 'required',
            'contact_item_one_icon' => 'required',
            'contact_item_two_icon' => 'required',
        ]);

        $corporateCredit = CorporateCredit::first();
        $corporateCredit->title = $request->title;
        $corporateCredit->description = $request->description;
        $corporateCredit->insure_title = $request->insure_title;
        $corporateCredit->insure_description = $request->insure_description;
        $corporateCredit->insure_icon = $request->insure_icon;
        $corporateCredit->covered_title = $request->covered_title;
        $corporateCredit->covered_item_one_title = $request->covered_item_one_title;
        $corporateCredit->covered_item_two_title = $request->covered_item_two_title;
        $corporateCredit->covered_item_three_title = $request->covered_item_three_title;
        $corporateCredit->covered_item_one_icon = $request->covered_item_one_icon;
        $corporateCredit->covered_item_two_icon = $request->covered_item_two_icon;
        $corporateCredit->covered_item_three_icon = $request->covered_item_three_icon;
        $corporateCredit->contact_title = $request->contact_title;
        $corporateCredit->contact_item_one_title = $request->contact_item_one_title;
        $corporateCredit->contact_item_two_title = $request->contact_item_two_title;
        $corporateCredit->contact_item_one_icon = $request->contact_item_one_icon;
        $corporateCredit->contact_item_two_icon = $request->contact_item_two_icon;
        $corporateCredit->save();

        return redirect()->route('corporateCredit.index')->with('message', 'Corporate Credit updated successfully.');
    }
}
