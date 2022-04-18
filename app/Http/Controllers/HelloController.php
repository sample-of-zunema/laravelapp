<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;  // 2-15.RequestおよびResponse
use App\Http\Requests\HelloRequest;  // 4-22.バリデーションのフォームリクエスト
use Validator;  //4-24.バリbariデータの作成
use Illuminate\Support\Facades\DB; // 5-4.データベースの利用

class HelloController extends Controller
{
    // 5-9.データベースの利用（インサート文）
    public function index(Request $request)
    {
        $items = DB::table('people')->get();
        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return $response;
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }

    // 5-12.データベースの利用（アップデート文）
    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello');
    }

    // 5-15.データベースの利用（デリート文）
    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        $param = [
            'id' => $request->id,
        ];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }

    // // 5-7.データベースの利用
    // public function index(Request $request)
    // {
    //     if (isset($request->id))
    //     {
    //         $param = ['id' => $request->id];
    //         $items = DB::select('select * from people where id = :id', $param);
    //     } else {
    //         $items = DB::select('select * from people');
    //     }
    //     return view('hello.index', ['items' => $items]);
    // }

    // public function post(Request $request)
    // {
    //     $validate_rule = [
    //         'msg' => 'required',
    //     ];
    //     $this->validate($request, $validate_rule);
    //     $msg = $request->msg;
    //     $response = response()->view('hello.index', [
    //         'msg' => '「' . $msg . '」をクッキーに保存しました。'
    //        ]);
    //    $response->cookie('msg', $msg, 100);
    //     return $response;
    // }

    //  // 4-38.クッキーを読み書きする
    //  public function index(Request $request)
    //  {
    //     if ($request->hasCookie('msg'))
    //     {
    //         $msg = 'Cookie: ' . $request->cookie('msg');
    //     } else {
    //         $msg = '※クッキーはありません。';
    //     }
    //     return view('hello.index', ['msg' => $msg]);
    //  }

    //  public function post(Request $request)
    //  {
    //      $validate_rule = [
    //          'msg' => 'required',
    //      ];
    //      $this->validate($request, $validate_rule);
    //      $msg = $request->msg;
    //      $response = response()->view('hello.index', [
    //          'msg' => '「' . $msg . '」をクッキーに保存しました。'
    //         ]);
    //     $response->cookie('msg', $msg, 100);
    //      return $response;
    //  }

    // // 4-31.HelloValidatorのルールを使用する
    // public function index(Request $request)
    // {
    //     return view('hello.index', ['msg' => 'フォームを入力ください。']);
    // }

    // // 4-31.HelloValidatorのルールを使用する
    // public function post(HelloRequest $request)
    // {
    //     return view('hello.index', ['msg' => '正しく入力されました！']);
    // }

    // // 4-25.クエリー文字列にバリデータを適用する
    // public function index(Request $request)
    // {
    //     $validator = Validator::make($request->query(), [
    //         'id' => 'required',
    //         'pass' => 'required',
    //     ]);
    //     if ($validator->fails()) {
    //         $msg = 'クエリーに問題があります。';
    //     } else {
    //         $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
    //     }
    //     return view('hello.index', ['msg' => $msg,]);
    // }

    // // 4-26.エラーメッセージのカスタマイズ
    // public function post(Request $request)
    // {
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric',
    //     ];
    //     $messages = [
    //         'name.required' => '名前は必ず入力してください。',
    //         'mail.email' => 'メールアドレスが必要です。',
    //         'age.numeric' => '年齢を整数で記入ください。',
    //         'age.min' => '年齢は0歳以上で記入ください。',
    //         'age.max' => '年齢は200際以下で記入ください。',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     $validator->sometimes('age', 'min:0', function($input) {
    //         return is_numeric($input->age);
    //     });

    //     $validator->sometimes('age', 'max:200', function($input) {
    //         return is_numeric($input->age);
    //     });

    //     if ($validator->fails()) {
    //         return redirect('/hello')
    //                 ->withErrors($validator)
    //                 ->withInput();
    //     }
    //     return view('hello.index', ['msg' => '正しく入力されました！']);
    // }


    // // 4-22.バリデーションを利用する（フォームリクエスト）
    // public function index(Request $request)
    // {
    //     return view('hello.index', ['msg' => 'フォームを入力：']);
    // }

    // // 4-24.バリデータを使ってみる
    // public function post(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0,150',
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect('/hello')
    //                 ->withErrors($validator)
    //                 ->withInput();
    //     }
    //     return view('hello.index', ['msg' => '正しく入力されました！']);
    // }

    // // 4-15.バリデーションを利用する
    // public function index(Request $request)
    // {
    //     return view('hello.index', ['msg' => 'フォームを入力：']);
    // }

    // public function post(Request $request)
    // {
    //     return view('hello.index', ['msg' => '正しく入力されました！']);
    // }

    // // 4-8.ビューとコントローラの修正
    // public function index(Request $request)
    // {
    //     return view('hello.index');
    // }

    // public function post(Request $request)
    // {
    //     return view('hello.index', ['msg' => $request->msg]);
    // }

    // // 4-4.ビューとコントローラの修正
    // public function index(Request $request)
    // {
    //     return view('hello.index', ['data' => $request->data]);
    // }

    // public function post(Request $request)
    // {
    //     return view('hello.index', ['msg' => $request->msg]);
    // }

    // // 3-38.ビューコンポーザを利用する
    // public function index()
    // {
    //     return view('hello.index', ['message' => 'Hello!']);
    // }

    // public function post(Request $request)
    // {
    //     return view('hello.index', ['msg' => $request->msg]);
    // }

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
