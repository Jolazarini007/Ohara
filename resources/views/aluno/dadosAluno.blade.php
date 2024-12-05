<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/dados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
        @include('aluno.layouts.sidebar')

        <main>
            <h1>Suas Informações</h1>

            <div id="dados">
                <div>
                    <h3>Nome:</h3>
                    <p>{{ $aluno->nome }}</p>
                </div>
                <div>
                    <h3>Telefone:</h3>
                    <p>{{ $aluno->telefone }}</p>
                </div>
                <div>
                    <h3>Data de Nascimento:</h3>
                    <p>{{ $aluno->dt_nascimento }}</p>
                </div>
                <div>
                    <h3>RM:</h3>
                    <p>{{ $aluno->rm }}</p>
                </div>
                <div>
                    <h3>Turmas:</h3>
                    @foreach($aluno->turmas as $turma)
                    <p>{{ $turma->nome }}</p>
                    @endforeach
                </div>
                <div>
                    <h3>Periodo:</h3>
                    <p>{{ $aluno->periodo }}</p>
                </div>

                <div>
                    <h3>Data de Matrícula:</h3>
                    <p>{{ $aluno->created_at->format('d/m/Y') }}</p>
                </div>

            </div>
            <div id="dadosEsq">


                <div id="ftAluno">
                    <img src="data:image/jpeg;base64,{{ base64_encode($aluno->foto) }}" alt="Imagem não encontrada">
                </div>

<!--                 <button type="button" id="btFt">Alterar Foto</button>
 -->            </div>

        </main>
</body>

</html>