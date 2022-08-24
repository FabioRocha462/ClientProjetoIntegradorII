@extends('layouts.main')
@section('title', 'Create Product')
@section('content')
<main class="main-create-address">
<div class="create-address">
<form action="/update_address/{{$address['id']}}" class="form-create" method="POST">
    @csrf
            <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <label  class="form-label">Zona*:</label>
                            <input class="form-control" list="datalistOptions"  value = "{{$address['local']}}"width='30px'name="local" placeholder="Zona">
                            <datalist id="datalistOptions">
                            <option value="Zona Urbana">
                            <option value="Zona Rural">
                            </datalist>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <label class="form-label" for="logradouro">Rua*:</label>
                        <input class="form-control" type="text" id="logradouro" value = "{{$address['locality']}}"name="locality"placeholder= "Nome da Rua ou da zona Rural"  required>
                    </div>
                    <div class="col-md-1 col-sm-12">
                    <label class="form-label" for="numero">N*:</label>
                    <input class="form-control" type="text" id="numero"value = "{{$address['number']}}" name="number" width="20px" required>
                </div>
             </div>
             <div class="row">
                <div class="col-md-5 col-sm-12">
                    <label class="form-label" for="bairro">Bairro*:</label>
                    <input class="form-control" type="text" id="bairro" value = "{{$address['district']}}"name="district" required placeholder='Bairro do cliente'>
                </div>
                <div class="col-md-2 col-sm-12">
                    <label class="form-label" for="telefone">CEP*:</label>
                    <input class="form-control" type="tel" name="cep" id="telefone" value = "{{$address['cep']}}"placeholder='CEP'pattern="[0-9]{5}[0-9]{3}"required>
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
 </div>
</main>
@endsection