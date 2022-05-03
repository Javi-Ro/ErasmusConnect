<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
        'city_id',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date:d/m/Y'
    ];

    protected $appends = [
        'followers',
        'following'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class, "friends", "user2_id", "user_id");
    }
    
    public function following() {
        return $this->belongsToMany(User::class, "friends", "user_id", "user2_id");
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function savedPosts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getFollowersAttribute() {
        return $this->followers()->get()->count();
    }

    public function getFollowingAttribute() {
        return $this->following()->get()->count();
    }
}
