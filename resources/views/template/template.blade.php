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
                    <a href="{{url('/')}}">
                        <img class="logo" src="{{url('wolftech-min.png')}}" alt="logotipo">
                    </a>
                    
                    <div class="navBtns">
                        <button class="btnNav material-icons">
                            shopping_cart
                        </button>
                        
                        <button class="btnNav material-icons">
                            menu
                        </button>
                        
                        
                        <button class="btnNav material-icons">
                            account_circle
                        </button>

                    </div>

                    <form action="" class="pesquisa">
                        <input type="text" placeholder="Buscar por produtos" name="pesquisar" id="pesquisar">
                    </form>
                </div>
                
                
                <ul class="menu">
                    <li>Link</li>
                    <li>Link</li>
                    <li>Link</li>
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