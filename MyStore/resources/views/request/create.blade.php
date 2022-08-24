@extends('layouts.main')
@section('title', 'Insert Request')
@section('content')
<main>
    <form action="/search_product/{{$request['id']}}" id="searchProduct" class="d-flex" role="search" method='GET'>
        <input class="form-control me-2" name="name" type="search" placeholder="Pesquisar produto" aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      @if(!(empty($product)))
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($product as $p)
                <div class="col">
                    <div class="card h-100">
                        <div class= "card-body">
                          <h5 class ="card-title">{{$p['name']}}</h5>
                          <p class= "card-title"> {{$p['unitary_value']}} </p>
                        </div>
            <form action="/salverequest_product/{{$request['id']}}/{{$p['id']}}" method ="GET">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
                    </div>
                </div>
  
            @endforeach
        </div>
        
      @else
      <div class="msg">
        <h5>Pesquise um produto </h5>
      </div>
      @endif


</main>
@endsection