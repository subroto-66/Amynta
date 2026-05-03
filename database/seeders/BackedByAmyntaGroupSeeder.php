<?php

namespace Database\Seeders;

use App\Models\BackedByAmyntaGroup;
use Illuminate\Database\Seeder;

class BackedByAmyntaGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BackedByAmyntaGroup::insert([
            'highlight_title' => 'Backed by The Amynta Group',
            'description_one' => 'Amynta Risk Solutions operates within The Amynta Group, an insurance services organization managing more than $4.5 billion in premiums and employing approximately 2,000 professionals across North America, Europe, and Australia.',
            'description_two' => 'That backing allows our underwriting teams to remain focused, responsive, and empowered to make informed decisions close to the risk.',
            'item_title' => 'The Amynta platform provides:',
        ]);
    }
}
