<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::all();
        $posts->load('user');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post; 

        $post -> title    = $request -> title; 
        $post -> content  = $request -> content; 
        $post -> event_date  = $request -> event_date; 
        $post -> participants_age_group  = $request -> participants_age_group; 
        $post -> participants_number  = $request -> participants_number; 
        $post -> category_type  = $request -> category_type; 
        $post -> meeting_link  = $request -> meeting_link; 
        $post -> user_id  = Auth::id(); 

        $post -> save(); 
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post->load('user', 'comments');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post -> title    = $request -> title; 
        $post -> content  = $request -> content; 
        $post -> event_date  = $request -> event_date; 
        $post -> participants_age_group  = $request -> participants_age_group; 
        $post -> participants_number  = $request -> participants_number; 
        $post -> category_type  = $request -> category_type; 
        $post -> meeting_link  = $request -> meeting_link; 
        $post -> user_id  = Auth::id(); 

        $post -> save(); 

        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post -> delete();

        return redirect()->route('posts.index');
    }
}
