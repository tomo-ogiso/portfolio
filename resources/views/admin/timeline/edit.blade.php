@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>コメント/編集</h2>
      <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $article->user_id])}}">
          @if ($article->profile == null)
            <p class="image">
              <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $article->user->name }}
            </p>
          @else
            @if ($article->profile['image_path'] == null)
              <p class="image">
                <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $article->profile->name }}
              </p>
            @else
              <p class="image">
                <img src="{{ $article->profile->image_path }}" alt="" class="image-mini mr-2">{{ $article->profile->name }}
              </p>
            @endif
          @endif
          </a>
          <p><b>タイトル：{{ $article->title }}</b></p>
          <hr size="3" color="gray">
          <p><b>記事内容：</b><br>{{ $article->contents }}</p>
          <hr size="3" color="gray">
          @if ($article->attached_file != null)
            <p><b>添付ファイル：<img src="{{ $article->attached_file }}" alt="" class="image-profile mx-auto"></p>
          @else
            <p><b>添付ファイル：添付ファイルはございません。</b></p>
          @endif
          <hr size="3" color="gray">
        </div>
      </div>
      <form action="{{ action("Admin\OtherAnswerController@update") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="answer"><span class="badge badge-danger">必須</span>コメント：</label>
          <div class="col-md-10">
            <textarea class="form-control" rows="5" name="answer">{{ $answer_form->answer }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            <input type="hidden" name="id" value="{{ $answer_form->id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
