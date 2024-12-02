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

        <main>

            <h1>Cadastro de Turmas</h1>

            <form action="{{ route('gestao.adicionarTurma') }}" method="POST" id="formTurma" enctype="multipart/form-data">
                @csrf <!-- Adicione esta diretiva para segurança caso não esteja presente -->
                <div class="infos">
                    <div>
                        <label for="nome">Nome da Turma:</label><br>
                        <input type="text" name="nome" id="nome" required maxlength="35" minlength="8">
                    </div>

                    <div>
                        <label for="descricao">Descrição:</label><br>
                        <textarea rows="3" name="descricao" id="descricao" required></textarea>
                    </div>

                    <div>
                        <label for="curso_id">Curso:</label><br>
                        <select name="curso_id" id="curso_id" required>
                            <option value="" disabled selected>Selecione o curso</option>
                            @foreach ($cursos as $curso)
                                
                            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                            @endforeach
                        </select>
                        @error('curso_id') <span style="color: red">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="materias">Matérias</label>
                        <select name="materias[]" id="materias" multiple="multiple" required>
                            @foreach ($materias as $materia)
                            <option value="{{ $materia->id }}" {{ in_array($materia->id, old('materias', [])) ? ' ' : '' }}>
                                {{ $materia->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('materias') <span style="color: red">{{ $message }}</span> @enderror
                        @error('materias.*') <span style="color: red">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="foto">
                    <button type="submit" class="botao" form="formTurma">Adicionar Turma</button>
                </div>
            </form>

        </main>

        <!-- Inicializando o Select2 -->
        <script>
            $(document).ready(function() {
                // Limpa o valor selecionado do Select2 sempre que o body for carregado
                $('#materias').val(null).trigger('change');

                // Inicializa o Select2 para o select de matérias
                $('#materias').select2({
                    placeholder: "Selecione as matérias", // Texto de placeholder
                    allowClear: true, // Permite limpar a seleção
                    width: '100%' // Faz o select2 ocupar toda a largura disponível
                });
            });
        </script>
</body>

</html>