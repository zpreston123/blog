<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    protected $hidden = ['post_id', 'user_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id')
                    ->select(['id', 'name', 'avatar']);
    }

    public function byAuthor($author)
    {
        return $this->author()->associate($author);
    }
}
