<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable =['image', 'name', 'description', 'url', 'tags'];
}
