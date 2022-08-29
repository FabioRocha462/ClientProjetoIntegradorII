@extends('layouts.main')
@section('title', 'relatório delivey')
@section('content')
<main>
    <div>
        @if(!empty($deliverys))
        <table class="table">
        <thead>
          <tr>
            <th scope="col"><strong>Data</strong></th>
            <th scope="col">Previsão de Entrega</th>
            <th scope="col">local em transito</th>
            <th scope="col">Status da entrega</th>
            <th scope="col">Valor do Frete</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($deliverys as $d)
          <tr>
                <td>{{date('d/m/y',strtotime($d['date']))}} </td>
                <td>{{date('d/m/y',strtotime($d['date_delivery']))}}</td>
                <td>{{$d['locality']}}</td>
                <td>@if($d['status'] ==0)
                       <stron> Não Entregue </strong>
                    @endif
                    @if($d['status'] ==1)
                        <strong>Entregue</strong>
                    @endif
                </td>
                
  
                <td>{{$d['shipping_value']}}</td>
            
        @endforeach
         </tr>   
   
        </tbody>

    </table>
        @endif
    </div>
</main>
@endsection 
