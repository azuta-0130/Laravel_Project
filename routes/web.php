<?php

use Illuminate\Support\Facades\Route;

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

//ニュース一覧画面を表示
Route::get('/', "ArticleController@index")->name('Articles');

//ニュース登録
Route::post('/article/store', "ArticleController@exeStore")->name('store');

//ニュース詳細&コメント画面を表示
Route::get('/article/{id}', "ArticleController@showDetail")->name('show');

//コメント登録
Route::post('/comment/store', "CommentController@exeComment")->name('comment');

//コメントの削除
Route::post('/comment/delete/{id}', "CommentController@exeDelete")->name('delete');
