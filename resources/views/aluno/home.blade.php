<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Home</title>
</head>

<body>
    <div class="container">

        @include('aluno.layouts.sidebar')

        <main>

            <div class="dadosAluno">
                <div class="header">
                    <h2>Informações do Aluno</h2>
                </div>
                <div class="container">
                    <div class="imgAluno">
                        <div class='frame'>
                            <img src="data:image/jpeg;base64,{{ base64_encode($aluno->foto) }}" alt="Imagem não encontrada">
                        </div>
                    </div>
                    <div class="info">
                        <h3>Nome:</h3>
                        <p>{{ $aluno->nome }}</p>
                        <h3>Rm:</h3>
                        <p>{{ $aluno->rm }}</p>
                        <h3>Turmas:</h3>
                        @foreach($aluno->turmas as $turma)
                        <p>{{ $turma->nome }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="notificacoesAluno">
                <div class="header">
                    <h2>Notificações</h2>
                </div>
                <div class="notificacoes">
                    <div class="notificacao">
                        <h4>Atividade de banco de dados</h4>
                        <p>Você recebeu uma notificação!</p>
                    </div>

                    <div class="notificacao">
                        <h4>Atividade de Desenvolvimento Mobile</h4>
                        <p>Você recebeu uma notificação!</p>
                    </div>

                    <div class="notificacao">
                        <h4>Prévia do TCC</h4>
                        <p>Você recebeu uma notificação!</p>
                    </div>

                    <div class="notificacao">
                        <h4>Entrega de atividade Pendente</h4>
                        <p>Você recebeu uma notificação!</p>
                    </div>

                    <div class="notificacao">
                        <h4>Evento do Hopi Hari</h4>
                        <p>Você recebeu uma notificação</p>
                    </div>
                </div>
            </div>

            <div class="calendarioAluno">
                <div class="header">
                    <h2>Novembro 2024</h2>
                </div>
                <div class="dias">
                    <span>
                        <p>Dom</p>
                        <p>1</p>
                    </span>
                    <span>
                        <p>Seg</p>
                        <p>2</p>
                    </span>
                    <span>
                        <p>Ter</p>
                        <p>3</p>
                    </span>
                    <span>
                        <p>Qua</p>
                        <p>4</p>
                    </span>
                    <span>
                        <p>Qui</p>
                        <p>5</p>
                    </span>
                    <span>
                        <p>Sex</p>
                        <p>6</p>
                    </span>
                    <span>
                        <p>Sab</p>
                        <p>7</p>
                    </span>
                </div>
            </div>

            <div class="tarefasAluno">
                <div class="header">
                    <h2>Tarefas</h2>
                </div>
                <div class="tarefas">
                    @forelse ($tarefas as $tarefa)

                    <div>
                        <p> {{ $tarefa->titulo }}</p>
                    </div>
                    @empty
                    <p>Você não tem atividades pendentes</p>
                    @endforelse

                </div>

        </main>

    </div>
</body>

</html>