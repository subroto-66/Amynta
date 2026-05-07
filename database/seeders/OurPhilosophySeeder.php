<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OurPhilosophy;

class OurPhilosophySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurPhilosophy::insert([
            [
                'title' => 'Our Philosophy',
                'subtitle' => 'A proven strategy for long-term value creation',
                'description' => 'Amynta is a leading program underwriting manager, providing capital-backed, distribution-driven risk solutions through its diversified portfolio of underwriting businesses. Our integrated approach combines market-leading underwriting expertise, deep industry experience, and the backing of a multi-billion dollar balance sheet to deliver superior, long-term value to our partners and clients.',
                'qoute_one' => 'Our integrated approach combines the agility and specialized focus of an underwriting agency with the financial strength and long-term commitment of a global insurance group. We partner with proven teams to build distribution-driven platforms that deliver consistent, profitable growth while providing our clients with the security and scale they need to pursue their ambitions.',
                'qoute_two' => '',
                'item_one' => 'Capital-backed underwriting platforms',
                'item_two' => 'Distribution-driven business models',
                'item_three' => 'Deep industry expertise',
                'item_four' => 'Long-term partnerships',
                'item_five' => 'Disciplined risk selection and management'
            ]
        ]);
    }
}
