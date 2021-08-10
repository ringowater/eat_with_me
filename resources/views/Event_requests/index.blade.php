@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

      @foreach ($event_requests as $event_request)
       @if($event_request->post->exists())
        <div class="card col-md-8">
            <div class="message">
                <div class="main-message text-center mt-4">確認</div>
                <hr class="my-4">
                <div class="sub-message text-center">
                   <p>{{$event_request->user->name}}さんから【【{{$event_request->post->title}}】への参加申請が届きました</p>
                </div>
                <div class="text-center">              
                    <a href="{{ route('event_requests.edit', $event_request->id) }}" class="btn btn-primary btn-lg mr-4">確認する</a>                  
                </div>
             </div>
          </div>
         @endif
        @endforeach
      
     </div>
</div>
@endsection