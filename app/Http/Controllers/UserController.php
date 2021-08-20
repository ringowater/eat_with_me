<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Http\Requests\UserRequest;



class UserController extends Controller
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
    public function store(UserRequest $request)
    {
        $user = new User;

        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> age = $request -> age;
        $user -> goal = $request -> goal;

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);

            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 250,
                'height'    => 250
            ]);
            $post->image_path = $logoUrl;
            $post->public_id  = $publicId;
        }

        $user -> save();
        return redirect()->route('users.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $user = User::find($id);
        $user->load('posts', 'comments');
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user->load('posts', 'comments');
        $participation_posts = Post::with('event_requests')
        ->where('user_id', '<>', $user->id)
        ->whereHas('event_requests', function($q) use ($user) {
            $q->where('event_requests.user_id', $user->id)
              ->where('is_approved', 1);
        })
        ->get();

        $application_posts = Post::with('event_requests')
        ->where('user_id', '<>', $user->id)
        ->whereHas('event_requests', function($q) use ($user) {
            $q->where('event_requests.user_id', $user->id)
              ->where('is_approved', 0);
        })
        ->get();
        
        return view('users.edit', compact('user', 'participation_posts', 'application_posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
       $user = User::find($id);

       $user->name = $request->name;
       $user->email = $request->email;
       $user->age = $request->age;
       $user->goal = $request->goal;
       $user->self_introduction = $request->self_introduction;

       $user->save();
       return view('users.edit', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
