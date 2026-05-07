<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoreReinsuranceSolution;

class CoreReinsuranceSolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CoreReinsuranceSolution::create([

            'title' => 'Core Reinsurance Solutions',
            'subtitle' => 'Our platform supports a broad range of medical portfolios',
            'excess_title' => 'Excess of Loss (XoL)',
            'excess_description' => 'We support property catastrophe, casualty, and specialty lines with tailored excess of loss reinsurance treaties.',
            'proportional_title' => 'Proportional / Quota Share Support',
            'proportional_description' => 'We offer proportional reinsurance solutions to support our partners’ needs across property, casualty, and specialty lines.',
        
        ]);
    }
}
