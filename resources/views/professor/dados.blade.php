<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/professores/dados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Ohara</title>
</head>
<body>
    <div class="container">
    @include('professor.layouts.sidebar')

        <main>
            <h1>Suas Informações</h1>

            <div id="dados">
                <div>
                    <h3>Nome:</h3>
                    <p>{{ $professor->nome }}</p>
                </div>
                <div>
                    <h3>Telefone:</h3>
                    <p>{{ $professor->telefone }}</p>
                </div>
                <div>
                    <h3>Data de Nascimento:</h3>
                    <p>{{ $professor->dt_nascimento }}</p>
                </div>
                <div>
                    <h3>RM:</h3>
                    <p>{{ $professor->rm }}</p>
                </div>
                <div>
                    <h3>Data de Cadastro:</h3>
                    <p>{{ $professor->created_at->format('d/m/Y') }}</p>
                </div>

            </div>
            <div id="dadosEsq">

                <div id="ftAluno">
                    <img src="data:image/jpeg;base64,{{ base64_encode($professor->foto) }}" alt="Imagem não encontrada">                
                </div>

<!--                 <button type="button" id="btFt">Alterar Foto</button>
 -->            </div>

        </main>
</body>
</html>