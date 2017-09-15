<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Blog\Favorite;

class FavoriteController extends Controller
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
        $favorites = auth()->user()->favorites;

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store()
    {
        $post = Post::findOrFail(request('post_id'));

        $favorite = Favorite::create([
            'user' => auth()->user(),
            'post' => $post
        ]);

        return $favorite;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return response('', 204);
    }
}
