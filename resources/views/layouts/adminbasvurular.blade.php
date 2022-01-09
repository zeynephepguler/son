@extends('layouts.admintema')
@section('content')
<div class="container">
  <thead>
    <th>Ad</th>
    <th>Soyad</th>
    <th>Bölüm</th>
    <th>Belgeler</th>
    <th>Onayla</th>
    <th>Reddet</th>
  </thead>
  <tbody>
    @php $i=1; @endphp
    @forelse($basvurular as $key => $item)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$item['name']}}</td>
    </tr>
    @empty
    <tr>
      <td colspan="7"> yok </td>
    </tr>
  @endforelse
  </tbody>
  </div>
</div>
@stop
