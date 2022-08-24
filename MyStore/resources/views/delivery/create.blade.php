@extends('layouts.main')
@section('title', 'Create Product')
@section('content')
<main class=container>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($address as $a)
                        <div class="col">
                            <div class="card h-100">
                                <div class= "card-body">
                                    <h5 class ="card-title">Endereço do Cliente</h5>
                                    <hr>
                                    <h5 class ="card-title">{{$a['local']}}</h5>
                                    <h5 class= "card-title"> {{$a['locality']}} </h5>
                                    <h5 class= "card-title"> {{$a['district']}} </h5>
                                    <h5 class= "card-title"> {{$a['city']}} </h5>
                                    <h5 class= "card-title"> {{$a['state']}} </h5>
                                    <hr>
                                    <a href="/delivery_address/{{$a['id']}}/{{$request['id']}}" class="btn btn-dark">Escolher este endereço</a>
                                </div>
                            </div>
                        </div>
                
                    @endforeach
            </div>
   
</main>
@endsection