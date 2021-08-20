<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event_request;
use App\Http\Requests\Event_requestRequest;
use App\Post;
use Auth;
use App\User;

class Event_requestController extends Controller
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
        $userId = Auth::id();

        $event_requests = Event_request::with('post')
        ->whereHas('post', function ($q) use ($userId) {
            $q->where('posts.user_id', $userId)
              ->where('is_checked',  '=', 'false');
        })
        ->get();

        return view('event_requests.index', compact('event_requests'));
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
    public function store(Event_requestRequest $request)
    {
        $post = Post::find($request->post_id);

        $event_request = new Event_request;

        $event_request -> user_id = auth()->user()->id;
        $event_request -> post_id = $request -> post_id;
        $event_request -> is_approved = false;
        $event_request -> is_checked = false;

        $event_request -> save();
        return view('event_requests.show', compact('event_request'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('event_requests.show', compact('event_request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event_request = Event_request::find($id);

        return view('event_requests.edit', compact('event_request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Event_requestRequest $request, $id)
    {
        // $event_request = Event_request::find($id);

        // $event_request->user_id = auth()->user()->id;
        // $event_request->post_id = $request->post_id;
        // $event_request -> is_approved = $request->is_approved;
        // $event_request -> is_checked = true;

        // $event_request->save();

        // return view('event_requests.show', compact('event_request'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event_request = Event_request::find($id);

        $event_request->delete();

        return redirect()->route('event_requests.index');
    }

    public function approve(Event_requestRequest $request, $id)
    {
        $event_request = Event_request::find($id);

        $event_request -> is_approved = $request->is_approved;
        $event_request -> is_checked = true;

        $event_request->save();

        return view('event_requests.show', compact('event_request'));
    }

    public function decline(Event_requestRequest $request, $id)
    {
        $event_request = Event_request::find($id);

        $event_request -> is_approved = $request->is_approved;
        $event_request -> is_checked = true;

        $event_request->save();

        return view('event_requests.show', compact('event_request'));
    }
}
