<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <title>Wolf Tech - @yield('titulo')</title>

    <link rel="stylesheet" href="{{url('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('favicon.png')}}" />
</head>
<body>
    <div class="main">
        <header>
            <nav>
                <div class="search clearfix">
                <a href="{{url('/')}}">
                    <img class="logo" src="{{url('wolftech-min.png')}}" alt="logotipo">
                </a>
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
    
</body>
</html>