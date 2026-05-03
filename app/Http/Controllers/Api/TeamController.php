<?php

namespace App\Http\Controllers\Api;

use App\Models\Hero;
use App\Models\Team;

class TeamController
{
    public function team()
    {
        $hero = Hero::select('id', 'title_one', 'highlight_text', 'description_one', 'description_two')->where('page_name', 'our-team')->first();
        $teams = Team::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'hero' => $hero,
            'teams' => $teams,
        ], 200);
    }
}
