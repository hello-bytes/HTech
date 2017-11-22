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

Route::get('/', 'ArticleController@index');
Route::get('/article/{articleId}.html', 'ArticleController@article');

Auth::routes();

Route::group(['prefix'=>'backend','middleware'=>'auth'],function(){

    Route::any('/','backend\BackendController@index');
    Route::get('/index', 'backend\BackendController@index');

    Route::resource('tag','backend\TagController');
    Route::resource('user','backend\UserController');
    Route::resource('article','backend\ArticleController');
    Route::resource('category','backend\CategoryController');

    Route::resource('category','backend\CategoryController');

    Route::resource('setting','backend\SystemSettingController');
});