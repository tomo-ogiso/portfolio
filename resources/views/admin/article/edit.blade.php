@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>記事投稿/編集</h2>
      <br>
      <form action="{{ action("Admin\ArticleSubmissionController@update") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="title"><span class="badge badge-danger">必須</span>タイトル</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="title" value="{{ $article_form->title }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="contents"><span class="badge badge-danger">必須</span>内容：</label>
          <div class="col-md-10">
            <textarea class="form-control" type="text" name="contents"　rows="20">{{ $article_form->contents }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="attached_file">添付ファイル：</label>
          <div class="col-md-10">
            <input class="form-control" type="file" name="attached_file" value="{{ $article_form->attached_file }}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            <input type="hidden" name="id" value="{{ $article_form->id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
