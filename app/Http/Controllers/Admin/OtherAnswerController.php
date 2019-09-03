<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherAnswer;
use App\ArticleSubmission;
use App\Profile;
use Illuminate\Support\Facades\Auth;


class OtherAnswerController extends Controller
{
    public function show(Request $request)
    {
      $article = ArticleSubmission::with(['user', 'profile'])->where('id', $request->id)->first();
      $answers = OtherAnswer::with(['user', 'profile'])->where('article_id', $request->id)->orderBy('updated_at', 'desc')->get();
      $user = Auth::user();

      return view('admin.timeline.show', ['article' => $article, 'answers' => $answers, 'user' => $user]);
    }

      public function add(Request $request)
      {
          $article = ArticleSubmission::where('id', $request->id)->first();

          return view('admin.timeline.create', ['article' => $article]);
      }

      public function create(Request $request)
      {
          $this->validate($request, OtherAnswer::$rules);

          $answer = new OtherAnswer;
          $user = Auth::user();
          $answer->user_id = $user->id;
          $answer->article_id = $request->article_id;
          $form = $request->all();

          unset($form['_token']);

          $answer->fill($form)->save();

          return redirect('admin/timeline/index');
      }

      public function edit(Request $request)
      {
          $answer = OtherAnswer::where('id', $request->id)->first();
          $article = ArticleSubmission::where('id', $request->id2)->first();

          return view('admin.timeline.edit', ['answer_form' => $answer, 'article' => $article]);
      }

      public function update(Request $request)
      {
          $this->validate($request,OtherAnswer::$rules);

          $answer = OtherAnswer::where('id', $request->id)->first();
          $answer_form = $request->all();

          unset($answer_form['_token']);

          $answer->fill($answer_form)->save();

          return redirect('admin/timeline/index');
      }

      public function delete(Request $request)
      {
          $answers = OtherAnswer::where('id', $request->id)->delete();

          return redirect('admin/timeline/index');
      }


}
