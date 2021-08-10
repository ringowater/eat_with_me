@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="card my-5">
     <div class="card-title text-center mb-0">
      <h3 class="mb-0 pt-4 register-title">お問い合わせ</h3>
     </div>
     <div class="card-body pb-4">
     <form action="{{ route('contacts.store') }}" method="POST">
      {{csrf_field()}}
       <div class="form-group">
         <label for="category">お問い合わせ項目を選択してください</label>
         <select class="form-control mt-0" name="category_id">
         <option selected="selected">選択してください</option>
          <option value="selected">会員登録・ログインについて</option>
          <option value="selected">機能不全について</option>
          <option value="selected">不具合報告</option>
          <option value="selected">トラブル</option>
          <option value="selected">その他</option>
        </select>
      </div>
      <div class="form-group">
       <label for="content">お問い合わせ内容</label>
       <textarea class="form-control mt-0" placeholder name="body" cols="50" rows="10"></textarea>
      </div>
      <div class="form-group">
       <button class="btn submit-btn-blue form-control" type="submit" value="送信する">送信する</button>
      </div>
    </form>
    <a href="">退会したい</a>
  </div>
 </div>
</div>
</div>
</div>
@endsection



      
     