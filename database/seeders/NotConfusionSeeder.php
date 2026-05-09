<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NotConfusion;

class NotConfusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NotConfusion::insert([
            
            'title' => 'Underwriting Should Create Clarity, Not Confusion',
            'description_one' => 'We believe stop-loss should do more than cap exposure. It should function as a diagnostic tool for the employer health plan.',
            'description_two' => 'A true stop loss strategy doesn’t only respond to volatility. It anticipates it, explains it, and creates the ability to intervene earlier.',
            'button_text' => 'Explore More',
            'button_link' => '#',
            'understanding_title' => 'That means understanding',
            'understanding_item_one' => 'Where claims are mispriced, delayed, or distorted',
            'understanding_item_two' => 'Which cost drivers are structural versus episodic',
            'understanding_item_three' => 'How vendor incentives — especially within pharmacy benefits manager arrangements — shape long-term risk'
        ]);
            
    }
}
