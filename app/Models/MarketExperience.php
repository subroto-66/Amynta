<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'platform_title',
    'platform_description_one',
    'platform_item_one',
    'platform_item_two',
    'platform_item_three',
    'platform_description_two',
    'market_experience_title',
    'market_experience_description',
    'market_experience_name',
    'market_experience_name_description',
    'market_experience_quote',
])] 
class MarketExperience extends Model
{
    //
}
