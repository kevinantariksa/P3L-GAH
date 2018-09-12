@extends('layouts/master')

@section('title','Edit Profile')

@section('content')

<h2>Change your profile</h2>
  <p>
    {{-- @foreach ($profile as $prof)
      <li>{{$prof->email}}</li>
      <li>{{$prof->nama}}</li>
      <li>{{$prof->no_identitas}}</li>
      <li>{{$prof->telp}}</li>
      <li>{{$prof->alamat}}</li>
    @endforeach --}}

    {{ $dataPelanggan->nama }}

  </p>



  <form action="/p3l/public/profile/edit" method="post">
      {{csrf_field()}}

      EMAIL: <input type="text" name="email"  value="{{ $dataPelanggan->email }}"><br/>
      @if (!$errors->has('email'))
        <p>{{$errors-> first('email')}}</p>
      @endif


      NAME: <input type="text" name ="nama" value="{{$dataPelanggan->nama}}"><br>
      @if ($errors -> has('nama'))
        <p>{{$errors-> first('nama')}}</p>
      @endif

      IDENTITY NUMBER: <input type="text" name ="no_identitas" value="{{$dataPelanggan->no_identitas}}"><br>
      @if ($errors -> has('no_identitas'))
        <p>{{$errors-> first('no_identitas')}}</p>
      @endif

      PHONE NUMBER: <input type="text" name ="telp" value="{{$dataPelanggan->telp}}"><br>
      @if ($errors -> has('telp'))
        <p>{{$errors-> first('telp')}}</p>
      @endif

      ADDRESS:<textarea name="alamat" rows="8"  cols="80">{{$dataPelanggan->alamat}}</textarea>
      @if ($errors -> has('alamat'))
        <p>{{$errors-> first('alamat')}}</p>
      @endif
      <br>


        <input type="submit" name="submit" value="Update">

        <input type="hidden" name="_method" value="PATCH">

  </form>


@endsection
