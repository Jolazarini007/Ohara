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

            <h1>Lista de Cursos</h1>

            @if($cursos->isEmpty())
                <p>Não há cursos cadastrados. <a href="{{ route('gestao.cursos.create') }}">Clique aqui</a> para adicionar um curso.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Matérias</th>
                            <th>Adicionar turma</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                        <tr>
                            <td>{{ $curso->nome }}</td>
                            <td>{{ $curso->descricao }}</td>
                            <td>
                                @foreach(json_decode($curso->materias) as $materia)
                                <span>{{ $materia->nome }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('gestao.cursos.edit', $curso->id) }}">Editar</a>
                            </td>
                            <td>
                                <a href="{{ route('gestao.turmas.create', $curso->id) }}">+</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <a class="botao" href="{{ route('gestao.cursos.create') }}">Adicionar Curso</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            @endif
        </main>

    </div>
</body>

</html>
