@extends('layouts/master')

@section('title','Search Result(s)')

@section('content')
  Search result(s):
<li>{{$reservasi['tgl_reservasi']}}</li>

<li>{{$reservasi['kode_reservasi']}}</li>

<form action="index.html" method="post">

  <a href="/p3l/public/editreservasi"><button type="submit" class="btn btn-success">Edit</button></a>
  <a href="/p3l/public/editreservasi"> <button type="submit" class="btn btn-success"> Repeat This Reservation</button> </a>

</form>

@endsection
