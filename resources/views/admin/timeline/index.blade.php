@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>記事タイムライン</h2>
        <div class="row">
          <div class="col-md-8 mt-5 mb-3">
            @include ('partials.search.form_search')
          </div>
        </div>
      @foreach ($articles as $article)
        <div class="card mb-4">
          <div class="card-header">
            @if ($article->user_id == $user->id)
              <a href="{{ action('Admin\ProfileController@list') }}">
            @else
              <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $article->user_id])}}">
            @endif
            @if ($article->profile == null)
              <p class="image">
                <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $article->user->name }}
              </p>
            @elseif ($article->profile != null && $article->profile['image_path'] == null)
              <p class="image">
                <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $article->profile->name }}
              </p>
            @else
              <p class="image">
                <img src="{{ $article->profile->image_path }}" alt="" class="image-mini mr-2">{{ $article->profile->name }}
              </p>
            @endif
              </a>
          </div>
          <div class="card-body">
            <p class="card-text">
              <a href="{{ action('Admin\OtherAnswerController@show', ['id' => $article->id]) }}">
                <b>タイトル：{{ $article->title }}</b>
              </a>
            </p>
          </div>
          <div class="card-footer">
            <span class="mr-5">
              <small>{{ $article->created_at->format('Y年m月d日') }}</small>
            </span>
            @if ($article->other_answers->count() != 0)
              <span>
                <a href="{{ action('Admin\OtherAnswerController@show', ['id' => $article->id]) }}">
                  <i class="far fa-comment"></i> {{ $article->other_answers->count() }}
                </a>
              </span>
            @else
            <span>
              <i class="far fa-comment"></i> 0
            </span>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $articles->appends(Request::all())->links() }}
  </div>
</div>
@endsection
