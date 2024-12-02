<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/dados.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
        @include('professor.layouts.sidebar')
        <main>
            <div>
                <h1>Tarefas da Turma {{ $turma->nome }}</h1>

                @if($tarefas->isEmpty())
                <p>Não há tarefas cadastradas para esta turma.</p>
                @else
                <ul>
                    @foreach($tarefas as $tarefa)
                    <li>
                        <strong>{{ $tarefa->titulo }}</strong>
                        ({{ $tarefa->materia ?? 'Matéria não especificada' }})<br>
                        {{ $tarefa->descricao }}<br>
                        Data de entrega: {{ $tarefa->data_entrega }}<br>
                        Criada por: {{ $tarefa->professor->nome ?? 'Professor não encontrado' }}
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div>

                <h1>Criar Nova Tarefa para a Turma: {{ $turma->nome }}</h1>

                <form method="POST" action="{{ route('professor.turma.tarefas.store', $turma->id) }}">
                    @csrf

                    <input type="text" name="titulo" placeholder="Título" required>
                    <textarea name="descricao" placeholder="Descrição" required></textarea>
                    <input type="date" name="data_entrega" required>

                    <label for="materia">Matérias</label>
                        <select name="materia" id="materia" required>
                            @foreach ($professor->materias as $materia)
                            <option value="{{ $materia->id }}" {{ in_array($turma->id, old('materia', [])) ? ' ' : '' }}>
                                {{ $materia->nome }}
                            </option>
                            @endforeach
                        </select>

                    <button type="submit">Criar</button>
                </form>
            </div>

        </main>

    </div>
</body>

</html>