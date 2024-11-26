<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/home.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
    @include('professor.layouts.sidebar')


        <main>

            <div class="dadosAluno">
                <div class="container">
                    <div class="imgAluno">
                            <div class='frame'>
                                <img src="data:image/jpeg;base64,{{ base64_encode($professor->foto) }}" alt="Imagem não encontrada">         
                            </div>
                    </div>
                    <div class="info">
                        <h3>Professor:</h3>
                        <p>{{ $professor->nome }}</p>
                    </div>
                </div>
            </div>

            <div class="aulasProf">
                <div class="aulas">
                  

                    <div class="aula">
                        <h4>Proxima Aula</h4>
                        <p>Sala 3</p>
                        <p>Etec Juscelino Kubitschek</p>
                    </div>

                    <div class="aula">
                        <h4>Proxima Aula</h4>
                        <p>Sala 5</p>
                        <p>Etec Juscelino Kubitschek</p>
                    </div>

                </div>
            </div>

            <div class="calendarioAluno">
                <div class="header">
                    <h2>Novembro 2024</h2>
                </div>
                <div class="dias">
                    <span>
                        <p>Dom</p>
                        <p>1</p>
                    </span>
                    <span>
                        <p>Seg</p>
                        <p>2</p>
                    </span>
                    <span>
                        <p>Ter</p>
                        <p>3</p>
                    </span>
                    <span>
                        <p>Qua</p>
                        <p>4</p>
                    </span>
                    <span>
                        <p>Qui</p>
                        <p>5</p>
                    </span>
                    <span>
                        <p>Sex</p>
                        <p>6</p>
                    </span>
                    <span>
                        <p>Sab</p>
                        <p>7</p>
                    </span>
                </div>
            </div>

            <div class="msgsProf">
                <div class="header">
                    <h3>Você tem 0 mensagens não lidas</h2>
                </div>
                <div class="msgs">
                    <table>
                        <thead>
                            <th>Data </th>
                            <th>Assunto</th>
                            <th>Remetente</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

        </main>

    </div>
</body>

</html>