<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable= ['name', 'email', 'phone', 'message', 'documentation', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
