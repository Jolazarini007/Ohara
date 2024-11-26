<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/listPresenca.css') }}">
    <title>Ohara</title>
</head>
<body>
    <div class="container">
    @include('professor.layouts.sidebar')


        
        <main>
            <div id="tit">
            <h1>Lista de presença</h1>
            <p><strong>Clique duas vezes para inserir a falta</strong></p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>RM</th>
                    <th>Nome</th>
                    <th>Faltas</th>
                    <th>Frequência do Dia</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>32133</td>
                    <td>kaua pereira</td>
                    <td>3</td>
                    <td>F</td>
                </tr>
            </tbody>
        </table>
        <div id="infosAluno">
            <h2>Aluno</h2>
            <div id="ftChamada"></div>
            <h4>Nome:</h4>
            <p>Kaua Pereira de Andrade</p>
        </div>
    </main>
</div>
</body>
</html>