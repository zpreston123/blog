<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user associated with the favorite.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post associated with the favorite.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

	/**
	 * Set the favorite's user.
	 *
	 * @param  User $user
     * @return void
	 */
    public function setUserAttribute($user)
    {
    	$this->attributes['user_id'] = $user->getKey();
        $this->setRelation('user', $user);
    }

    /**
     * Set the favorite's post.
     *
     * @param  Post $post
     * @return void
     */
    public function setPostAttribute($post)
    {
    	$this->attributes['post_id'] = $post->getKey();
        $this->setRelation('post', $post);
    }
}
