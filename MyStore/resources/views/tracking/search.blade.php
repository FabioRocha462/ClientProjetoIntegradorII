@extends('layouts.main')
@section('title', 'dashboard')
@section('content')
<main>
<div class="container fluid">
    <div class="container">
        <div class="center">
            <form action="/sendcod" method="GET"class="row g-3">
                <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Código de Rastreio</label>
                    <input type="text" name="cod" required class="form-control" id="staticEmail2" placeholder = "código">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
@endsection 