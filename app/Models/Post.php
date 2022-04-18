<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'text',
        'img_url',
        'post_id',
        'user_id',
        'city_id'
    ];

    protected $casts = [
        'created_at'  => 'datetime:d/m/Y H:m',
    ];

    protected $appends = [
        "likes"   
    ];

    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function comments()
    {
        return $this->hasMany(Post::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class);
    }

    public function getLikesAttribute() {
        return $this->likes()->get()->count();
    }
}
