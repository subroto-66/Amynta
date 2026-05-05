<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamOverview;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TeamOverviewController
{
    public function index()
    {
        $teamOverview = TeamOverview::first();
        return inertia('TeamOverview/Edit', [
            'teamOverview' => $teamOverview,
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description_one' => 'required',
            'description_two' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'image_text' => 'required',
            'primary_button_text' => 'required',
            'primary_button_link' => 'required',
            'secondary_button_text' => 'required',
            'secondary_button_link' => 'required',
        ]);

        $teamOverview = TeamOverview::first();

        if ($request->hasFile('image')) {

            if ($teamOverview->image) {
                unlink(public_path('credit/' . $teamOverview->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('credit'), $imageName);
            $teamOverview->image = $imageName;
        }

        $teamOverview->title = $request->title;
        $teamOverview->description_one = $request->description_one;
        $teamOverview->description_two = $request->description_two;
        $teamOverview->image_text = $request->image_text;
        $teamOverview->primary_button_text = $request->primary_button_text;
        $teamOverview->primary_button_link = $request->primary_button_link;
        $teamOverview->secondary_button_text = $request->secondary_button_text;
        $teamOverview->secondary_button_link = $request->secondary_button_link;
        $teamOverview->save();

        return back()->with('success', 'Team Overview updated successfully.');
    }
}
