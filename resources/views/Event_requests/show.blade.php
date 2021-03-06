@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-8">
            <div class="message">
                <div class="main-message text-center mt-4">参加申請が完了しました</div>
                <hr class="my-4">
                <div class="sub-message text-center">
                    <p>申請が許可されると登録したメールアドレス宛に
                     参加者用URLが送られます。</p>
                </div>
                <div class="btn btn-primary btn-block">
                     <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">投稿一覧に戻る</a>
                     <br>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection