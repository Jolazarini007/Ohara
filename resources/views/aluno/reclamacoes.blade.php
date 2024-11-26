<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/reclamacoes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Reclamações</title>
</head>

<body>
    <div class="container">

    @include('aluno.layouts.sidebar')

        <main>
            
            <h1>Reclamações</h1>
    
            <form action="#" method="post">
                <div>
                    <label for="TPrecla">Tipo da reclamação</label><br>
                    <select name="TPrecla" id="TPrecla" required>
                        <option value="opcao1">Comportamento</option>
                        <option value="opcao2">Didática</option>
                        <option value="opcao3">Professores</option>
                        <option value="opcao4">Frequência</option>
                        <option value="opcao5">Outro</option>
                    </select>
                </div>
    
                <div>
                    <label for="txtrecla">Qual a sua reclamação?</label> <br>
                    <textarea name="txtrecla" id="txtrecla" cols="35" rows="10" placeholder="Eu acho minha nota injusta pois..." required spellcheck="true"></textarea>
                </div>

                <input type="button" value="Enviar" id="btrecla">
            </form>
        </main>
    </div>
</body>
</html>