@extends('layouts/master')

@section('title','Reservation Receipt')

@section('content')
<form action="{{ route('printBukti')}}" method="post">


<h1> Customer Receipt</h1>
<h2>Grand Atma Hotel</h2>
<h3>18th Pangeran Mangkubumi Street, Jogjakarta 55233</h3>
<h3>(0274)48711</h3>
<br><br>
@foreach ($rsvc as $r )
Booking ID:  {{$r->kode_reservasi}}

@endforeach
<br>

@foreach ($pelanggan as $pel )
  Name : {{$pel->nama}}
@endforeach
<br>
@foreach ($reservasi as $res )
    Check In date: {{$res->tgl_check_in}}<br>
    Check Out date: {{$res->tgl_check_out}}
@endforeach
<br>
@foreach ($rsvc as $r )
Adult(s):  {{$r->dewasa}}<br>
Child(s):  {{$r->anak}}<br>
Date of Payment: {{$r->tgl_reservasi}}<br>

@endforeach
<br>
@foreach ($tipekamar as $tipe )
  Room Type: {{$tipe->tipe_kamar}} ||
@endforeach

@foreach ($kasur as $ks )
  Bed Type: {{$ks->jenis_kasur}}

@endforeach
<br>
@foreach ($rsvc as $r )
Value:  {{$r->jumlah_kamar}}

@endforeach
<br>
@foreach ($kamar as $km )
  Price: {{$km->harga}} ||
@endforeach

@foreach ($kamar as $km )
  Total: {{$km->harga}}
@endforeach
<br>
  <a href="/p3l/public/printBukti">    <input type="submit" name="submit" value="Send to Email">  </a>
</form>
@endsection
