<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LongtermCommitment;

class LongtermCommitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LongtermCommitment::create([
            'title' => 'LongtermCommitment',
            'description_one' => 'Description One',
            'description_two' => 'Description Two',
            'primary_button_text' => 'Primary Button Text',
            'primary_button_url' => 'Primary Button URL',
            'secondary_button_text' => 'Secondary Button Text',
            'secondary_button_url' => 'Secondary Button URL',
            'item_title' => 'Item Title',
            'item_one' => 'Item One',
            'item_two' => 'Item Two',
            'item_three' => 'Item Three',
            'item_four' => 'Item Four',
        ]);
    }
}
