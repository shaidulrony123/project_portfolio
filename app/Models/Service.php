<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'description', 'images']; // Make sure to allow 'images' field

    protected $casts = [
        'images' => 'array', // Automatically convert the 'images' field to an array when retrieved
    ];
}
