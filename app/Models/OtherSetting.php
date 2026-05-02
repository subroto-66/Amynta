<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['header_logo', 'fab_icon', 'title', 'meta_title', 'meta_description', 'footer_logo', 'footer_description', 'linkedin_url',
    'instagram_url', 'facebook_url', 'twitter_url', 'copyright'])]
class OtherSetting extends Model
{
    //
}
