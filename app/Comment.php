<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['post_id', 'user_id'];

    /**
     * Get the post associated with a comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the author associated with a comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id')
                    ->select(['id', 'name', 'avatar']);
    }

    /**
     * Associate an author with the comment.
     *
     * @param  User $author
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function byAuthor($author)
    {
        return $this->author()->associate($author);
    }
}
