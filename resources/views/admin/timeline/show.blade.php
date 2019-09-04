@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>記事タイムライン/詳細</h2>
      <br>
      <div class="card mb-4">
        <div class="card-header">
          @if ($article->user_id == $user->id)
            <a href="{{ action('Admin\ProfileController@list')}}">
          @else
            <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $article->user_id])}}">
          @endif
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
          <p><b>記事内容：</b><br>{!! nl2br(e($article->contents)) !!}</p>
          @if ($article->attached_file != null)
            <p><b>添付ファイル：<img src="{{ $article->attached_file }}" alt="" class="image-submission mx-auto"></p>
          @else
            <p><b>添付ファイル：添付ファイルはございません。</b></p>
          @endif
        </div>
        <div class="card-body">
          @if (count($answers) > 0)
            @foreach ($answers as $answer)
              @if ($answer->user_id == $user->id)
                <a href="{{ action('Admin\ProfileController@list')}}">
              @else
                <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $answer->user_id])}}">
              @endif
              @if ($answer->profile == null)
                <p class="image">
                  <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $answer->user->name }}
                </p>
              @else
                @if ($answer->profile['image_path'] == null)
                  <p class="image">
                    <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $answer->profile->name }}
                  </p>
                @else
                  <p class="image">
                    <img src="{{ $answer->profile->image_path }}" alt="" class="image-mini mr-2">{{ $answer->profile->name }}
                  </p>
                @endif
              @endif
                </a>
                <p>コメント：{{ $answer->answer }}</p>
                <div class="col-md-11 text-right">
                  @if ($answer->user_id == $user->id)
                    <a href="{{ action('Admin\OtherAnswerController@edit', ['id' => $answer->id, 'id2' => $article->id]) }}" role='button' class='btn btn-success'>コメントの編集</a>
                    <a href="{{ action('Admin\OtherAnswerController@delete', ['id' => $answer->id]) }}" role='button' class='btn btn-danger'>コメントの削除</a>
                  @endif
                </div>
                <hr size="3" color="gray">
            @endforeach
          @else
            <p>※コメントはありません。</p>
          @endif
          @if ($article->user_id != $user->id)
            <div class="row">
              <div class="col-md-11 text-right">
                <a href="{{ action('Admin\OtherAnswerController@add', ['id' => $article->id]) }}" role='button' class='btn btn-success'>コメントの新規作成</a>
              </div>
            </div>
          @endif
        </div>
        <div class="card-footer">
          <span class="mr-4">
            投稿日時 <small>{{ $article->created_at->format('Y年m月d日') }}</small>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
