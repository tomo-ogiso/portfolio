<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//追加
// Route::get('/err', function () {
//     trigger_error("エラーのテスト!", E_USER_ERROR);
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about');
});

//Route::group(['prefix' => 'admin', 'middleware' => 'auth' ,'middleware' => 'verified'], function() {
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/list', 'Admin\ProfileController@list');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('article/list', 'Admin\ArticleSubmissionController@list');
    Route::get('article/create', 'Admin\ArticleSubmissionController@add');
    Route::post('article/create', 'Admin\ArticleSubmissionController@create');
    Route::get('article/edit', 'Admin\ArticleSubmissionController@edit');
    Route::post('article/edit','Admin\ArticleSubmissionController@update');
    Route::get('article/delete', 'Admin\ArticleSubmissionController@delete');
    Route::get('timeline/index', 'Admin\ArticleSubmissionController@index');
    Route::get('timeline/show', 'Admin\OtherAnswerController@show');
    Route::get('timeline/create', 'Admin\OtherAnswerController@add');
    Route::post('timeline/create', 'Admin\OtherAnswerController@create');
    Route::get('timeline/edit', 'Admin\OtherAnswerController@edit');
    Route::post('timeline/edit', 'Admin\OtherAnswerController@update');
    Route::get('timeline/delete', 'Admin\OtherAnswerController@delete');
    Route::get('portfolio/list', 'Admin\PortfolioController@list');
    Route::get('portfolio/create', 'Admin\PortfolioController@add');
    Route::post('portfolio/create', 'Admin\PortfolioController@create');
    Route::get('portfolio/edit', 'Admin\PortfolioController@edit');
    Route::post('portfolio/edit', 'Admin\PortfolioController@update');
    Route::get('other_user_profile/show', 'Admin\OtherUserProfileController@show');
    //フォロー機能関係
    Route::post('other_user_profile/show/{user}/follow', 'Admin\OtherUserProfileController@follow');
    Route::post('other_user_profile/show/{user}/unfollow', 'Admin\OtherUserProfileController@unfollow');
    Route::post('profile/list/{user}/follow', 'Admin\OtherUserProfileController@follow');
    Route::post('profile/list/{user}/unfollow', 'Admin\OtherUserProfileController@unfollow');
    //検索機能関係
    Route::get('timeline/search', 'Admin\SearchController@search');

});
