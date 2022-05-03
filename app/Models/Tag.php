<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'name',
        'post'
    ];

    use HasFactory;

    public function apartments() 
    {
        return $this->belongsToMany(Apartment::class);
    }

    public function posts() 
    {
        return $this->belongsToMany(Post::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }
}
