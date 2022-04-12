<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;  // 2-15.RequestおよびResponse

class HelloController extends Controller
{
    // 3-38.ビューコンポーザを利用する
    public function index()
    {
        return view('hello.index', ['message' => 'Hello!']);
    }

    public function post(Request $request)
    {
        return view('hello.index', ['msg' => $request->msg]);
    }

    // // 3-33.@eachによるコレクションビュー
    // public function index()
    // {
    //     $data = [
    //         ['name' => '山田たろう', 'mail' => 'taro@yamada'],
    //         ['name' => '田中はなこ', 'mail' => 'hanako@flower'],
    //         ['name' => '鈴木さちこ', 'mail' => 'sachiko@happy']
    //     ];
    //     return view('hello.index', ['data' => $data]);
    // }

    // public function post(Request $request)
    // {
    //     return view('hello.index', ['msg' => $request->msg]);
    // }

    // // 3-22.@foreach利用する
    // public function index()
    // {
    //     $data = ['one', 'two', 'three', 'four', 'five'];
    //     return view('hello.index', ['data' => $data]);
    // }

    // public function post(Request $request)
    // {
    //     return view('hello.index', ['msg' => $request->msg]);
    // }

    // // 3-13.テンプレートを使う
    // public function index()
    // {
    //     $data = [
    //         'msg' => 'これはBladeを利用したサンプルです。',
    //     ];
    //     return view('hello.index', $data);
    // }

    // // 3-10.クエリー文字列の利用
    // public function index(Request $request)
    // {
    //     $data = [
    //         'msg' => 'これはコントローラから渡されたメッセージです。',
    //         'id' => $request->id
    //     ];
    //     return view('hello.index', $data);
    // }

    // // 3-8.ルートパラメータをテンプレートに渡す
    // public function index($id='zero')
    // {
    //     $data = [
    //         'msg' => 'これはコントローラから渡されたメッセージです。',
    //         'id' => $id
    //     ];
    //     return view('hello.index', $data);
    // }

    // // 3-5.値をテンプレートに渡す
    // public function index()
    // {
    //     $data = ['msg'=>'これはコントローラから渡されたメッセージです。', 'int'=> 123];
    //     $val = ['value'=> '練習'];
    //     return view('hello.index', $data, $val);
    // }

    // // 2-15.RequestおよびResponse
    // public function index(Request $request, Response $response) {
    //     $html = <<<EOF
    //     <html>
    //         <head>
    //             <title>Hello/Index</title>
    //             <style>
    //                 body { font-size:16pt; color:#999; }
    //                 h1 { font-size:120pt; text-align:right; color:#fafafa;
    //                     margin:-50px 0px -120px 0px; }
    //             </style>
    //         </head>
    //         <body>
    //             <h1>Hello</h1>
    //             <h3>Request</h3>
    //             <pre>{$request}</pre>
    //             <h3>Response</h3>
    //             <pre>{$response}</pre>
    //         </body>
    //     </html>
    //     EOF;
    //         $response->setContent($html);
    //         return $response;
    // }

    // // 2-10複数アクションの利用
    // public function index() {
    //    global $head, $style, $body, $end;

    //    $html = $head . tag('title', 'Hello/Index') . $style . $body
    //         . tag('h1','Index') . tag('p', 'this is Index page')
    //         . '<a href="/hello/other">go to Other page</a>'
    //         . $end;
    //     return $html;
    // }

    // public function other() {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello/Other') . $style . $body
    //         . tag('h1','Other') . tag('p', 'this is Other page')
    //         . '<a href="/hello/other">go to Other page</a>'
    //         . $end;
    //     return $html;
    // }
}
