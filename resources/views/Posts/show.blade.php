@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="card col-md-8">
            <div class="card-title pt-3">
              <h1 class="card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-check2-square ml-3" viewBox="0 0 16 16">
                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                        </svg>　{{ $post->title }}
                        </h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <div class="media">
                      <img class="mr-3 rounded-circle" src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/male-512.png" alt="Generic placeholder image" style="max-width:100px" >
                      <div class="ml-5">{{$post->content}}</div>
                  </div>
                  <p class="pt-3">{{$post->user->name}}（{{$post->user->age}}歳）</p>
                  <br>
                  <input type="text" class="form-control" placeholder="開催日時：{{ $post->event_date }}" name="event_date">
                  <br>
                  <input type="text" class="form-control" placeholder="カテゴリー：{{ $post->category_type }}" name="category">
                  <br>
                  <input type="text" class="form-control" placeholder="募集対象・人数：{{ $post->participants_age_group }}   {{ $post->participants_number }}人" name="number of people">
                </div>
                
                <div class="row justify-content-around">
                  @if($post->user_id == Auth::id())                
                    <a href="{{ route('posts.show', $post->id )}}" class="btn btn-primary btn-lg">参加者</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-lg">編集</a>
                    <div class="col-2 p-0">
                       <form action="{{ route('posts.destroy', $post->id) }}" method='post'>
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <input type='submit' value='削除' class="btn btn-danger btn-lg" 
                              onclick='return confirm("削除しますか？");'>
                       </form>
                    </div>
                     @else
                     <form action="{{ route('event_requests.store') }}" method="POST">
                     {{csrf_field()}}
                     <input type="hidden" value="{{$post->id}}" name="post_id">
                     <input type="hidden" value="false" name="is_approved">
                     <input type="hidden" value="false" name="is_checked">
                     <button type="submit" class="btn btn-primary btn-lg">参加申請</button>
                     </form>
                     @endif
                 </div>
              </div>
          </div>
      </div>
      <br>   

<!-- <p>投稿日時：{{ $post->created_at }}</p> -->
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
              <form action="{{ route('comments.store') }}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                  <div class="text-center py-4"><h5>質問してみましょう!</h5></div>
                  <textarea class="form-control" placeholder="内容" rows="5" name="content"></textarea>
                </div>
                 <div class="text-center py-4"><button type="submit" class="btn btn-primary btn-block">質問する</button></div>
              </form>
                
                <div class="md-12">
                    @foreach ($post->comments->sortByDesc('created_at') as $comment)
                    <div class="card mt-3">
                      <div class="media ml-2 mt-2 mb-2">
                       <img class="mr-3 rounded-circle" src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/male-512.png" alt="Generic placeholder image" style="max-width:60px" >
                       <div class="card-text">
                        <p class="card-text mt-2">{{ $comment->content }}<br>{{$post->user->name}}（{{$post->user->age}}歳）</p>
                       </div>
                      </div>
                      <!-- <p class="ml-2 card-title">{{ $comment->created_at }}</hp> -->
                    </div>
                    @endforeach
                  </div>
                  <br>
                 </div>
              </div>
            </div>
         </div>
     </div>
</div>
@endsection