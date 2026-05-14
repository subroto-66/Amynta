<?php

namespace App\Http\Controllers\Api;

use App\Models\BackedStrengthAmynta;
use App\Models\Division;
use App\Models\GetInTouch;
use App\Models\Hero;
use App\Models\Item;
use App\Models\OtherSetting;
use App\Models\Specialist;
use App\Models\SpecialtyRisk;
use App\Models\Structure;
use App\Models\Underwrite;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {
        $hero = Hero::select('title_one', 'title_two', 'highlight_text', 'description_one', 'description_two', 'primary_button_text', 'primary_button_link', 'secondary_button_text', 'secondary_button_link', 'feature_one_title', 'feature_two_title', 'feature_three_title')->where('page_name', 'home')->first();

        $specialtyRisks = SpecialtyRisk::get();
        $divisions = Division::get();
        $underwrite = Underwrite::first();
        $underwriteItems = Item::where('section_name', 'underwrite')->get();
        $backedStrengthAmynta = BackedStrengthAmynta::first();
        $specialists = Specialist::get();

        $structures = Structure::get();
        $getInTouch = GetInTouch::first();

        return response()->json([

            'status' => 'success',
            'hero' => $hero,
            'specialtyRisks' => $specialtyRisks,
            'divisions' => $divisions,
            'underwrite' => $underwrite,
            'underwriteItems' => $underwriteItems,
            'backedStrengthAmynta' => $backedStrengthAmynta,
            'specialists' => $specialists,
            'structures' => $structures,
            'getInTouch' => $getInTouch,

        ], 200);
    }

    public function footer(Request $request)
    {
        $footer = OtherSetting::first();

        return response()->json([
            'status' => 'success',
            'footer' => $footer,
        ], 200);
    }
}
