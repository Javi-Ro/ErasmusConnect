<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'address',
        'bedrooms',
        'phone',
        'email',
        'img_url', 
        'surface',
        'user_id',
        'city_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
