<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gestao/cadastros.css') }}">

    <title>Ohara</title>
</head>

<body>
    <div class="container">

        @include('gestao.layouts.sidebar')

        <main>

                <h2>Lista de Turmas</h2>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($turmas as $turma)
                        <tr>
                            <td>{{ $turma->nome }}</td>
                            <td>
                                <a href="{{ route('gestao.editarTurmaview', $turma->id) }}">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('gestao.adicionarTurmaview') }}">Criar Nova Turma</a>

        </main>

</body>

</html>