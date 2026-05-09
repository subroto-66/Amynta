<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkingPlan;

class WorkingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        WorkingPlan::insert([

            [
                "title" => "Working Plan",
                "description" => "Working Plan",
                "one_button_text" => "Working Plan",
                "two_button_text" => "Working Plan",
                "three_button_text" => "Working Plan",
                "one_button_link" => "Working Plan",
                "two_button_link" => "Working Plan",
                "three_button_link" => "Working Plan"
            ],
            
        ]);
    }
}
