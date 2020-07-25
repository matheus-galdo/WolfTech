<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="{{url('css/main.css')}}">
    @yield('addCss')
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
    <link rel="shortcut icon" href="{{url('favicon.png')}}" />
</head>
<body class="preload">
    <div class="main">
        <header>
            <nav>
                <div class="search clearfix">
                    <a class="logo" href="{{url('/')}}">
                        <img class="" src="{{url('wolftech-tiny.png')}}" alt="logotipo">
                    </a>
                    
                    <div class="nav-btn-container">
                        <button class="btnNav material-icons">
                            shopping_cart
                        </button>
                        
                        {{-- <button class="btnNav material-icons">
                            menu
                        </button>
                         --}}
                        <span class="carrinho-counter">
                            10
                        </span>

                        <button class="btnNav material-icons">
                            account_circle
                        </button>
                    </div>

                    <form action="/buscar/" class="pesquisa">
                        <div class="form-wrapper">
                            <input type="text" placeholder="Buscar por produtos" name="pesquisar" id="pesquisar">
                            <button class="search-btn"><span class="material-icons">search</span></button> 
                        </div>
                    </form>
                </div>
                
                
                <ul class="menu">
                    <li id="dropdownBtn">Categorias <span class="arrow">&#11206</span></li>
                    <ul class="dropdown hide">
                        <li>Gabinete</li>
                        <li>Placa Mãe</li>
                        <li>Placa de Vídeo</li>
                        <li>Processador</li>
                        <li>Memória RAM</li>
                        <li>Fonte</li>
                        <li>HD</li>
                        <li>SSD</li>
                        <li>Mouse</li>
                        <li>Teclado</li>
                    </ul>

                    <li>Monte seu PC</li>
                    <li>Sobre</li>
                    <li>Contato</li>
                </ul>
            </nav>
        </header>

        <div class="container">
            @yield('conteudo')
        </div>
    
        <footer>
            <p>Galdo que fez - Hacker Boys - 2020</p>
        </footer>
    </div>
    <script src="{{url('js/preload.js')}}"></script>
</body>
</html>