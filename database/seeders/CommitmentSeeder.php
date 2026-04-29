<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commitment;

class CommitmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Commitment::insert([

            [

            'title' => 'Our Commitment Specialty underwriting requires judgment Judgment requires experience Experience requires accountability',
            'sub_title' => 'Amynta Risk Solutions is built around that very principle.',
            'title_two' => 'We Believe In',
            'description' => 'Doing what we say we will do Treating partners with respect Making timely, informed decisions Maintaining transparency in communication Taking ownership of outcomes',
            'title_three' => 'Ready to partner with a team you can trust?',
            'primary_button_text' => 'Meet Our Leadership Team',
            'primary_button_link' => '#',
            'secondary_button_text' => 'Contact Amynta Risk Solutions',
            'secondary_button_link' => '#',

            ]

        ]);
    }
}
