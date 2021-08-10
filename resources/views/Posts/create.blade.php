@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-8">
            @if ($errors->any()) 
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-title text-center">
              <h3 class="create-title mt-4 mb-4">募集を作成</h3>
              <hr class="m-0">
            </div>
            <div class="create-form">
            <form action="{{ route('posts.store') }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
                </div>
                <div class="form-group">
                    <label for="description">説明</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="content"></textarea>
                </div>
                <hr class="my-4">
                <div class="row">
                 <div class="col-6">
                  <h4 class="create-detail">募集の詳細</h4>
                  </div>
                </div>
                <div class="row">
                 <div class="col-md-10 offset-md-2 col-12">
                  <div class="form-group create-form">
                    <label for="date" class="mb-o mb-md-2">日時</label>
                    <input type="datetime-local" class="form-control mt-1" placeholder="タイトルを入力して下さい" name="event_date">
                  </div>
                  <div class="form-group create-form">
                    <label for="participants" class="mb-o mb-md-2">募集人数</label>
                    <p>
                      <select name="participants_number" class="form-control mt-1">
                      <option value="">選択してください</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                    </p>
                  </div>
                  <div class="form-group create-form">
                    <label for="age-group" class="mb-o mb-md-2">募集する年代</label>
                    <p>
                      <select name="participants_age_group" class="form-control mt-1">
                      <option value="">選択してください</option>
                      <option value="20代">20代</option>
                      <option value="30代">30代</option>
                      <option value="40代">40代</option>
                      <option value="50代">50代</option>
                      <option value="60代">60代</option>
                      </select>
                    </p>
                  </div>
                  <div class="form-group create-form">
                    <label for="category" class="mb-o mb-md-2">カテゴリー（任意）</label>
                    <p>
                      <select name="category_type" class="form-control mt-1">
                      <option value="">選択してください</option>
                      <option value="糖質オフ">糖質オフ</option>
                      <option value="フルーツ">フルーツ</option>
                      <option value="低糖質">低糖質</option>
                      <option value="ファスティング">ファスティング</option>
                      <option value="チートデイ">チートデイ</option>
                      </select>
                    </p>
                  </div>
                </div>
                </div>
                <hr class="my-4">
                <div class="form-group create-form">
                    <label for="link"><h4>参加者用URL</h4></label>
                    <input type="url" class="form-control mt-1" placeholder="URLを入力して下さい" name="meeting_link">
                    <br>
                    <p>※参加者用URLなどを記入します。入力した内容は、募集が成立した際にメールで相手に通知されます。<br>募集画面に公開はされません。</p>
                </div>
                <button type="submit" class="btn btn-primary btn-block">投稿する</button>
                <br>
                <div class="col text-center">
                <button type="button" onclick="history.back()" class="btn btn-secondary btn-block">戻る</button>
                <br>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection