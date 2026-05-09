<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BuiltRfpForm;

class BuiltRfpFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        BuiltRfpForm::create([
            'title' => 'BuiltRfpForm',
            'description' => 'BuiltRfpForm',
            'button_text' => 'BuiltRfpForm',
            'button_link' => 'BuiltRfpForm',
            'rfp_form_title' => 'BuiltRfpForm',
            'rfp_form_subtitle' => 'BuiltRfpForm',
            'rfp_item_one' => 'BuiltRfpForm',
            'rfp_item_two' => 'BuiltRfpForm',
            'rfp_item_three' => 'BuiltRfpForm',
            'rfp_footer_text' => 'BuiltRfpForm',
        ]);

    }
}
