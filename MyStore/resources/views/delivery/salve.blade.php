@extends('layouts.main')
@section('title', 'Calculo de Frete')
@section('content')
<main >
    <div class="salve-delivery">
<form id ="form-frete">
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Cidade</label>
    <input type="text" name='city' value="{{$address['city']}}" row="3"class="form-control-plaintext" id="staticEmail2">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Estado</label>
    <input type="text" name='state' value = "{{$address['state']}}"class="form-control" id="inputPassword2" >
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Calcular Frete</button>
  </div>
</form>
</div>
<div class= "enviardelivery">
    <form action ="/delivery_salve/{{$request['id']}}/{{$address['id']}}" method="GET">
      <div class="col-auto">
        <label for="output" >Valor do Frete</label>
        <input id="output" type="number" name='shipping_value' class="form-control-plaintext" >
      </div>
        <button type="submit" class="btn btn-primary mb-3">Salvar Entrega</button>
      </div>
    </form>
<div class="msg"id="send">
</div>
</main>
<script  src=" https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js " > </script>
<script  src="{{URL::asset('js/index.js')}}"> </script>
@endsection