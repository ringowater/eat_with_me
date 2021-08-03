<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;
use App\Notifications\CommentedToPost;
use App\Notifications\RequestSent;
use Auth;

class CommentController extends Controller
{
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $post = Post::findOrfail($request->post_id);  

        $comment = new Comment;              

        $comment -> content    = $request -> content;
        $comment -> user_id = auth()->user()->id;
        $comment -> post_id = $request -> post_id;

        $comment -> save();

        // auth()->user()->notify(new CommentedToPost($comment->id));

        return view('posts.show', compact('post'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $comment = Comment::find($id);

        // if(Auth::id() !== $comment->user_id){
        //     return abort(403, 'これはあなたの投稿ではありません');
        // }

        // $comment -> delete();
            
        // $post = Post::find($comment->post_id);
        
        // return view('posts.show', compact('post'));  
    }
}
