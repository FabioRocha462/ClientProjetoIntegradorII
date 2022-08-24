@extends('layouts.main')
@section('title', 'Token Login')
@section('content')
<main>
    <div class = 'container-fluid'>
        <div class = "create-token">
        <form action='/salve_token' class="row g-3" method="POST">
          @csrf
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Email</label>
    <input type="text" name='email' class="form-control-plaintext" id="staticEmail2" placeholder="email@example.com">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Password</label>
    <input type="password" name='password'class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
  </div>
</form>

        </div>
        @if(!empty($msg))
        <div class="msg">
        <h5>{{$msg}}</h5>    
        </div>
        @endif
    </div>
</main>
@endsection 

