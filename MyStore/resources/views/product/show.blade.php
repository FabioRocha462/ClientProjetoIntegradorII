@extends('layouts.main')
@section('title', 'Create Product')
@section('content')
<main>
    <div class="centro">
    
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Nome: {{$product['name']}}</h5>
    <h5 class="card-title">valor unitário: {{$product['unitary_value']}}</h5>
    <a href="#" class="btn btn-primary">Fazer um Pedido</a>
  </div>
</div>
    </div>

</main>
@endsection