<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/consulDeProtocol.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
    @include('aluno.layouts.sidebar')


        <main>

            <h1>Consulte Seu protocolo</h1>

            <form action="#" method="get">
                <div>
                    <label for="protoIN">Protocolo:</label> <br>
                    <input type="number" name="protoIN" id="protoIN" placeholder="Digite seu protocolo" required>
                </div>
                <input type="button" value="Consultar" class="btproto">

                <div id="res">
                    Nessa div deve retornar o estado do protocolo
                </div>

                <div>
                    <label for="solIN">Solicitação do Declaração</label> <br>
                    <select name="solIN" id="solIN" required>
                        <option value="opcao1">opcao1</option>
                        <option value="opcao2">opcao2</option>
                        <option value="opcao3">opcao3</option>
                    </select>
                </div>

                <div>
                    <label for="finIN">Para qual finalidade será a declaração?</label> <br>
                    <input type="text" name="finIN" id="finIN" required maxlength="35">
                </div>
                <input type="button" value="enviar" class="btproto">
            </form>

        </main>
        
    </div>
</body>
</html>