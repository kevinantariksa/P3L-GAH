@extends('layouts.master')

@section('title','Special Request');

@section('content')
  <p>Additional Facility</p>




    <form action="{{url('reservasi')}}" method="POST">
      {{ csrf_field() }}
      
      {{$harga_fasilitas = 0}}
       @foreach ($fasilitas as $fct)
          <div>
              <label>{{$fct->nama_fasilitas}}</label>
              <input type="checkbox" value="{{$fct->id_fasilitas}}" name='id_fasilitas'/>

          </div>
      @endforeach
      <input type="submit" name="submitBtn" value="Tambah Fasilitas">
    </form>

@endsection
