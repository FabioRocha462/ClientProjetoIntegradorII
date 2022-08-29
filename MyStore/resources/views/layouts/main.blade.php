<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
</head>
<body>
    <header>
    <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="/dashboard">
                    <div class="logo">
                        <span id="span_logo">M</span>
                        <span id="span_logo">Y</span>
                        <span id="span_logo">S</span>
                        <span id="span_logo">T</span>
                        <span id="span_logo">O</span>
                        <span id="span_logo">R</span>
                        <span id="span_logo">E</span>
                    </div>
                </a>
                <div class="navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav">
                       <a class="nav-link" href="/formcod">Rastrei seu pedido</a>
                        @auth
                        <a class="nav-link" href="{{route('client.index')}}">Clientes</a>
                        <a class="nav-link " href="{{route('product.index')}}">Produtos</a>
                        <a class="nav-link " href="{{route('report.index')}}">Relatórios</a>
                        <a class="nav-link " href="/create_token">Login TransFÉ</a>
                        @endauth
                        
                        <a class="nav-item nav-link" href="#linha2">Quem somos</a>
                        @guest
                        <li class="nav-item"> <a class="nav-link text-dark" aria-current="page" href="/login"><button type="button" class="btn btn-warning">logar</button></a></li>
                        <li class="nav-item"> <a class="nav-link text-dark" aria-current="page" href="/register"><button type="button" class="btn btn-warning">Cadastrar</button></a></li>
                        @endguest

    
                        
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @auth
        <ul class="nav nav-pills">
           
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <button type="button" class="btn btn-dark">{{auth()->user()->name}}</button>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">
            <form  action="/logout" method="POST">
                                      @csrf
                                      <a id="link_sair" href="logout" onclick="event.preventDefault();
                                      this.closest('form').submit();" >
                                      <li class="dropdown-item">Sair</li>
                                    </a>
                                </form>
            </a></li>
          </ul>
        </li>
        </ul>
    @endauth
    @yield('content') 
    <div class="container-fluid">
            
            <div class="row" id="linha2" style="padding-top: 3rem;">
                <div class="col-md-6 col-sm-12" style="margin-bottom:1rem;">
                    <h2 id="h2">Quem somos!</h2>
                    <p>Somos uma empresa criada com o intuito de atender os objetivos do projeto integrador, este que demanda a criação de um sistema distribuído em que um servidor deverá atender requisições de diferentes clientes, onde o servidor recenbe solicitações de serviços e envia respostas aos clientes.</p>
                    <p>
                    Está loja busca atender a vaga de cliente de um serviço, onde faremos requisições de calculo de frete e de entregas ao servidor, esperando sempre a resposta o mais protamente possivel.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12" style="margin-bottom:1rem;">
                    <h2 id="h2">Missão</h2>
                    <p>
                        Fornecer a melhor e mais rápida experiência na compra de produtos.
                    </p>
                    <h2 id="h2">Objetivos</h2>
                    <ul>
                        <li>Consumir os serviços disponibilizados pelo servidor da melhor maneira possível</li>
                        <li>mostrar a comunicação entre o cliente(Loja) e o servidor em tempo real</li>
                        <li>Desenvolver uma loja simples, mas que funcione</li>
                    </ul>
                </div>
            </div>
        </div>

    </main>
    <footer style="text-align: center;">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-4 col-sm-12">
                    <h3><br> Endereço</h3>
                    <p>Pau dos ferros</p>
                    <p>CEP: 59900-000</p>
                </section>
                <section class="col-md-4 col-sm-12">
                    <h3><br> Redes Sociais</h3>
                    <p><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg></a></p>
                    <p><a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="#d6249f" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg></a></p>

                </section>
                <section class="col-md-4 col-sm-12">
                    <h3><br> Contato</h3>
                    <p>Telefone: (99) 99999 - 9999</p>
                    <p>Email: mystore@gmail.com</p>
                </section>
            </div>
        </div>
        MyStore &copy; 2022 - Todos os direitos reservados.
        <br><br>
    </footer>
   <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>

</body>
</html>