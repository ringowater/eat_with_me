@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-8">
            <div class="card-header">
                <h5>タイトル：{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">内容：{{ $post->content }}</p>
                <p class="card-text">開催日時：{{ $post->event_date }}</p>
                <p class="card-text">カテゴリー：{{ $post->category_type }}</p>
                <p class="card-text">募集対象・人数：{{ $post->participants_age_group }}   {{ $post->participants_number }}人</p>
                
                <div class="row justify-content-around">
                  @if($post->user_id == Auth::id())                
                    <a href="{{ route('posts.show', $post->id )}}" class="btn btn-primary">参加者</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集</a>
                    <div class="col-2 p-0">
                       <form action="{{ route('posts.destroy', $post->id) }}" method='post'>
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <input type='submit' value='削除' class="btn btn-danger" 
                              onclick='return confirm("削除しますか？");'>
                       </form>
                    </div>
                     @else
                     <a href="{{ route('event_requests.create') }}" class="btn btn-primary">参加申請</a>
                     @endif
                 </div>
              </div>
          </div>
      </div>
          
        <!-- <p>投稿日時：{{ $post->created_at }}</p> -->
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
              <form action="{{ route('comments.store') }}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                  <label>コメント</label>
                  <textarea class="form-control" placeholder="内容" rows="5" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
              </form>
            </div>
          </div>

          <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach ($post->comments->sortByDesc('created_at') as $comment)
                    <div class="card mt-3">
                        <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                        <div class="card-body">
                            <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                            <p class="card-text">内容：{{ $comment->content }}</p>
                            <!-- @if($post->user_id == Auth::id() && $comment->user_id != Auth::id()) 
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">返信する</a>
                            @endif -->
                        </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection