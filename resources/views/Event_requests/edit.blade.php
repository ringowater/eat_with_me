@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card col-md-8">
            <div class="message">
                <div class="main-message text-center mt-4">確認</div>
                <hr class="my-4">
                <div class="sub-message text-center">
                    <p>{{$event_request->user->name}}さんの参加申請を許可しますか？</p>
                </div>
                <form action="{{ route('event_requests.approve', $event_request->id) }}" method="POST">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <input type="hidden" value="{{$event_request->post_id}}" name="post_id">
                <input type="hidden" value="true" name="is_approved">
                <div class="row justify-content-around">              
                <button type="submit" class="btn btn-primary btn-block">許可する</button>
                </div>
                </form>

                <form action="{{ route('event_requests.decline', $event_request->id) }}" class="text-center" method='POST'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" value="{{$event_request->post_id}}" name="post_id">
                <input type="hidden" value="false" name="is_approved">
                <button type="submit" class="btn btn-secondary btn-sm mt-2 mb-4">キャンセルする</button>
                </form>     
             </div>
          </div>
      
     </div>
</div>
@endsection