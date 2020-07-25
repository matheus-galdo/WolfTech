@extends('template/template')
@section('titulo', 'Wolf Tech - Home')

@section('addCss')
<link rel="stylesheet" href="{{url('css/home.css')}}" />
<link rel="stylesheet" href="{{url('css/cards.css')}}" />
@endsection


@section('conteudo')
    

    <div class="slider">
        <marquee>Slider</marquee>
    </div>
    <div class="destaques">
        <div class="cards">
            @for ($i = 0; $i < 9; $i++)
                <a class="card" draggable href="produto/detalhes">
                    <div class="">
                        <div class="foto-container">
                            <img src="{{url('images/produtos/processador.jpg')}}" class="imgProduto">
                        </div>
                        <h1 class="nome">Processador i5 8400</h1>
                        <p class="valor">R$ 500,00</p>
                        <p class="descricao">descrição do produto</p>
                        {{-- <div class="botoes">
                            <button>Adicionar ao carrinho</button>
                        </div> --}}
                    </div>
                </a>
            @endfor
            <div class="card">
                <div class="foto-container">
                    <img src="{{url('images/produtos/placa-mae.jpeg')}}" alt="" class="imgProduto">
                </div>
                <h1 class="nome">Placa mãe H61 3ª Geração Asus</h1>
                <p class="valor">R$ 500,00</p>
                <p class="descricao">descrição aaaaaa aaaaaaaa aaaaaaaaaaaaa aqui vem uma descrição maiorzinha do produto</p>
                
            </div>

            <div class="card">
                <div class="foto-container">
                    <img src="{{url('images/produtos/vga.jpg')}}" alt="" class="imgProduto">
                </div>
                <h1 class="nome">Placa de video</h1>
                <p class="valor">R$ 500,00</p>
                <p class="descricao">descrição aaaaaa aaaaaaaa aaaaaaaaaaaaa aqui vem uma descrição maiorzinha do produto</p>
                
            </div>
        </div>
    </div>

@endsection