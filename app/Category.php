<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * A category can have many posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->hasMany('Blog\Post');
    }
}
