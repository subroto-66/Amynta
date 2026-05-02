<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OtherSetting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         OtherSetting::insert([

            [
                'title' => 'Amynta Risk Solutions',
                'meta_title' => 'Amynta Risk Solutions | Specialty Underwriting for Complex Markets',
                'meta_description' => 'Amynta delivers specialty insurance coverage for complex risks across a diverse portfolio of industries. Partner with us for tailored underwriting and disciplined execution.',
                'footer_description' => 'Specialty underwriting for complex needs—built for disciplined execution.',
                'copyright' => 'Copyright © 2026 Amynta Risk Management Pvt. Ltd. All Rights Reserved.',
                'linkedin_url' => '#',
                'instagram_url' => '#',
                'facebook_url' => '#',
                'twitter_url' => '#',
                'header_logo' => 'logo.png',
                'footer_logo' => 'logo.png',
                'fab_icon' => 'fab_icon.png'
            ]
            
        ]);
    }
}
