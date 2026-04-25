<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Hero::insert([

            [

            'title' => 'Amynta Risk Solutions',
            'highlight_text' => 'Specialty Risk. Disciplined Underwriting. Built for Complex Markets.',
            'description' => 'Risk does not behave the same across industries and it should not be underwritten as if it does. Amynta Risk Solutions is a specialty underwriting platform designed for complex, noncommodity exposures across healthcare, entertainment, and global financial markets. We partner with brokers, carriers, MGUs, banks, and institutional clients who require structured risk transfer solutions backed by data and disciplined execution.',
            'primary_button_text' => 'Explore Our Divisions',
            'primary_button_link' => '/',
            'secondary_button_text' => 'Contact Our Team',
            'secondary_button_link' => '/',
            'feature_one_title' => 'Understand the structure of risk',
            'feature_two_title' => 'Price it responsibly',
            'feature_three_title' => 'Stand behind it long term'

            ]

        ]);
    }
}
