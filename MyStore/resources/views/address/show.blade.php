@extends('layouts.main')
@section('title', 'Create Product')
@section('content')
<main>
    <div class="centro">
    
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <strong>Endereço do Cliente</strong>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">localidade: {{$address['local']}}</h5>
    <h5 class="card-title">Rua: {{$address['locality']}}</h5>
    <p class="card-text">Cidade: {{$address['city']}}</p>
    <p class="card-text">Estado: {{$address['state']}}</p>
    <p class="card-text">cep: {{$address['cep']}}</p>
    <p class="card-text">número: {{$address['number']}}</p>
  </div>
</div>
    </div>

</main>
@endsection