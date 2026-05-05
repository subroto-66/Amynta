<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([

    'leadership_title',
    'leadership_description',
    'leadership_image',
    'leadership_name',
    'leadership_position',

    'broker_title',
    'broker_description',

    'primary_broker_button_text',
    'primary_broker_button_link',
    'secondary_broker_button_text',
    'secondary_broker_button_link',

    'brokers_items_one',
    'brokers_items_two',
    'brokers_items_three',
    'brokers_items_four',
    'brokers_items_five',
    'brokers_items_six'

])]

class ContingencyLeadership extends Model
{
    //
}
