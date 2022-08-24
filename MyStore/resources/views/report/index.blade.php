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
            <th scope="col">Valor do Frete</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($deliverys as $d)
        @if($d['status'] == 0)
          <tr>
                <td>{{date('d/m/y',strtotime($d['date']))}} </td>
                <td>{{date('d/m/y',strtotime($d['date_delivery']))}}</td>
                <td>{{$d['locality']}}</td>
                <td>{{$d['shipping_value']}}</td>

        @endif             
        @endforeach
         </tr>   
   
        </tbody>

    </table>
        @endif
    </div>
</main>
@endsection 
