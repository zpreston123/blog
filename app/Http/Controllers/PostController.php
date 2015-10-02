<?php

namespace Blog\Http\Controllers;

use Blog\Category;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests;
use Blog\Http\Requests\StorePostRequest;
use Blog\Http\Requests\UpdatePostRequest;
use Blog\Post;
use Blog\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::with('user', 'comments')->latest()->paginate(10);

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->lists('name', 'id')->all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $category = Category::find($request->input('category'));
        $post->category()->associate($category);

        $user = User::find($request->user()->id);
        $post->user()->associate($user);

        $post->save();

        alert()->success('Post created successfully!');

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->get();

        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->lists('name', 'id')->all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest $request
     * @param  Post $post
     * @return Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
