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
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>32133</td>
                    <td>kaua pereira</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>11111</td>
                    <td>João Victor Lazarini</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>22222</td>
                    <td>Sofia Ananias Lopes</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>23451</td>
                    <td>Marco Andreik Silva</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>67845</td>
                    <td>Gabriel Pereira</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>98756</td>
                    <td>Gabriel Oliveira</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>56709</td>
                    <td>Fabio Orcus</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>23465</td>
                    <td>Thiago Felix</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
        <div id="infosAluno">
            <h2>Aluno</h2>
            <div id="ftChamada"></div>
            <h4>Nome:</h4>
            <p>Kaua Pereira</p>
        </div>
    </main>
</div>
</body>
</html>