<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $followingIds = auth()->user()
            ->followings()
            ->pluck('followable_id');

        $posts = Post::withCount('likers')
            ->whereIn('user_id', $followingIds)
            ->orWhere('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post([
            'title' => str($request->title)->squish(),
            'body' => str($request->body)->squish()
        ]);
        $post->addCategory($request->category);
        $post->addAuthor(auth()->user());
        $post->save();

        $post->addTags($request->tags);

        flash()->success('Post saved successfully!')->important();

        return to_route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = str($request->title)->squish();
        $post->body = str($request->body)->squish();
        $post->addCategory($request->category);
        $post->save();

        $post->syncTags($request->tags);

        flash()->success('Post updated successfully!');

        return to_route('posts.index');
    }

    public function destroy(Post $post)
    {
        if (count($post->comments) > 0) {
            $post->comments->each(function ($comment) {
                $comment->delete();
            });
        }

        if ($post->liked) {
            $post->likes->each(function ($like) {
                $like->delete();
            });
        }

        $post->delete();

        flash()->success('Post deleted successfully!');

        return back();
    }

    public function search()
    {
        $posts = Post::search(request('q'))->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function like(Post $post)
    {
        auth()->user()->like($post);

        return $post;
    }

    public function unlike(Post $post)
    {
        auth()->user()->unlike($post);

        return $post;
    }
}
