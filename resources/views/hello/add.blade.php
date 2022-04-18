@extends('layouts.helloapp')

@section('title', 'Add')

@section('menubar')
  @parent
  新規作成
@endsection

@section('content')
  <form action="/hello/add" method="post">
    <table>
      @csrf
      <tr><th>name: </th><td><input type="text" name="name"></td></tr>
      <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
      <tr><th>age: </th><td><input type="text" name="age"></td></tr>
    </table>
  </form>
@endsection

@section('footer')
  copyright 2022 iio.
@endsecti