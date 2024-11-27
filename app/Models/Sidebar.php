<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    protected $fillable =['image','name', 'slug', 'github_link', 'twitter_link', 'linkedin_link', 'facebook_link'];
}
