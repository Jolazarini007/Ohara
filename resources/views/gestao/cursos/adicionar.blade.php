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

            <h1>Cadastro de Cursos</h1>

            <form action="{{ route('gestao.cursos.adicionar') }}" method="POST" id="formCurso" enctype="multipart/form-data">
                @csrf
                <div class="infos">
                    <div>
                        <label for="nome">Nome do curso:</label><br>
                        <input type="text" name="nome" id="nome" required maxlength="35" minlength="8">
                    </div>

                    <div>
                        <label for="descricao">Descrição:</label><br>
                        <textarea rows="3" name="descricao" id="descricao" required></textarea>
                    </div>

                    <div>
                        <label for="modulos">Quantidade de módulos:</label><br>
                        <input type="number" name="modulos" id="modulos" required min="1">
                    </div>

                    <div>
                        <label for="periodos">Períodos:</label><br>
                        <select name="periodos[]" id="periodos" multiple="multiple" required>
                            <option value="manha">Manhã</option>
                            <option value="tarde">Tarde</option>
                            <option value="noite">Noite</option>
                        </select>
                    </div>

                    <div>
                        <label for="materias">Matérias do Curso:</label><br>
                        <input type="text" id="materiasInput" placeholder="Digite uma matéria e pressione Enter">
                        <ul id="materiasLista"></ul>
                        <input type="hidden" name="materias" id="materiasHidden">
                    </div>
                </div>

                <button type="submit" class="botao">Cadastrar Curso</button>
            </form>
        </main>

        <!-- Script JavaScript -->
        <script>
                        $(document).ready(function() {
                // Limpa o valor selecionado do Select2 sempre que o body for carregado
                $('#periodos').val(null).trigger('change');

                // Inicializa o Select2 para o select de matérias
                $('#periodos').select2({
                    placeholder: "Selecione os períodos", // Texto de placeholder
                    allowClear: true, // Permite limpar a seleção
                    width: '100%' // Faz o select2 ocupar toda a largura disponível
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                const materiasInput = document.getElementById('materiasInput');
                const materiasLista = document.getElementById('materiasLista');
                const materiasHidden = document.getElementById('materiasHidden');
                const materiasArray = [];

                // Função para adicionar matéria na lista
                materiasInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        const materia = materiasInput.value.trim();
                        if (materia && !materiasArray.includes(materia)) {
                            materiasArray.push(materia);
                            const li = document.createElement('li');
                            li.textContent = materia;

                            // Botão para remover a matéria
                            const removeButton = document.createElement('button');
                            removeButton.textContent = 'Remover';
                            removeButton.type = 'button';
                            removeButton.addEventListener('click', function() {
                                const index = materiasArray.indexOf(materia);
                                if (index > -1) {
                                    materiasArray.splice(index, 1);
                                }
                                li.remove();
                                atualizarCampoHidden();
                            });

                            li.appendChild(removeButton);
                            materiasLista.appendChild(li);
                            atualizarCampoHidden();
                        }
                        materiasInput.value = '';
                    }
                });

                // Função para atualizar o valor do campo oculto antes do envio do formulário
                function atualizarCampoHidden() {
                    materiasHidden.value = materiasArray.join(','); // Concatena as matérias com vírgula
                }

                // Ao enviar o formulário, garantir que as matérias estejam atualizadas
                document.getElementById('formCurso').addEventListener('submit', function() {
                    atualizarCampoHidden(); // Atualiza o valor no campo hidden antes do envio
                });
            });
        </script>
</body>

</html>