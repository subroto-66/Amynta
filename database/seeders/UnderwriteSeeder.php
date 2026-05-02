<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Underwrite;

class UnderwriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Underwrite::insert([
            [
                'title' => 'Disciplined underwriting built for complex risk',
                'description_one' => 'Across every division, underwriting is structural in all that we do. Our teams evaluate:',
                'description_two' => 'We embed actuarial review, market expertise, and disciplined pricing into every submission. The objective is to deploy capital intelligently, or not at all — creating durability across economic cycles.',
                'qoute' => 'Our underwriting approach ensures smart capital allocation and long-term resilience.',
                'author_name' => 'David Chen',
                'author_position' => 'Risk Specialists',
                'image' => 'Underwrite.jpg',
                'author_image' => 'Underwrite.jpg',
            ]
        ]);

    }
}
