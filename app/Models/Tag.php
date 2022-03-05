<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function apartments() 
    {
        return $this->hasMany(Apartment::class);
    }

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }
}
