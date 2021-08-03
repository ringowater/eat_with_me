@extends('layouts.app')

@section('content')

<div class="container pt-5">
              <div class="row">
                <div class="col-md-8 order-md-2 col-lg-9">
                  <div class="container-fluid">
                    <div class="row   mb-5">
                      <div class="col-12">
                        <div class="dropdown text-md- text-center float-md-right mb-3 mt-3 mt-md-0 mb-md-0">
                          <label class="mr-2">Sort by:</label>
                          <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(71px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="#"></a>
                          </div>
                        </div>
                        <div class="btn-group float-md-right ml-3">
                          <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                          <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                        </div>
        
                      </div>
                    </div>
                    <div class="row">
                    <div class="row mx-0">
                    @foreach ($posts as $post)
                    <div class="card text-center col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">開催日時：{{ $post->event_date }}</p>
                        <p class="card-text">カテゴリー：{{ $post->category_type }}</p>
                        <p class="card-text">募集対象・人数：{{ $post->participants_age_group }}   {{ $post->participants_number }}人</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細へ</a> 
                    </div>
                    <div class="card-footer text-muted">
                    <p class="card-text"><a href="{{ route('users.show', $post->user_id) }}">投稿者：{{ $post->user->name }}</a></p>  
                    </div>
                    </div>
                    @endforeach
                    </div>
                    </div>
                    <div class="row sorting mb-5 mt-5">
                      <div class="col-12">
                        <!-- <a class="btn btn-light"> -->
                          <i class="fas fa-arrow-up mr-2"></i></a>
                        <div class="btn-group float-md-right ml-3">
                          <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
                          <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                  <h3 class="mt-0 mb-5">Showing <span class="text-primary">12</span> Products</h3>
                  <h6 class="text-uppercase font-weight-bold mb-3">カテゴリー</h6>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="category-1">
                      <label class="custom-control-label" for="category-1">🥒野菜</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="category-2">
                      <label class="custom-control-label" for="category-2">🍙糖質オフ</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="category-3">
                      <label class="custom-control-label" for="category-3">🍎フルーツ</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="category-4">
                      <label class="custom-control-label" for="category-4">😎低糖質</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="category-5">
                      <label class="custom-control-label" for="category-5">🐱ファスティング</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="category-6">
                      <label class="custom-control-label" for="category-6">🍖チートデイ</label>
                    </div>
                  </div>
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">募集年代</h6>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="filter-size-1">
                      <label class="custom-control-label" for="filter-size-1">20代</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="filter-size-2">
                      <label class="custom-control-label" for="filter-size-2">30代</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="filter-size-3">
                      <label class="custom-control-label" for="filter-size-3">40代</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="filter-size-4">
                      <label class="custom-control-label" for="filter-size-4">50代</label>
                    </div>
                  </div>
                  <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="filter-size-5">
                      <label class="custom-control-label" for="filter-size-5">全ての年代</label>
                    </div>
                  </div>
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">日時</h6>
                  <div class="day_n_time">
                    <input type="datetime-local" class="form-control w-70 pull-left mb-2" value="" id="event_date">
                  </div>
                  <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
                  <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                  <a href="#" class="btn btn-lg btn-block btn-primary mt-5">検索する</a>
                </div>
              </div>
            </div>
@endsection
