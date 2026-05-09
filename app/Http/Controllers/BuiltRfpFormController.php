<?php

namespace App\Http\Controllers;

use App\Models\BuiltRfpForm;
use Illuminate\Http\Request;

class BuiltRfpFormController
{
    public function index()
    {
        $builtRfpForm = BuiltRfpForm::first();
        return inertia('BuiltRfpForm/Edit', [
            'builtRfpForm' => $builtRfpForm,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'rfp_form_title' => 'required',
            'rfp_form_subtitle' => 'required',
            'rfp_item_one' => 'required',
            'rfp_item_two' => 'required',
            'rfp_item_three' => 'required',
            'rfp_footer_text' => 'required',

        ]);

        $builtRfpForm = BuiltRfpForm::first();
        $builtRfpForm->title = $request->title;
        $builtRfpForm->description = $request->description;
        $builtRfpForm->button_text = $request->button_text;
        $builtRfpForm->button_link = $request->button_link;
        $builtRfpForm->rfp_form_title = $request->rfp_form_title;
        $builtRfpForm->rfp_form_subtitle = $request->rfp_form_subtitle;
        $builtRfpForm->rfp_item_one = $request->rfp_item_one;
        $builtRfpForm->rfp_item_two = $request->rfp_item_two;
        $builtRfpForm->rfp_item_three = $request->rfp_item_three;
        $builtRfpForm->rfp_footer_text = $request->rfp_footer_text;
        $builtRfpForm->save();

        return redirect()->route('builtRfpForm.index')->with('success', 'Built Rfp Form updated successfully');
    }

}
