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

            <h1>Adicionar Matérias</h1>

            <form action="{{ route('gestao.adicionarMateria') }}" method="POST" id="formMateria" enctype="multipart/form-data">
    @csrf <!-- Adicione esta diretiva para segurança caso não esteja presente -->
    <div class="infos">
        <div>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" required maxlength="35" minlength="8">
        </div>

        <div>
            <label for="descricao">Descrição:</label><br>
            <input type="text" name="descricao" id="descricao" required>
        </div>

    </div>

    <div class="foto">

        <button type="submit" class="botao" form="formMateria">Adicionar Matéria</button>
    </div>
</form>

</body>

</html>