<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/chamadas.css') }}">
    <title>Ohara</title>
</head>
<body>
    <div class="container">
    @include('professor.layouts.sidebar')


        <main>

            <div id="titUp">
                <p><strong>Clique duas vezes para ter acesso a lista de classe</strong></p>
            </div>

            <div id="tblUp">
                <table>
                    <thead>
                        <tr>
                            <th>Habilitação</th>
                            <th>Módulo/Série</th>
                            <th>Componentes</th>
                            <th>Aulas Previstas</th>
                            <th>Aulas Dadas</th>
                            <th>Suas Faltas</th>
                            <th>Reposições Pendentes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Técnico em DS</td>
                            <td>3º Módulo</td>
                            <td>Programção Web</td>
                            <td>70</td>
                            <td>69</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="titBottom">
                <p><strong>Reposições Agendadas - Clique duas vezes para ter acesso a lista de presença</strong></p>
            </div>

            <div id="tblBottom">
                <table>
                    <thead>
                        <th>Habilitação</th>
                        <th>Módulo/Série</th>
                        <th>Componente</th>
                        <th>Qtd. de Aulas</th>
                    </thead>
                    <tbody>
                        <!-- Aqui vão aparecer os dados da reposição -->
                    </tbody>
                </table>
                <strong>Você tem 0 aulas pendentes</strong> 
            </div>

           
        </main>

    </div>
</body>
</html>