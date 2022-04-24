<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;  //4-3.ミドルウェアの実行

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




Route::get('/', function () {
    return view('welcome');
});

// // 2-12.複数アクションの利用
// Route::get('/hello', 'App\Http\Controllers\HelloController@index');
// Route::get('/hello/other', 'App\Http\Controllers\HelloController@other');

// 2-14.シングルアクション
// Route::get('/hello', 'App\Http\Controllers\HelloController');

// 2-15.RequestおよびResponse
// Route::get('/hello', 'App\Http\Controllers\HelloController@index');

// 3-2.ルートの設定でテンプレートを表示
// Route::get('/hello', 'App\Http\Controllers\HelloController@index');

// 3-3.コントローラでテンプレートを使う
// Route::get('/hello', 'App\Http\Controllers\HelloController@index');

// 3-9.ルートパラメータをテンプレートに渡す
// Route::get('/hello/{id?}', 'App\Http\Controllers\HelloController@index');

//4-16.バリデーション
Route::get('/hello', 'App\Http\Controllers\HelloController@index');
// 4-16.バリデーション
Route::post('/hello', 'App\Http\Controllers\HelloController@post');

// 5-9.データベースの利用（インサート文）
Route::get('/hello/add', 'App\Http\Controllers\HelloController@add');
// 5-9.データベースの利用（インサート文）
Route::post('/hello/add', 'App\Http\Controllers\HelloController@create');
// 5-9.データベースの利用（アップデート文）
Route::get('/hello/edit', 'App\Http\Controllers\HelloController@edit');
// 5-9.データベースの利用（アップデート文）
Route::post('/hello/edit', 'App\Http\Controllers\HelloController@update');
// 5-9.データベースの利用（デリート文）
Route::get('/hello/del', 'App\Http\Controllers\HelloController@del');
// 5-9.データベースの利用（デリート文）
Route::post('/hello/del', 'App\Http\Controllers\HelloController@remove');
// 5-9.データベースの利用（クエリビルダ）
Route::get('/hello/show', 'App\Http\Controllers\HelloController@show');

// 6-4.Eloquent ORM、ルート情報
Route::get('/person', 'App\Http\Controllers\PersonController@index');

// 6-9.IDによる検索
Route::get('/person/find', 'App\Http\Controllers\PersonController@find');
// 6-9.IDによる検索
Route::post('/person/find', 'App\Http\Controllers\PersonController@search');
// 6-21.addおよびcreateアクションを追記する
Route::get('/person/add', 'App\Http\Controllers\PersonController@add');
// 6-9.addおよびcreateアクションを追記する
Route::post('/person/add', 'App\Http\Controllers\PersonController@create');
// 6-24.editアクション
Route::get('/person/edit', 'App\Http\Controllers\PersonController@edit');
// 6-24.updateアクション
Route::post('/person/edit', 'App\Http\Controllers\PersonController@update');
// 6-27.delアクション
Route::get('/person/del', 'App\Http\Controllers\PersonController@delete');
// 6-27.removeアクション
Route::post('/person/del', 'App\Http\Controllers\PersonController@remove');
// 6-34.Boardモデル
Route::get('board', 'App\Http\Controllers\BoardController@index');
// 6-34.Board.addアクション
Route::get('board/add', 'App\Http\Controllers\BoardController@add');
// 6-34.Boardモデルアクション
Route::post('board/add', 'App\Http\Controllers\BoardController@create');

// 7-6.RESTfulのルート情報
Route::resource('rest', 'App\Http\Controllers\RestappController');