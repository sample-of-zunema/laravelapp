@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
      @parent
      インデックスページ
@endsection

@section('content')
      <p>ここが本文のコンテンツです。</p>
      <p>必要なだけ記述できます。</p>

      @component('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot

        @alot('msg_content')
        これはメッセージの表示です。
        @endcomponent
@endsection

@section('footer')
copyright 2022 iio.
@endsection