<?php

namespace Blog;

use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class User extends Authenticatable implements LikerContract, MustVerifyEmail
{
    use Notifiable, Liker, CanFollow, CanBeFollowed;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'avatar', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['followedByAuthUser'];

    /**
     * A user can have many posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * A user can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the user's avatar image.
     *
     * @param  string $value
     * @return string
     */
    public function getAvatarAttribute($value): string
    {
        return asset('/images/avatars/' . $value);
    }

    /**
     * Check whether the user is followed by the authenticated user.
     *
     * @return bool
     */
    public function getFollowedByAuthUserAttribute(): bool
    {
        return $this->isFollowedBy(auth()->user());
    }
}
