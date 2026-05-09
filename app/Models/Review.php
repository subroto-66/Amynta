<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'reviewer_name',
    'reviewer_position',
    'review_text'
])]

class Review extends Model
{
    //
}
