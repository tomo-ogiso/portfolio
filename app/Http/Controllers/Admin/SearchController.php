<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ArticleSubmission;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
  public function search(Request $request)
  {
      $user = Auth::user();
      $keyword = $request->input('keyword');

      if (!empty($keyword)) {
          $articles = ArticleSubmission::where('title', 'like', "%$keyword%");

          $articles_user = ArticleSubmission::whereHas('user', function ($query) use ($keyword)
          {
              $query->where('name', 'like', "%$keyword%");
          });

          $articles_profile = ArticleSubmission::whereHas('profile', function ($query) use ($keyword)
          {
              $query->where('name', 'like', "%$keyword%");
          });

          $articles = $articles->union($articles_user)->union($articles_profile)->orderBy('created_at', 'desc')->paginate(5);
      }
      else {
          $articles = ArticleSubmission::orderBy('created_at', 'desc')->paginate(5);
      }

      return view('admin.timeline.index', ['articles' => $articles, 'keyword' => $keyword, 'user' => $user]);
  }
}
