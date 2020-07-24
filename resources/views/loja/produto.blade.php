@extends('template/template')
@section('titulo', $nomeProduto.' - Wolf Tech')
@section('addCss')
    <link rel="stylesheet" href="{{url('css/produto.css')}}">
@endsection
@section('conteudo')
    <div class="produto">
        <section class="detalhes">
            <div class="foto">
                <img src="{{url('images/produtos/processador.jpg')}}" alt="">
            </div>
            
            <div class="descricao">
                <h1 class="nome">Processador i5 8400</h1>
                <p class="valor">R$ 500,00</p>
                <p class="descricao">descrição do produto <br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue.
                    Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy. Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique.
                </p>
                <button id="comprar" class="btnComprar">Comprar</button>
            </div>
        </section>


        <section class="especificacoes">
            aaaaa
        </section>

        
        <section class="semelhantes">
            aaaa
        </section>
    </div>
@endsection