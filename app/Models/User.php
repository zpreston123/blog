<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFollow\Traits\Followable;
use Overtrue\LaravelFollow\Traits\Follower;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable, Follower, Liker;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'gender',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = ['followedByAuthUser'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function avatar(): Attribute
    {
        return new Attribute(
            get: fn ($value) => asset('/images/avatars/' . $value)
        );
    }

    public function getFollowedByAuthUserAttribute(): bool
    {
        return $this->isFollowedBy(auth()->user());
    }
}
