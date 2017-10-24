<?php

namespace Blog;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
     * A user can have many favorites.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Get all users that are following the current user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follow_id', 'user_id')->withTimestamps();
    }

    /**
     * Get all users that the current user is following.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follow_id')->withTimestamps();
    }

    /**
     * Check whether the user favorited a post.
     *
     * @param  Post $post
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function favoritedTo($post)
    {
        return $this->favorites()->where('post_id', $post->id)->first();
    }

    /**
     * Check whether user is following another user.
     *
     * @param  self $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function isFollowing(self $user)
    {
        return $this->with('followers')->findOrFail($user->id);
    }

    /**
     * Set the user's password.
     *
     * @param  string $password
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Get the user's avatar image.
     *
     * @param  string $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return '/images/avatars/' . $value;
    }
}
