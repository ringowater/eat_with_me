@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>タイトル：{{ $user->name }}</h5>
            </div>
   
        </div>
    </div>
</div>
@endsection