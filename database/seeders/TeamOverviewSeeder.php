<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamOverview;

class TeamOverviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamOverview::insert([
            [
                'title' => 'Leadership & Market Expertise',
                'description_one' => 'The Structured Credit and Alternative Risk is a team of highly experienced and knowledgeable professionals that have been working together since the division’s founding in 2019, building a significant book of business.',
                'description_two' => 'They will continue to broaden their reach and innovate credit insurance product solutions to meet market demand going forward.',
                'image' => 'image.jpg',
                'image_text' => 'Building a significant book of business while continuing to innovate credit insurance product solutions.',
                'primary_button_text' => 'Connect With The Team',
                'primary_button_link' => '#',
                'secondary_button_text' => 'Discuss a Transaction',
                'secondary_button_link' => '#',
            ]
        ]);
    }
}
