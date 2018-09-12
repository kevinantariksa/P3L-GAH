@extends('layouts.master')

@section('title','History Reservation');

@section('content')
<div class="container">
    <div class="row">
      <br>
      <legend>List Of Reservation</legend>
      @if(session('info'))
        {{session('info')}}
      @endif
      <br>
      <br>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Resrvation Code</th>
            <th scope="col">Customer</th>
            <th scope="col">Hotel Branch</th>
            <th scope="col">Reservation Type</th>
            <th scope="col">Adult</th>
            <th scope="col">Child</th>
            <th scope="col">Reservation Date</th>
            <th scope="col">Aciton</th>
          </tr>
        </thead>
        <tbody>
          @if(count($reservasi)>0)
          <?php foreach ($reservasi as $reservasi): ?>
            <tr class="table-light">
              <th>{{$reservasi->kode_reservasi}}</th>
              <th>{{$reservasi->nama}}</th>
              <th>{{$reservasi->alamat}}</th>
              <th>{{$reservasi->tipereservasi}}</th>
              <th>{{$reservasi->dewasa}}</th>
              <th>{{$reservasi->anak}}</th>
              <th>{{$reservasi->tgl_reservasi}}</th>
              <td>
                <a href='{{url("/editReservasiRuangan/{$reservasi->id_reservasi}")}}' class="badge badge-success">Edit</a>
                <a href='{{url("/cancel/{$reservasi->id_reservasi}")}}' class="badge badge-danger">Cancel</a>
              </td>
            </tr>
          <?php endforeach; ?>
          @endif
        </tbody>
      </table>
    </div>
  </div>

@endsection
