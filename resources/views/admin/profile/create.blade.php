@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール/新規作成</h2>
      <br>
      <form action="{{ action("Admin\ProfileController@create") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="name"><span class="badge badge-danger">必須</span>名前：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="{{ old("name") }}" placeholder="例）ギブテック太郎">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="goal">目標：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="goal" value="{{ old("goal") }}" placeholder="例）英会話ができるようになること">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="introduction"><span class="badge badge-danger">必須</span>自己紹介：</label>
          <div class="col-md-10">
            <textarea class="form-control" name="introduction" rows="20" placeholder="例）初めまして。福岡生まれの22歳です。夢は英語を話して旅をすることです。">{{ old("introduction") }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="image">画像：</label>
          <div class="col-md-10">
            <input type="file" class="form-control-file" name="image">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            @csrf
            <input class="btn btn-primary" type="submit" value="完了">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
