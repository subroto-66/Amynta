<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GetInTouch;

class GetInTouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GetInTouch::insert([
            [
                'commitment_title' => 'Connect With The Right Team',
                'commitment_desc_one' => 'Each division operates with dedicated leadership and market expertise. If you know which solution aligns with your needs, we encourage you to connect directly with the appropriate team.',
                'commitment_desc_two' => 'If you are exploring how Amynta Risk Solutions may support a more complex exposure or structured program, we welcome a conversation.',
                'get_in_touch_title' => 'Get in Touch',
                'get_in_touch_desc_one' => 'We build lasting relationships through transparency, integrity, and a client-first approach. Every decision is guided by your success.',
                'get_in_touch_desc_two' => 'We build lasting relationships through transparency, integrity, and a client-first approach. Every decision is guided by your success.',
                'get_in_touch_primary_button_text' => 'Speak With a Division Leader',
                'get_in_touch_primary_button_url' => '#',
                'get_in_touch_secondary_button_text' => 'Submit an Inquiry',
                'get_in_touch_secondary_button_url' => '#',
            ]
        ]);
    }
}
