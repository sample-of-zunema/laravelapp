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

// 3-10.クエリー文字列の利用
//4-3.ミドルウェアの実行
Route::get('/hello', 'App\Http\Controllers\HelloController@index');
    ->middleware(HelloMiddleware::class);
// 3-16.POSTのルート設定
Route::post('/hello', 'App\Http\Controllers\HelloController@post');