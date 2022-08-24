@extends('layouts.main')
@section('title', 'Create Product')
@section('content')
<main>
    <div class="centro">
    
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" aria-current="true" href="/add_address/{{$Client['id']}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg><strong>Adicionar um Endereço</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/client_request/{{$Client['id']}}"><strong>Pedidos des Cliente</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/address_client/{{$Client['id']}}"><strong>Endereços do Client</strong></a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Nome: {{$Client['name']}}</h5>
    <h5 class="card-title">CPF: {{$Client['cpf']}}</h5>
    <p class="card-text">Telefone: {{$Client['phone']}}</p>
    <form action="salve_request/{{$Client['id']}}" method="GET">
    <a href="/salve_request/{{$Client['id']}}" 
    class ='btn btn-dark'
     id="event-submit" 
     onclik="event.preventDefault();
     this.closest('form').submit()">
      Criar Pedido 
    </a>
    </form>
  </div>
</div>
    </div>

</main>
@endsection