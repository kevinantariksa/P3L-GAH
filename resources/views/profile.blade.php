@extends('layouts/app')

@section('title','Profile')

@section('content')

<h2>Your profile</h2>
  <p>

      <li>{{$prof->email}}</li>
      <li>{{$prof->nama}}</li>
      <li>{{$prof->no_identitas}}</li>
      <li>{{$prof->telp}}</li>
      <li>{{$prof->alamat}}</li>
  </p>

  <a href="/p3l/public/profile/edit">    <input type="submit" name="submit" value="Edit">  </a>
{{csrf_field()}}
@endsection
