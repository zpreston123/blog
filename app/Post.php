<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['author'];

    /**
     * Get the category associated with the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author associated with the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A post can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all tags associatd with the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Add an author to the post.
     *
     * @param  User $author
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addAuthor($author)
    {
        return $this->author()->associate($author);
    }

    /**
     * Add a category to the post.
     *
     * @param  Category $category
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addCategory($category)
    {
        return $this->category()->associate($category);
    }

    /**
     * Add a comment to the post.
     *
     * @param  User $author
     * @param  array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addComment($author, $attributes)
    {
        return $this->comments()->save(
            (new Comment($attributes))->byAuthor($author)
        );
    }

    /**
     * Add tag(s) to the post.
     *
     * @param  mixed $tags
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addTags($tags)
    {
        return $this->tags()->attach($tags);
    }

    /**
     * Sync the list of tags associated with the post.
     *
     * @param  array $tags
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function syncTags($tags)
    {
        return $this->tags()->sync($tags ?? []);
    }

    /**
     * Scope a query to search posts by terms the user entered.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $terms
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $terms)
    {
        return $query->where('title', 'LIKE', '%'.$terms.'%')
                    ->orWhere('body', 'LIKE', '%'.$terms.'%')
                    ->latest();
    }

    /**
     * Check whether the post is marked as favorite by the user.
     *
     * @return boolean
     */
    public function favorited()
    {
        return (bool) Favorite::where('user_id', auth()->id())
                            ->where('post_id', $this->id)
                            ->first();
    }
}
