<!-- 3-12.テンプレートを使う
<html>
  <head>
    <title>Hello/Index</title>
    <style>
      body { font-size:16pt; color:#999; }
      h1 {
        font-size:50pt;
        text-align:right;
        color:#f6f6f6;
        margin:-20px 0px -30px 0px;
        letter-spacing:-4pt;
      }
    </style>
  </head>
  <body>
    <h1>Blade/Index</h1>
    <p>&#064;forディレクティブの例</p>
    <ol>
      @php
        $counter = 0;
      @endphp
      @while ($counter < count($data))
        <li>{{ $data[$counter] }}</li>
        @php
          $counter++;
        @endphp
      @endwhile
    </ol>

    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
  </body>
</html> -->

@xetends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
      @parent
      インデックスページ
@endsection

@section('content')
      <p>ここが本文のコンテンツです。</p>
      <p>必要なだけ記述できます。</p>
@endsection

@section('footer')
copyright 2022 iio.
@endsection