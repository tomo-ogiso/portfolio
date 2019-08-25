<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleSubmission extends Model
{

  protected $guarded = array('id');

  protected $fillable = [
      'title', 'contents','user_id'
  ];

  public static $rules = array(
      'title' => 'required',
      'contents' => 'required'
  );

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function profile()
  {
      return $this->belongsTo('App\Profile', 'user_id');
  }

  public function other_answers()
  {
      return $this->hasmany('App\OtherAnswer', 'article_id');
  }
}
