@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
                </div>
                <div class="form-group">
                    <label>説明</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label>日時</label>
                    <input type="datetime-local" class="form-control" placeholder="タイトルを入力して下さい" name="event_date">
                </div>
                <div class="form-group">
                    <label>募集人数</label>
                    <p>
                      <select name="participants_number">
                      <option value="">選択してください</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      </select>
                    </p>
                </div>
                <div class="form-group">
                    <label>募集する年代</label>
                    <p>
                      <select name="participants_age_group">
                      <option value="">選択してください</option>
                      <option value="20代">20代</option>
                      <option value="30代">30代</option>
                      <option value="40代">40代</option>
                      <option value="50代">50代</option>
                      <option value="60代">60代</option>
                      </select>
                    </p>
                </div>
                <div class="form-group">
                    <label>カテゴリー（任意）</label>
                    <p>
                      <select name="category_type">
                      <option value="">選択してください</option>
                      <option value="糖質オフ">糖質オフ</option>
                      <option value="フルーツ">フルーツ</option>
                      <option value="低糖質">低糖質</option>
                      <option value="ファスティング">ファスティング</option>
                      <option value="チートデイ">チートデイ</option>
                      </select>
                    </p>
                </div>
                <div class="form-group">
                    <label>参加者用URL</label>
                    <input type="url" class="form-control" placeholder="URLを入力して下さい" name="meeting_link">
                    <p>※参加者用URLなどを記入します。入力した内容は、募集が成立した際にメールで相手に通知されます。<br>募集画面に公開はされません。</p>
                </div>
                <button type="submit" class="btn btn-primary">更新する</button>
                <!-- <button type="submit" class="btn btn-primary"></button> -->
            </form>
        </div>
    </div>
</div>
@endsection