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

});
