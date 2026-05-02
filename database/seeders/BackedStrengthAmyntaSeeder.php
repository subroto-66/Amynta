<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BackedStrengthAmynta;

class BackedStrengthAmyntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BackedStrengthAmynta::insert([
            [
                'highlight_title' => 'Backed Strength by Amynta',
                'description' => 'Backed by Amynta, we combine the agility and responsiveness of a boutique,
                    specialty-focused team with the significant financial strength and global resources of a world-class
                    organization. This powerful combination allows us to deliver the best of both worlds to our clients:',
                'item_title' => 'Our Strengths Include:',
                'item_one' => 'Stable Capital Relationships',
                'item_two' => 'Operational Depth',
                'item_three' => 'Long-Term Strategic Commitment',
                'item_four' => 'Decision-Making Authority Close to the Risk',
            ],
        ]);
    }
}
