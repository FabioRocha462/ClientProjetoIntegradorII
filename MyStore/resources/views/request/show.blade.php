@extends('layouts.main')
@section('title', 'Create Product')
@section('content')
@if(!empty($request))
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">valor</th>
            <th scope="col">quantidade</th>
            <th scope="col">mul </th>
          </tr>
        </thead>
        <tbody>
        @foreach ($request as $r)
          <tr>
                <td>{{$r['name']}} </td>
                <td>{{$r['unitary_value']}}</td>
                <td>{{$r['quantity']}} </td>
                <td>{{$r['mul']}} </td>
                        
        @endforeach
         </tr>       
        </tbody>

    </table>
    @if(!empty($total))
    <div class='msg'>
      <h5>Valor Total do Pedido {{$total}}</h5>
    </div>
    @endif
        <div class="generate_delivery">
            <div class="row justify-content-center">
                <div class="col">    
                    <a href="/delivery_create/{{$request_id['id']}}"><button type="button" class="btn btn-success">Criar Entrega</button></a>
                </div>     
            </div>
</div>

  
@endif
@endsection