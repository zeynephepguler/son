@extends('layouts.admintema')
@section('content')

<table border="1">
    <tr>
        <td>ogrencino</td>
        <td>dilekce</td>
    </tr>
  @foreach ($basvurus as $basvuru)
    <tr>
      <td>{{$basvuru['ogrencino']}}</td>
      <td><a href="uploads/dilekce/{{$basvuru['dilekce']}}">indir</a></td>

    </tr>

  @endforeach
</table>

@stop
