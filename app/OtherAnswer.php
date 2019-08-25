<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherAnswer extends Model
{

  protected $guarded = array('id');

  protected $fillable = [
      'answer', 'user_id'
  ];

  public static $rules = array(
      'answer' => 'required',
  );

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function profile()
  {
      return $this->belongsTo('App\Profile', 'user_id');
  }

  public function article_submissions()
  {
      return $this->belongsTo('App\ArticleSubmission', 'article_id');
  }

}
