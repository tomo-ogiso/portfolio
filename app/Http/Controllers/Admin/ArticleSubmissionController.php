<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ArticleSubmission;
use App\OtherAnswer;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Storage;


class ArticleSubmissionController extends Controller
{
  public function list()
  {
      $articles = ArticleSubmission::with(['other_answers', 'profile', 'user', 'profile'])->where('user_id', Auth::id())->orderBy('updated_at', 'desc')->paginate(5);

      return view('admin.article.list', ['articles' => $articles]);
  }

  public function index()
  {
      $articles = ArticleSubmission::with(['other_answers', 'profile'])->orderBy('created_at', 'desc')->paginate(5);
      $user = Auth::user();
      $keyword = null;

      return view('admin.timeline.index', ['articles' => $articles, 'keyword' => $keyword, 'user' => $user]);
  }

  public function add()
  {
      return view('admin.article.create');
  }

  public function create(Request $request)
  {
      $this->validate($request, ArticleSubmission::$rules);

      $article = new ArticleSubmission;
      $user = Auth::user();
      $article->user_id = $user->id;
      $form = $request->all();

      if (isset($form['attached_file'])) {
          $path = Storage::disk('s3')->putFile('/', $form['attached_file'], 'public');
          $article->attached_file = Storage::disk('s3')->url($path);
      } else {
          $article->attached_file = null;
      }

      unset($form['_token'],$form['attached_file']);

      $article->fill($form)->save();

      return redirect('admin/article/list');
  }

  public function edit(Request $request)
  {
      $article = ArticleSubmission::where('id', $request->id)->first();

      return view('admin.article.edit', ['article_form' => $article]);
  }

  public function update(Request $request)
  {
      $this->validate($request, ArticleSubmission::$rules);

      $article = ArticleSubmission::find($request->id);
      $article_form = $request->all();

      if (isset($article_form['attached_file'])) {
          $path = Storage::disk('s3')->putFile('/', $article_form['attached_file'], 'public');
          $article->attached_file = Storage::disk('s3')->url($path);
          unset($article_form['attached_file']);
      }

      if (isset($request->remove)) {
          $article->attached_file = null;
          unset($article_form['remove']);
      }

      unset($article_form['_token']);

      $article->fill($article_form)->save();

      return redirect('admin/article/list');
  }

  public function delete(Request $request)
  {
      $article = ArticleSubmission::where('id', $request->id)->delete();
      $answers = OtherAnswer::where('article_id', $request->id)->delete();

      return redirect('admin/article/list');
  }


}
