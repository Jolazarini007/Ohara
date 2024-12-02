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

            <h1>Cadastro Aluno</h1>

            <form action="{{ route('gestao.adicionarAluno') }}" method="POST" id="formCadastroAl" enctype="multipart/form-data">
    @csrf <!-- Adicione esta diretiva para segurança caso não esteja presente -->
    <div class="infos">
        <div>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" required maxlength="35" minlength="8">
        </div>

        <div>
            <label for="rm">RM:</label><br>
            <input type="text" name="rm" id="crm" required>
        </div>

        <div>
            <label for="rg">RG:</label><br>
            <input type="text" name="rg" id="rg" required maxlength="14">
        </div>

        <div>
            <label for="cpf">CPF:</label><br>
            <input type="text" name="cpf" id="cpf" required maxlength="14">
        </div>

        <div>
            <label for="codigo_etec">Código da ETEC:</label><br>
            <input type="text" name="codigo_etec" id="codigo_etec" required>
        </div>

        <div>
                        <label for="turmas">Turmas</label>
                        <select name="turmas[]" id="turmas" multiple="multiple" required>
                            @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}" {{ in_array($turma->id, old('turma', [])) ? ' ' : '' }}>
                                {{ $turma->nome }}
                            </option>
                            @endforeach
                        </select>
                        @error('turmas') <span style="color: red">{{ $message }}</span> @enderror
                        @error('turmas.*') <span style="color: red">{{ $message }}</span> @enderror
                    </div>

        <div>
            <label for="telefone">Telefone:</label><br>
            <input type="tel" name="telefone" id="telefone" required pattern="\d{10,11}" title="Informe um telefone válido com DDD.">
        </div>

        <div>
            <label for="endereco">Endereço:</label><br>
            <input type="text" name="endereco" id="endereco" required maxlength="50" minlength="5">
        </div>

        <div>
            <label for="dt_nascimento">Data de Nascimento:</label><br>
            <input type="date" name="dt_nascimento" id="dt_nascimento" required>
        </div>
    </div>

    <div class="foto">
        <div id="ftAl">
            <div id="ft">
                <!-- A imagem de pré-visualização será exibida aqui -->
                <img id="preview" src="#" alt="Pré-visualização da foto" style="display: none;">
            </div>

            <label for="photo" class="botao">Escolha uma foto:</label>
            <input type="file" accept="image/*" name="photo" id="photo" required onchange="previewImage(event)">
        </div>
        <button type="submit" class="botao" form="formCadastroAl">Adicionar Aluno</button>
    </div>
</form>

<!-- Lembre-se de que o RG será usado como senha inicial, sendo criptografado no sistema -->

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result; // Define a imagem no elemento <img>
                preview.style.display = 'block'; // Exibe a imagem
            };

            reader.readAsDataURL(input.files[0]); // Lê o conteúdo do arquivo como URL de dados
        } else {
            preview.src = '';
        }
    }
    
    /* Inicializando o Select2 */

    $(document).ready(function() {
                // Limpa o valor selecionado do Select2 sempre que o body for carregado
                $('#turmas').val(null).trigger('change');

                // Inicializa o Select2 para o select de matérias
                $('#turmas').select2({
                    placeholder: "Selecione as turmas", // Texto de placeholder
                    allowClear: true, // Permite limpar a seleção
                    width: '100%' // Faz o select2 ocupar toda a largura disponível
                });
            });
</script>


</body>

</html>