@extends('layouts.main')
@section('title', 'informações da Entrega')
@section('content')
<div class="container fluid">
    <div class="container">
        <div class="center">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Dados da Entrega</div>
                <div class="card-body">
                    <h5 class="card-title">{{$response['locality']}}</h5>
                    <p class="card-text">{{$response['updated']}}</p>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection