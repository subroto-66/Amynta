<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MarketExperience;

class MarketExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarketExperience::insert([
            
            [
                'platform_title' => 'Market Experience',
                'platform_description_one' => 'Market Experience',
                'platform_item_one' => 'Market Experience',
                'platform_item_two' => 'Market Experience',
                'platform_item_three' => 'Market Experience',
                'platform_description_two' => 'Market Experience',

                'market_experience_title' => 'Market Experience',
                'market_experience_description' => 'Market Experience',
                'market_experience_name' => 'Market Experience',
                'market_experience_name_description' => 'Market Experience',
                'market_experience_quote' => 'Market Experience',
            ],


        ]);
    }
}
