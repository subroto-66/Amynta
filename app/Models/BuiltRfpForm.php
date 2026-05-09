<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable([

    'title',
    'description',
    'button_text',
    'button_link',
    'rfp_form_title',
    'rfp_form_subtitle',
    'rfp_item_one',
    'rfp_item_two',
    'rfp_item_three',
    'rfp_footer_text'
    
])]
class BuiltRfpForm extends Model
{
    //
}
