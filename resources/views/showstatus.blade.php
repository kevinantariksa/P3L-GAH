@extends('layouts/master')

@section('title','Show Status')

@section('content')

<h5>Reservation Detail:</h5>
@foreach ($reservasiconf as $rsc)
  Reservation code: {{$rsc->kode_reservasi}}
  Number of room(s): {{$rsc->jumlah_kamar}}
@endforeach
<br>
<h5>Transaction Payment:</h5>
@foreach ($transaksi as $trsc)
<li>{{$trsc->jumlah_uang}}</li>
<li>{{$trsc->tanggal_transaksi}}</li>
@endforeach
<br>
<h5>Reservation Status:</h5>
@foreach ($reservasi as $rsv)
  @if ($rsv->id_reservasi_status == 1)
    Book Succeed!
    @else
      Payment Suceed!
  @endif
@endforeach


@endsection
