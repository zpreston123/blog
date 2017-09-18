<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
	 * Set the follower's user.
	 *
	 * @param  User $user
     * @return void
	 */
    public function setUserAttribute($user)
    {
    	$this->attributes['user_id'] = $user->getKey();
    }

    /**
     * Set the user as a follower.
     *
     * @param  User $follow
     * @return void
     */
    public function setFollowAttribute($follow)
    {
    	$this->attributes['follow_id'] = $follow->getKey();
    }
}
