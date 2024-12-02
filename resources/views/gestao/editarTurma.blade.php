<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gestao/cadastros.css') }}">
    <!-- Carregar jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Carregar o CSS do Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Carregar o JS do Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Ohara</title>
</head>

<body>
    <div class="container">

        @include('gestao.layouts.sidebar')

        <div class="container">
            <h2>Editar Turma: {{ $turma->nome }}</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <form action="{{ route('gestao.editarTurma', $turma->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nome e Descrição da Turma -->
                <div class="form-group">
                    <label for="nome">Nome da Turma</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $turma->nome) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" value="{{ old('descricao', $turma->descricao) }}" class="form-control">
                </div>

                <!-- Matérias e Professores -->
                <div class="form-group">
                    <h3>Matérias e Professores</h3>
                    @foreach($turma->materias as $materia)
                    <div class="materia-item">
                        <label>{{ $materia->nome }}</label>

                        <!-- Selecione o professor para esta matéria -->
                        <select name="professores[{{ $materia->id }}]" class="form-control">
                            <option value="">Selecione o professor</option>
                            @foreach($professores as $professor)
                            <option value="{{ $professor->id }}"
                                {{ old("professores.{$materia->id}", $materia->professores->pluck('id')->first()) == $professor->id ? 'selected' : '' }}>
                                {{ $professor->nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Atualizar Turma</button>
            </form>
        </div>

        <script>
            $(document).ready(function() {
                // Inicializa o Select2 para cada select que usa múltiplas seleções
                $('#materias, #professores').select2({
                    placeholder: "Selecione",
                    allowClear: true,
                    width: '100%' // Para garantir que ocupe 100% da largura do container
                });
            });
        </script>
</body>

</html>