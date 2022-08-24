@extends('layouts.main')
@section('title', 'Welcome')
@section('content')
    <section>
        <div class="carousel slide carousel-fade" id="carouselExampleFade" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active"><a href="#" target="_blank"> <img class="d-block w-100" src="img/caminhao-foto.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"><a href="#" target="_blank"> <img class="d-block w-100" src="img/imagem2.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"> <a href="#" target="_blank"> <img class="d-block w-100" src="img/imagem4.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"> <a href="#" target="_blank"> <img class="d-block w-100" src="img/imagem5.jpg" width="1400px" height="450px" alt="..."></a></div>
            <div class="carousel-item"> <a href="#" target="_blank"> <img class="d-block w-100" src="img/mercedes-980x490.png" width="1400px" height="450px" alt="..."></a></div>
          </div>
        </div>
      </section>
      @if(!empty($msg))
        <div class="msg">
        <h5>{{$msg}}</h5>    
        </div>
  @endif
@endsection