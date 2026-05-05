<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
        'title',
        'description_one',
        'description_two',
        'image',
        'image_text',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',])]

class TeamOverview extends Model
{
    //
}
