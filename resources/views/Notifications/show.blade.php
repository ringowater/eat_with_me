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
                <div class="btn btn-primary">
                <div class="btn btn-primary btn-block">
                     <a href="{{ route('posts.index') }}">投稿一覧に戻る</a>
                     <br>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection