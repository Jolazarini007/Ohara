<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/notas.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
        @include('professor.layouts.sidebar')


        <main>

            <div id="tit">
                <p>&checkmark; - Menção Final; &bigodot; - Menção Temporária; &bigstar; - Condições Especiais</p>
                <h2>Clique duas vezes para inserir a nota e classifique</h2>
            </div>

            <table>
                <thead>
                    <th>RM</th>
                    <th>Nome</th>
                    <th>1º Trimestre</th>
                    <th>2º Trimestre</th>
                    <th>Final</th>
                </thead>


                <tbody>
                    <tr>
                        <td>32133</td>
                        <td>kaua pereira</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11111</td>
                        <td>João Victor Lazarini</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>22222</td>
                        <td>Sofia Ananias Lopes</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>23451</td>
                        <td>Marco Andreik Silva</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>67845</td>
                        <td>Gabriel Pereira</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>98756</td>
                        <td>Gabriel Oliveira</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>56709</td>
                        <td>Fabio Orcus</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>23465</td>
                        <td>Thiago Felix</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div id="ltDir">
                <button type="button" class="botao">Verificar Frequência</button>

                <p id="infosTurma"><strong>Classe</strong><br> <strong>Habilitação:</strong> Técnico em desenvolvimento de Sistemas <br> <strong>Módulo/Série:</strong> 3º Módulo <br> <strong>Componente:</strong> Desenvolvimento de Sistemas <br> <strong>Bimestre/Trimestre:</strong> 2 Trimestre</p>

                <button type="button" class="botao">Adicionar avaliação</button>

                <select name="selcAluno" id="selecAluno">
                    <option value="al1">Kaua Pereira</option>
                </select>

                <textarea name="avlAl" id="avlAl" cols="15" rows="3" placeholder="Insira a avaliação"></textarea>

                <button type="button" class="botao"> Enviar</button>
            </div>

        </main>

    </div>
</body>

</html>