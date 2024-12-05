<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/notasFaltas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Notas e faltas</title>
</head>
<body>
    <div class="container">
        @include('aluno.layouts.sidebar')

        <main>
            <div class="conteudo">
                <h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24">
                    <path fill="currentColor" d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z"/>
                    </svg>
                    Notas e Faltas
                </h1>
                <table>
                    <thead>
                        <tr>
                            <th>Disciplina</th>
                            <th>Nota</th>
                            <th>Faltas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Matemática</td>
                            <td>8.5</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>História</td>
                            <td>7.0</td>
                            <td>1</td>
                        </tr>
                        <!-- Adicione mais linhas conforme necessário -->
                    </tbody>
                </table>

            </div>
            <p>Há algum engano nas notas ou faltas? Reclame aqui &RightArrow;  <a class="link" href="{{ route('aluno.reclamacoes') }}">Reclamações</a></p>
        </main>
    </div>
</body>
</html>
