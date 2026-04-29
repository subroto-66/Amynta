<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['title',
    'sub_title',
    'title_two',
    'description',
    'title_three',
    'primary_button_text',
    'primary_button_link',
    'secondary_button_text',
    'secondary_button_link'])]
class Commitment extends Model
{
    //
}
