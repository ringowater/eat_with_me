@extends('layouts.app')

@section('content')
<div class="container bootstrap-snippet header-container">
    <div class="bg-white">
      <div class="container py-5">
        <div class="media col-md-10 col-lg-8 col-xl-7 p-0 my-4 mx-auto">
          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-70 rounded-circle">
          <div class="media-body ml-5">
            <h4 class="font-weight-bold mb-4">{{$user->name}}</h4>
            <div class="text-muted mb-4">
              目標：{{$user->goal}}
            </div>
            <div class="text-muted mb-4">
              年齢：{{$user->age}}
            </div>
            <div class="text-muted mb-4">
              自己紹介<br>
              {{$user->self_introduction}}
            </div>
            
          </div>
        </div>
      </div>
      <hr class="m-0">
      <ul class="nav nav-tabs tabs-alt justify-content-center">
        <li class="nav-item">
          <a class="nav-link py-4 active" href="#">Posts</a>
        </li>
      </ul>
    </div>
    <div class="row">
        <div class="row mx-0">
        @foreach ($user->posts as $post)
        <div class="card text-center col-md-4">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">開催日時：{{ $post->event_date }}</p>
            <p class="card-text">カテゴリー：{{ $post->category_type }}</p>
            <p class="card-text">募集対象・人数：{{ $post->participants_age_group }}   {{ $post->participants_number }}人</p>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細へ</a> 
        </div>
        <div class="card-footer text-muted">
        <p class="card-text"><a href="{{ route('users.index') }}">投稿者：{{ $post->user->name }}</a></p>  
        </div>
        </div>
        @endforeach
        </div>
    </div>
</div>

@endsection