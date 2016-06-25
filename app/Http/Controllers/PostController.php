<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Category;
use Illuminate\Http\Request;

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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'category' => 'required',
            'body'     => 'required'
        ]);

        $post = new Post($request->all());
        $post->category()->associate($request->input('category'));
        $post->user()->associate(auth()->id());
        $post->save();

        alert()->success('Post created successfully!');

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
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
     * @param  Post  $post
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
     * @param  Request $request
     * @param  Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'    => 'required',
            'category' => 'required',
            'body'     => 'required'
        ]);

        $post->fill($request->all());
        $post->category()->associate($request->input('category'));
        $post->save();

        alert()->success('Post updated successfully!');

        return redirect()->home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        alert()->success('Post deleted successfully!');

        return back();
    }
}
