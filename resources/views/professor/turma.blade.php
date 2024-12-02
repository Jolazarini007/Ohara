<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/listPresenca.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
        @include('professor.layouts.sidebar')



        <main>
            <div id="tit">
                <h1>Alunos da Turma: {{ $turma->nome }}</h1>
                <p><strong> ({{ $turma->descricao }}) </strong></p>
            </div>



            <table>
                <thead>
                    <tr>
                        <th>Nome do Aluno</th>
                        <th>RM</th>
                        <th>CPF</th>
                        <!-- Outros campos, como matrícula, etc. -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($turma->alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->rm }}</td>
                        <td>{{ $aluno->cpf }}</td>
                        <!-- Outros campos do aluno -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Botões -->
            <div>
                <a href="" class="botao">Presença</a>
                <a href="" class="botao">Menções</a>
                <a href="{{ route('professor.turma.tarefas.create', $turma->id) }}" class="botao">Tarefas</a>
            </div>

                <div id="infosAluno">
                    <h2>Aluno</h2>
                    <div id="ftChamada"></div>
                    <h4>Nome:</h4>
                    <p>Kaua Pereira de Andrade</p>
                </div>

        </main>
    </div>


</body>

</html>