<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
         <div class="container">
             <a class="navbar-brand" href="{{ url('/') }}" >
                 {{ config('app.name', 'ギブテック') }}
             </a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <!-- Left Side Of Navbar -->
                 <ul class="navbar-nav mr-auto">

                 </ul>

                 <!-- Right Side Of Navbar -->
                 <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                     @guest
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-key"></i>ログイン</a>
                         </li>
                         @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>新規ユーザー登録</a>
                             </li>
                         @endif
                     @else
                         <li class="nav-item">
                                 <a class="nav-link" href="{{ url('/home') }}">
                                     <i class="fas fa-home"></i>ホーム
                                 </a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link" href="{{ action('Admin\ArticleSubmissionController@index') }}">
                                     <i class="fas fa-sort-amount-up"></i>記事別タイムライン
                                 </a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link" href="{{ action('Admin\ArticleSubmissionController@list') }}">
                                     <i class="fas fa-pencil-alt"></i>記事投稿
                                 </a>
                         </li>
                         <li class="nav-item">
                                 <a class="nav-link" href="{{ action('Admin\PortfolioController@list') }}">
                                     <i class="fas fa-chart-pie"></i>自分グラフ
                                 </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ action('Admin\ProfileController@list') }}">
                                 <i class="fas fa-user"></i>プロフィール
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ url('/about') }}">
                                 <i class="fas fa-coffee"></i>about
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 <i class="fas fa-door-open"></i>ログアウト
                             </a>
                         </li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                     @endguest
                 </ul>
             </div>
         </div>
     </nav>
