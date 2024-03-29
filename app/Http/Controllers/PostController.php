<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest $request
     * @param  Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Search for posts by title or content.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $posts = Post::search(request('q'))->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Like a post.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function like(Post $post)
    {
        auth()->user()->like($post);

        return $post;
    }

    /**
     * Unlike a post.
     *
     * @param  Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlike(Post $post)
    {
        auth()->user()->unlike($post);

        return $post;
    }
}
