@extends('layouts.master')
@section('content')
<body>
    <link rel="stylesheet" href="{{ asset('css/sec.css') }}" type="text/css">
<br>
<div>
<input type="button" class="bsvr renk" onclick="location='basvurucap'" value="Çap Başvurusu">
<input type="button" class="bsvr renk" onclick="location='basvuruytg'" value="Yatay Geçiş Başvurusu">
<input type="button" class="bsvr renk" onclick="location='basvurudgs'" value="Dikey Geçiş Başvurusu">
<input type="button" class="bsvr renk" onclick="location='basvuruintibak'" value="İntibak Başvurusu">
<input type="button" class="bsvr renk" onclick="location='basvuruyazokulu'" value="Yaz Okulu Başvurusu">
</div>

<div class="d2">
<label> Fakülteniz: </label>
<input name="ad" type="text" size="50px"> <br>
<label>  Bölüm : </label>
<input name="ad" type="text" size="50px"> <br>
<label> Numara:</label>
<input name="ad" type="text" size="50px"> <br>
<label>İsim : </label>
<input name="ad" type="text" size="50px"> <br><br>
<label> Ekler: </label> <label>Trankript  Ders Planı Ders İçerikleri </label>
</div>
<form action="{{ route('inibakkontrol') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="intibak" value="başvuru talebi var">
    <input type="hidden" name="ogrencino" value="{{$LoggedUserInfo['no']}}">
    <button type="submit" class="btn btn-block btn-primary" name="button" >Başvuru Yap</button>

  </form>
@stop
