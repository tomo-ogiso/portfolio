@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>記事投稿/一覧</h2>
      <br>
        @if (count($articles) > 0)
          <div class="row">
            <div class="col-md-11 text-right">
              <a href="{{ action('Admin\ArticleSubmissionController@add') }}" role='button' class='btn btn-success'>新規作成</a>
            </div>
          </div>
          @foreach ($articles as $article)
            <div class="row box p-4 mb-4">
              <div class="col-md-12">
                <p><small>{{ $article->updated_at->format('Y年m月d日') }}</small></p>
                <p><b>タイトル：{{ $article->title }}</b></p>
                <hr size="3" color="gray">
                <p><b>記事内容：<br>{!! nl2br(e($article->contents)) !!}</b></p>
                <hr size="3" color="gray">
                @if ($article->attached_file != null)
                  <p><b>添付ファイル：<img src="{{ $article->attached_file }}" alt="" class="image-submission mx-auto"></p>
                @else
                  <p><b>添付ファイル：添付ファイルはございません。</b></p>
                @endif
                <hr size="3" color="gray">
                  @if (count($article->other_answers) > 0)
                    @foreach ($article->other_answers as $other_answer)
                      <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $other_answer->user_id])}}">
                        @if ($other_answer->profile == null)
                          <p class="image">
                            <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $other_answer->user->name }}
                          </p>
                        @else
                          @if ($other_answer->profile['image_path'] == null)
                            <p class="image">
                              <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $other_answer->profile->name }}
                            </p>
                          @else
                            <p class="image">
                              <img src="{{ $other_answer->profile->image_path }}" alt="" class="image-mini mr-2">{{ $other_answer->profile->name }}
                            </p>
                          @endif
                        @endif
                      </a>
                      <p>A.回答：{{ $other_answer->answer }}</p>
                      <hr size="3" color="gray">
                    @endforeach
                  @else
                    <p>※まだコメントはありません。</p>
                  @endif
                <div class="col-md-11 text-right">
                    <a href="{{ action('Admin\ArticleSubmissionController@edit', ['id' => $article->id]) }}" role='button' class='btn btn-success'>編集</a>
                    <a href="{{ action('Admin\ArticleSubmissionController@delete', ['id' => $article->id]) }}" role='button' class='btn btn-danger'>削除</a>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <h4><i class="far fa-thumbs-up"></i>記事を投稿しよう！</h4>
        @endif
      <br>
      <div class="row">
        <div class="col-md-11 text-right">
          <a href="{{ action('Admin\ArticleSubmissionController@add') }}" role='button' class='btn btn-success'>新規作成</a>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $articles->links() }}
  </div>
</div>
@endsection
