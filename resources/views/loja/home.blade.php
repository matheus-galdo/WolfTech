@extends('template/template')
@section('titulo', 'Wolf Tech - Home')

@section('addCss')
<link rel="stylesheet" href="{{url('css/cards.css')}}" />
@endsection


@section('conteudo')
    

    <div class="slider">
        Slider
    </div>
    <div class="destaques">
        @for ($i = 0; $i < 9; $i++)
            <a class="card" href="produto/detalhes">
                <div class="">
                    <img src="{{url('images/produtos/processador.jpg')}}" class="imgProduto">
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
            <img src="{{url('images/produtos/placa-mae.jpeg')}}" alt="" class="imgProduto">
            <h1 class="nome">Placa mãe H61 3ª Geração Asus</h1>
            <p class="valor">R$ 500,00</p>
            <p class="descricao">descrição aaaaaa aaaaaaaa aaaaaaaaaaaaa aqui vem uma descrição maiorzinha do produto</p>
            
        </div>
    </div>

@endsection