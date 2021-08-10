@extends('layouts.app')

@section('content')
<div class="container">
<div class="container light-style flex-grow-1 container-p-y">



<div class="card overflow-hidden">
  <div class="row no-gutters row-bordered row-border-light">
    <div class="col-md-3 pt-0">
      <div class="list-group list-group-flush account-settings-links">
        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">プロフィール</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">パスワード変更</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">あなたの投稿</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">参加申請中の投稿</a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">マッチングした投稿</a>
        
      </div>
    </div>

<!-- ＜写真アップロード＞ -->
    <div class="col-md-9">
      <div class="tab-content">
        <div class="tab-pane fade active show" id="account-general">
         <div class="form">
          <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          {{method_field('PATCH')}}        
          <div class="card-body text-center">
           <img class="mr-3 rounded-circle" src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/male-512.png" alt="profile-image" style="max-width:250px">
           <p class="mt-2">プロフィール画像</p>
           <div class="media-body ml-4 mt-2">
              <label class="btn btn-outline-primary">
                写真をアップロードする
              <br>
              <input type="file" class="account-settings-fileinput">
              </label> 
            </div>
          </div>
          <hr class="border-light m-0">
<!-- ＜プロフィール編集＞ -->
          <div class="card-body">
            <div class="form-group">
              <label class="form-label">ニックネーム</label>
              <input type="text" class="form-control mb-1" value="{{$user->name}}" name="name">
            </div>
            <div class="form-group">
              <label class="form-label">メールアドレス</label>
              <input type="text" class="form-control" value="{{$user->email}}" name="email">
            </div>
            <div class="form-group">
               <label class="form-label">年齢</label>
               <input type="text" class="form-control mb-1" value="{{$user->age}}" name="age">
            </div>
            <div class="form-group">
              <label class="form-label">目標</label>
              <input type="text" class="form-control" value="{{$user->goal}}" name="goal">
            </div>
            <div class="form-group">
              <label class="form-label">自己紹介</label><br>
              <textarea cols="93" rows="5" name="self_introduction">{{$user->self_introduction}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">更新する</button>
          </div>
         </div>
        </div>

<!-- ＜パスワード変更＞ -->
        <div class="tab-pane fade" id="account-change-password">
          <div class="card-body pb-2">

            <div class="form-group">
              <label class="form-label">現在のパスワード</label>
              <input type="password" class="form-control">
            </div>

            <div class="form-group">
              <label class="form-label">新しいパスワード</label>
              <input type="password" class="form-control">
            </div>

            <div class="form-group">
              <label class="form-label">新しいパスワード（確認用）</label>
              <input type="password" class="form-control">
            </div>

          </div>
        </div>

<!-- ＜あなたの投稿 -->
        <div class="tab-pane fade" id="account-info">
          <div class="row justify-content-center">
            <div class="col-md-8 mt-5 mb-4">
              @foreach ($user->posts as $post)
              <div class="card ">
               <div class="card-body">
                <h5 class="card-title mt-2 mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                    </svg>　　　<a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}
                    </a>
                </h5>   
               </div>
               <p class="mb-2 ml-4 text-muted">投稿日時：{{$post->created_at}}</p>
              </div>
              <br>
             @endforeach
           </div>
          </div>
        </div>

 <!-- ＜参加申請中の投稿＞  -->
        <div class="tab-pane fade" id="account-social-links">
          <div class="card-body pb-2">

            <div class="form-group">
              <label class="form-label">Twitter</label>
              <input type="text" class="form-control" value="https://twitter.com/user">
            </div>
            <div class="form-group">
              <label class="form-label">Facebook</label>
              <input type="text" class="form-control" value="https://www.facebook.com/user">
            </div>
            <div class="form-group">
              <label class="form-label">Google+</label>
              <input type="text" class="form-control" value="">
            </div>
            <div class="form-group">
              <label class="form-label">LinkedIn</label>
              <input type="text" class="form-control" value="">
            </div>
            <div class="form-group">
              <label class="form-label">Instagram</label>
              <input type="text" class="form-control" value="https://www.instagram.com/user">
            </div>

          </div>
        </div>

<!-- ＜マッチングした投稿＞  -->
        <div class="tab-pane fade" id="account-connections">
          <div class="card-body">
            <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
          </div>
          <hr class="border-light m-0">
          <div class="card-body">
            <h5 class="mb-2">
              <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
              <i class="ion ion-logo-google text-google"></i>
              You are connected to Google:
            </h5>
            nmaxwell@mail.com
          </div>
          <hr class="border-light m-0">
          <div class="card-body">
            <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
          </div>
          <hr class="border-light m-0">
          <div class="card-body">
            <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
          </div>
        </div>
        <div class="tab-pane fade" id="account-notifications">
          <div class="card-body pb-2">

            <h6 class="mb-4">Activity</h6>

            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Email me when someone comments on my article</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Email me when someone answers on my forum thread</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Email me when someone follows me</span>
              </label>
            </div>
          </div>
          <hr class="border-light m-0">
          <div class="card-body pb-2">

            <h6 class="mb-4">Application</h6>

            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">News and announcements</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Weekly product updates</span>
              </label>
            </div>
            <div class="form-group">
              <label class="switcher">
                <input type="checkbox" class="switcher-input" checked="">
                <span class="switcher-indicator">
                  <span class="switcher-yes"></span>
                  <span class="switcher-no"></span>
                </span>
                <span class="switcher-label">Weekly blog digest</span>
              </label>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>
@endsection