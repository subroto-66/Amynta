<?php

namespace App\Http\Controllers;

use App\Models\OtherSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController
{
    public function edit()
    {
        $setting = OtherSetting::first();

        return Inertia::render('OtherSetting/Edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([

            'header_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fab_icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'footer_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_description' => 'required|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'copyright' => 'required|string|max:255',

        ]);

        $setting = OtherSetting::first();
        $setting->title = $request->title;
        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->footer_description = $request->footer_description;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->facebook_url = $request->facebook_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->copyright = $request->copyright;

        if (request()->hasFile('header_logo')) {

            if($setting->header_logo){
                unlink(public_path('OthersSettings/header/'.$setting->header_logo));
            }

            $image = request()->file('header_logo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('OthersSettings/header/'), $imageName);
            $setting->header_logo = $imageName;
        }

        if (request()->hasFile('fab_icon')) {

            if($setting->fab_icon){
                unlink(public_path('OthersSettings/fab_icon/'.$setting->fab_icon));
            }

            $image = request()->file('fab_icon');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('OthersSettings/fab_icon/'), $imageName);
            $setting->fab_icon = $imageName;
        }
        
        if (request()->hasFile('footer_logo')) {

            if($setting->footer_logo){
                unlink(public_path('OthersSettings/footer/'.$setting->footer_logo));
            }

            $image = request()->file('footer_logo');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('OthersSettings/footer/'), $imageName);
            $setting->footer_logo = $imageName;
        }

        $setting->save();

        return redirect()->route('othersSettings.index')->with('success', 'Others Settings updated successfully.');
    }
}
