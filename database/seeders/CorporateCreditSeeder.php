<?php

namespace Database\Seeders;

use App\Models\CorporateCredit;
use Illuminate\Database\Seeder;

class CorporateCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CorporateCredit::insert([

            [
                'title' => 'Corporate Credit',
                'description' => 'Corporate Credit insurance structured as non-payment insurance, focuses on private sector markets primarily within the United States and developed G-7 domiciled risks. Product coverage extends to a wide range of private industry sectors and deal structures, including trade finance, infrastructure and project finance and asset-leveraged financings.',
                'insure_title' => 'Who We Insure',
                'insure_description' => 'Insureds can be banks or non-bank asset managers needing regulatory capital relief and debtor risk management solutions.',
                'insure_icon' => 'Insureds svg icon',
                'covered_title' => 'Covered Exposures',
                'covered_item_one_title' => 'Term Loans',
                'covered_item_two_title' => 'Revolving Credit Facilities (RCFs)',
                'covered_item_three_title' => 'Supply Chain Finance',
                'covered_item_one_icon' => 'covered_item_one_iconsvg',
                'covered_item_two_icon' => 'covered_item_two_iconsvg',
                'covered_item_three_icon' => 'covered_item_three_iconsvg',
                'contact_title' => 'Contact Our Team',
                'contact_item_one_title' => 'Donald.Asadorian@amyntagroup.com',
                'contact_item_two_title' => 'David.Wright@ambridge-group.com',
                'contact_item_one_icon' => '/assets/icons/phone.svg',
                'contact_item_two_icon' => '/assets/icons/email.svg',
            ],
        ]);
    }
}
