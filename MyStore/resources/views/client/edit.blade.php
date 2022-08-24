@extends('layouts.main')
@section('title', 'Edit Client')
@section('content')
<main>
    <h1 class="textCreate">Criar Cliente</h1>
    <div class="centro">
        <form action="/update_client/{{$client['id']}}" method="POST" class="form-create">
        @csrf
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <label class="form-label" for="nome">Nome*:</label>
                    <input class="form-control" type="text" value ="{{$client['name']}}" name="name" required place placeholder="Nome do Cliente">
                </div>
                <div class="col-md-3 col-sm-12">
                    <label class="form-label" for="cpf">CPF*:</label>
                    <input class="form-control" type="text" readonly value ="{{$client['cpf']}}" name="cpf" required placeholder="CPF do Cliente"pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"
                    title="Campo cpf: 000.000.000-00">
                    
                </div>
                <div class="col-md-2 col-sm-12">
                    <label class="form-label" for="data-nascimento">Telefone*:</label>
                    <input class="form-control" type="text" value ="{{$client['phone']}}"name="phone" placeholder="telefone" required pattern="[0-9]{2}[0-9]{5}-[0-9]{4}" title="Campo phone: 9999999-9999">
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