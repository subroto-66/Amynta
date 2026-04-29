<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'full_name',
    'email',
    'phone',
    'message',
    'status',
])]
class ContactUs extends Model
{
    //
}
