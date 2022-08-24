@extends('layouts.main')
@section('title', 'Edit Product')
@section('content')
<main class=container-fluid>
    <h1 class="textCreate">Create Product</h1>
    <div class="container">
        <form action="/update_product/{{$product['id']}}" method="POST" class="form-create">
        @csrf

            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <label class="form-label" for="nome">Nome*:</label>
                    <input class="form-control" type="text" name="name" value="{{$product['name']}}" required place placeholder="Nome do produto">
                </div>
                <div class="col-md-3 col-sm-12">
                    <label class="form-label" for="cpf">Valor*:</label>
                    <input class="form-control" type="text" name="unitary_value" value="{{$product['unitary_value']}}" required placeholder="valor unitário"pattern="([0-9]){4}.[0-9]{2}" title="Campo valor: exemplo 10.50">
                    
                </div>
                <div class="col-md-2 col-sm-12">
                    <label class="form-label" for="data-nascimento">Peso *:</label>
                    <input class="form-control" type="text" name="weigth" value="{{$product['weigth']}}" placeholder="peso" required pattern="(([0-9]){1}.[0-9]{1})"title="Campo valor: exemplo 10.50">
                </div>
            </div>
            <div class="row mt-2 justify-content-md-center">
                <div class="col-md-2 d-grid col-sm-12">
                    <button  type="submit"class="btn btn-primary">Submit</button>
                </div>
                <div class="col-md-2 d-grid col-sm-12">
                <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </form>
</main>
@endsection 