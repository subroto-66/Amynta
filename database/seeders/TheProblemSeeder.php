<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TheProblem;

class TheProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TheProblem::insert([
            [
                'title' => 'Why the old way of doing insurance doesn’t work',
                'description' => 'Many insurers are burdened by legacy systems, making it difficult for them to adapt quickly to market changes. This can lead to delays in processing claims and providing customer support',
                'subtitle' => 'Why the old way of doing insurance doesn’t work'
            ]
        ]);
    }
}
