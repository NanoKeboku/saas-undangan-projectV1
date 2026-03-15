<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyContact extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'number',
    ];
}
