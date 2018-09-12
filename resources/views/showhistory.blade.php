@extends('layouts/master')

@section('title','Reservation History')

@section('content')
Showing Result(s) for : Kevin Antariksa
@foreach ($reservasi as $rsvc)
  <li>{{$rsvc->id_reservasi}}</li>
  <li>Check In date: {{$rsvc->tgl_check_in}}</li>
  <li>Check Out date: {{$rsvc->tgl_check_out}}</li>
  <li>Room Type: {{$rsvc->tipe_kamar}}</li>
  @if ($now > $rsvc->tgl_check_out)
      <a href='{{url("/formrsv/{$rsvc->id_reservasi}")}}' class="badge badge-success">Repeat Reservation</a>
      @else
          <a href='{{url("/hapusrsv/{$rsvc->id_reservasi}")}}' class="badge badge-danger">Cancel Reservation</a>
  @endif


  <br>
@endforeach

@endsection
