@extends('layouts.helloapp')
<style>
      .pagination { font-size:10pt; }
      .pagination li { display:inline-block }
</style>

@section('title', 'Index')

@section('menubar')
      @parent
      インデックスページ
@endsection

@section('content')
      <table>
            <tr>
                  <th><a href="/hello?sort=name">name</a></th>
                  <th><a href="/hello?sort=name">mail</a></th>
                  <th><a href="/hello?sort=name">age</a></th>
            </tr>
            @foreach ($items as $item)
                  <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mail }}</td>
                        <td>{{ $item->age }}</td>
                  </tr>
            @endforeach
      </table>
      {{ $items->appends(['sort' => $sort])->links() }}
@endsection

@section('footer')
copyright 2022 iio.
@endsection