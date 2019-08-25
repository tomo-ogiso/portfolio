@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>記事/新規作成</h2>
      <br>
      <form action="{{ action("Admin\ArticleSubmissionController@create") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="title"><span class="badge badge-danger">必須</span>タイトル：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="title" value="{{ old("title") }}" placeholder="例）英会話が上手くなるコツ">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="contents"><span class="badge badge-danger">必須</span>内容：</label>
          <div class="col-md-10">
            <textarea class="form-control" type="text" name="contents"　rows="20" placeholder="ここに記事内容を書きましょう。">{{ old("contents") }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="attached_file">添付ファイル：</label>
          <div class="col-md-10">
            <input class="form-control-file" type="file" name="attached_file" value="{{ old("attached_file") }}">
          </div>
        </div>
        <p>※ここで作成した質問は”記事タイムライン”へ自動的に投稿されます。</p>
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
