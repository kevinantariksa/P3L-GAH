@extends('layouts/master')

@section('title','Search Reservatiom')

@section('content')

<h4>Enter your reservation code</h4>
Reservation code can be seen on your bill
<form action="{{ url('/tampilcari')}}" method="POST">
    {{ csrf_field() }}
    <input id="search" type="search" class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" value="{{ old('search') }}" required>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

<br>



@endsection
