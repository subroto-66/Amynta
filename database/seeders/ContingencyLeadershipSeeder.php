<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContingencyLeadership;

class ContingencyLeadershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContingencyLeadership::insert([
            
            [
                'leadership_title' => 'Leadership Title',
                'leadership_image' => 'leadership.jpg',
                'leadership_name' => 'Leadership Name',
                'leadership_position' => 'Leadership Position',
                'leadership_description' => 'Leadership Description',
                'broker_title' => 'Broker Title',
                'broker_description' => 'Broker Description',
                'primary_broker_button_text' => 'Primary Broker Button Text',
                'primary_broker_button_link' => 'Primary Broker Button Link',
                'secondary_broker_button_text' => 'Secondary Broker Button Text',
                'secondary_broker_button_link' => 'Secondary Broker Button Link',
                'brokers_items_one' => 'Brokers Items One',
                'brokers_items_two' => 'Brokers Items Two',
                'brokers_items_three' => 'Brokers Items Three',
                'brokers_items_four' => 'Brokers Items Four',
                'brokers_items_five' => 'Brokers Items Five',
                'brokers_items_six' => 'Brokers Items Six'
            ]

        ]);
    }
}
