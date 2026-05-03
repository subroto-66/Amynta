<?php

namespace App\Http\Controllers\Api;

use App\Models\Hero;
use App\Models\Work;
use App\Models\BackedByAmyntaGroup;
use App\Models\Item;
use App\Models\Commitment;

class AboutController
{
    public function about()
    {
        $hero = Hero::select('id', 'title_one', 'highlight_text', 'description_one', 'description_two', 'short_title_one', 'short_title_two')->where('page_name', 'about')->first();
        $works = Work::orderBy('id', 'asc')->get();

        $backedByAmyntaGroup = BackedByAmyntaGroup::first();
        $items = Item::where('section_name', 'backed_by_amynta_group')->get();

        $commitment = Commitment::first();

        return response()->json([
            'success' => true,
            'hero' => $hero,
            'works' => $works,
            'backed_by_amynta_group' => $backedByAmyntaGroup,
            'items' => $items,
            'commitment' => $commitment,

        ]);
    }
}
