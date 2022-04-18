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