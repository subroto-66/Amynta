<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\SpecialtyRisk;
use App\Models\Division;
use App\Models\Underwrite;
use App\Models\Item;
use App\Models\BackedStrengthAmynta;
use App\Models\Specialist;
use App\Models\Structure;
use App\Models\GetInTouch;
use App\Models\OtherSetting;

class HomeController
{

    public function index(Request $request)
    {
        $hero = Hero::select('title_one','title_two','highlight_text','description_one','description_two','primary_button_text','primary_button_link','secondary_button_text','secondary_button_link','feature_one_title','feature_two_title','feature_three_title')->where('page_name', 'home')->first();

        $specialtyRisks = SpecialtyRisk::orderBy('id', 'desc')->get();
        $divisions = Division::orderBy('id', 'desc')->get();
        $underwrite = Underwrite::first();
        $underwriteItems = Item::where('section_name', 'underwrite')->get();
        $backedStrengthAmynta = BackedStrengthAmynta::first();
        $specialists = Specialist::orderBy('id', 'desc')->get();

        $structures = Structure::orderBy('id', 'desc')->get();
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
