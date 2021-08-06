@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">参加申請が完了しました</div>
                <div class="card-body">
                    <p>申請が許可されると登録したメールアドレス宛に
                     参加者用URLが送られます。</p>
                </div>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">投稿一覧に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection