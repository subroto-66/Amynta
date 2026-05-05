<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MortgageCredit;

class MortgageCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MortgageCredit::insert([

            [
                'title' => 'Insurance & Reinsurance Programs',
                'description_one' => 'Our Mortgage Credit products can be structured as both insurance or reinsurance programs, focusing on single-family exposures primarily in the United States, or for multifamily and commercial mortgage risk upon review.',
                'description_two' => 'Mortgage Credit works with private mortgage insurers in the United States with access to select European and Australian mortgage risk, as appropriate.',
                'contact_icon' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-secondary" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg>',
                'contact_title' => 'Contact The Team',
                'contact_item_one' => 'Daniel.Sussman@amyntagroup.com',
                'contact_item_two' => 'Daniel.Sussman@amyntagroup.com',

            ]

        ]);
    }
}
