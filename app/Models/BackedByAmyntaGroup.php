<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'highlight_title',
    'description_one',
    'description_two',
    'item_title',
])]
class BackedByAmyntaGroup extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class, 'section_name', 'backed_by_amynta_group');
    }
}
