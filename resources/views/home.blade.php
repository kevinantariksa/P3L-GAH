@extends('layouts.app')
@section('title','Login Success')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                  @foreach ($userdata as $user)

                    <li> {{$user->username.' Email: '.$user->email}} </li>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
