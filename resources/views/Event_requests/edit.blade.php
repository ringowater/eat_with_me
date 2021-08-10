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
                <form action="{{ route('event_requests.update', $event_request->id) }}" method="POST">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <input type="hidden" value="{{$event_request->post_id}}" name="post_id">
                <input type="hidden" value="true" name="is_approved">
                <input type="hidden" value="true" name="is_checked">
                <div class="row justify-content-around">              
                <button type="submit" class="btn btn-primary btn-lg mr-4">許可する</button>
                </div>
                </form>

                <form action="{{ route('event_requests.destroy', $event_request->id) }}" method='post'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type='submit' value='キャンセルする' class="btn btn-danger btn-lg" onclick='return confirm("{{$event_request->user->name}}さんからの申請をキャンセルしますか？")'>
                </form>     
             </div>
          </div>
      
     </div>
</div>
@endsection