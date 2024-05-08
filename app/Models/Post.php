<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ['title', 'body'];

    protected $with = ['author'];

    protected $appends = ['is_liked', 'likes_count'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addAuthor($author)
    {
        return $this->author()->associate($author);
    }

    public function addCategory($category)
    {
        return $this->category()->associate($category);
    }

    public function addComment($author, $body)
    {
        return $this->comments()->save(
            (new Comment(['body' => $body]))->byAuthor($author)
        );
    }

    public function addTags($tags)
    {
        return $this->tags()->attach($tags);
    }

    public function syncTags($tags)
    {
        return $this->tags()->sync($tags ?? []);
    }

    public function scopeSearch($query, $terms)
    {
        return $query->where('title', 'LIKE', '%'.$terms.'%')
                    ->orWhere('body', 'LIKE', '%'.$terms.'%')
                    ->latest();
    }

    public function isLiked(): Attribute
    {
        return new Attribute(
            get: fn () => $this->isLikedBy(auth()->user())
        );
    }

    public function likesCount(): Attribute
    {
        return new Attribute(
            get: fn () => $this->likers()->count()
        );
    }
}
