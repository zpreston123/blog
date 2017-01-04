<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Category;
use Blog\Comment;

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
        $posts = Post::latest()->simplePaginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name', 'id')->all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->validate(request(), [
            'title'    => 'required',
            'category' => 'required',
            'body'     => 'required'
        ]);

        $post = new Post(request()->all());
        $post->addCategory(request('category'));
        $post->addAuthor(auth()->user());
        $post->save();

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id')->all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Post $post
     * @return Response
     */
    public function update(Post $post)
    {
        $this->validate(request(), [
            'title'    => 'required',
            'category' => 'required',
            'body'     => 'required'
        ]);

        $post->fill(request()->all());
        $post->addCategory(request('category'));
        $post->save();

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

    /**
     * Search for posts by title or content.
     *
     * @return Response
     */
    public function search()
    {
        $posts = Post::where('title', 'LIKE', '%'.request('q').'%')
                     ->orWhere('body', 'LIKE', '%'.request('q').'%')
                     ->latest()
                     ->simplePaginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Get the comments associated with a post.
     *
     * @param  int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getComments($id)
    {
        return Comment::with('author')->where('post_id', $id)->get();
    }
}
