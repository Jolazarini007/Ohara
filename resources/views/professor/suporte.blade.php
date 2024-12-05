<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/suporte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">

    <title>Ohara</title>
</head>
<body>
    <div class="container">

    @include('professor.layouts.sidebar')

        <main>
            
            <h1>Suporte</h1>
            
            <div id="acessos" class="quad">
                <h2>Acessos</h2>
                <p class="desc">Acessos as telas e funções</p>
                <p class="exDuv">Como faço para ver minhas notas e etc?</p>
                <a href="#" class="VM">Ver Mais > </a>
            </div>

            <div id="contato" class="quad">
                <h2>Contatos</h2>
                <p class="desc">Entrar em Contato</p>
                <p class="exDuv">Como posso entrar em Contato com as secretária?</p>
                <a href="#" class="VM">Ver Mais > </a>
            </div>

            <div id="suporte" class="quad">
                <h2>Suporte</h2>
                <p class="desc">Suporte Técnico</p>
                <p class="exDuv">Como posso entrar em contato com o suporte técnico?</p>
                <a href="#" class="VM">Ver Mais > </a>
            </div>

            <a href="{{ route('professor.suporte2') }}" class="botao" id='btDown'>Proximo</a>

        </main>
    </div>
</body>
</html>