<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['section_name', 'title', 'image'])]
class Item extends Model
{
    protected $fillable = [
        'section_name',
        'title',
        'image',
    ];
}
