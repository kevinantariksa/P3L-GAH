@extends('layouts/master')

@section('title','Profile')

@section('content')

  <p>
    @foreach ($profile as $prof)
      <li>{{$prof->email}}</li>
      <li>{{$prof->nama}}</li>
      <li>{{$prof->no_identitas}}</li>
      <li>{{$prof->telp}}</li>
      <li>{{$prof->alamat}}</li>
    @endforeach
  </p>


  <form method="post" action="{{route('users.update', $user)}}">
      {{ csrf_field() }}
      {{ method_field('patch') }}

      <input type="text" name="name"  value="{{ $user->name }}" />

      <input type="email" name="email"  value="{{ $user->email }}" />

      <input type="password" name="password" />

      <input type="password" name="password_confirmation" />

      <button type="submit">Send</button>
  </form>


@endsection
