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

          <div class="card-body media align-items-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
            <div class="media-body ml-4">
              <label class="btn btn-outline-primary">
                Upload new photo
                <input type="file" class="account-settings-fileinput">
              </label> &nbsp;
              <button type="button" class="btn btn-default md-btn-flat">Reset</button>

              <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>
          </div>
          <hr class="border-light m-0">

<!-- ＜プロフィール編集＞ -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
          {{csrf_field()}}
          {{method_field('PATCH')}}
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
            <button type="submit" class="btn btn primary">更新する</button>
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
          <div class="card-body pb-2">
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
          <hr class="border-light m-0">


<!-- ＜参加申請中の投稿＞  -->
        </div>
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

<div class="text-right mt-3">
  <button type="submit" class="btn btn-primary">更新する</button>&nbsp;
  <a href="{{ route('posts.index')}}" class="btn btn-primary">キャンセル</a> 
</div>
</div>
</form>
@endsection