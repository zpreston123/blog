<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

	/**
	 * Get all posts associated with the tag.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function posts()
	{
	    return $this->belongsToMany(Post::class);
	}
}
