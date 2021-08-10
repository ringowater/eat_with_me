@extends('layouts.app')

@section('content')
<div class="container">
  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
         <div class="card m-4">
          <div class="card-body create-card-body">
           <div class="container">
            <div class="row">
             <div class="col-md-6 md-5 text-center">  
              <img class="mr-3 rounded-circle" src="https://cdn0.iconfinder.com/data/icons/user-pictures/100/male-512.png" alt="Generic placeholder image" style="max-width:200px" >
             </div>
             <div class="col-md-6">
              <h3 class="user-show-title pb-3 mb-0">{{$user->name}}</h3>
              <p>年齢：　{{$user->age}}歳</p>
              <p>目標：　{{$user->goal}}</p>
              <p class="mb-0"></p>
              <p>{{$user->self_introduction}}</p>
             </div>
            </div>
            <br>
            <br>
            <div class="row">
             <div class="col-md-12">
              <hr class="mb-0 mt-0">
              <h3 class="text-center user-show-title my-4">投稿</h3>
             </div>
            </div>
            <div class="row justify-content-center">
             <div class="col-md-12">
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
         </div>
       </div>
     </div>
   </div>
  </div>
 </main>
</div>
@endsection