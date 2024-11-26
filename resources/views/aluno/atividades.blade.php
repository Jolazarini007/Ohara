<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/atividades.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Ohara</title>
</head>
<body>
    <div class="container">
    @include('aluno.layouts.sidebar')

        <main>

            <div id="areaNav">
                <input type="text" name="procAtv" id="procAtv" placeholder="Procurar atividade">
                <div id="linksNav">
                    <a href="#">Recentes</a>
                    <a href="#">Todas</a>
                    <a href="#">Atrasadas</a>                
                </div>
            </div>

            <div id="areaAtvs">
                <div id="atv">
                    <p id="materiaAtv">Matéria</p>
                    <p id="dataAtv">22/09/2024</p>
                    <button type="button" class="botao" id="anexarAtv">Visualizar Atividade</button>
                </div>
            </div>

        </main>

    </div>
</body>
</html>