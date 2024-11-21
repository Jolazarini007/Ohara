<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/professores/menuLateral.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professores/home.css') }}">
    <title>Ohara</title>
</head>

<body>
    <div class="container">
        <section>
            <span>
                <h1>Ohara</h1>
            </span>
            <div class="itens">

                <a href="{{ route('professor.home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24">
                        <path fill="currentColor"
                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                    </svg>
                    <p>Tela Inicial</p>
                </a>
                <a href="{{ route('professor.home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24">
                        <path fill="currentColor"
                            d="M304 240l0-223.4c0-9 7-16.6 16-16.6C443.7 0 544 100.3 544 224c0 9-7.6 16-16.6 16L304 240zM32 272C32 150.7 122.1 50.3 239 34.3c9.2-1.3 17 6.1 17 15.4L256 288 412.5 444.5c6.7 6.7 6.2 17.7-1.5 23.1C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zm526.4 16c9.3 0 16.6 7.8 15.4 17c-7.7 55.9-34.6 105.6-73.9 142.3c-6 5.6-15.4 5.2-21.2-.7L320 288l238.4 0z" />
                    </svg>
                    <p>Ferramentas do professor</p>
                </a>
                <a href="{{ route('professor.presenca') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24">
                        <path fill="currentColor"
                            d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z" />
                    </svg>
                    <p>Chamadas</p>
                </a>
                <a href="{{ route('professor.home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24">
                        <path fill="currentColor"
                            d="M160 80c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 352c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-352zM0 272c0-26.5 21.5-48 48-48l32 0c26.5 0 48 21.5 48 48l0 160c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48L0 272zM368 96l32 0c26.5 0 48 21.5 48 48l0 288c0 26.5-21.5 48-48 48l-32 0c-26.5 0-48-21.5-48-48l0-288c0-26.5 21.5-48 48-48z" />
                    </svg>
                    <p>Menções</p>
                </a>
             
            </div>
            <div class="etc">
                <a href="{{ route('professor.home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="24" height="24">
                        <path fill="currentColor"
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                    </svg>
                    <p>Suporte</p>
                </a>
                <form method="POST" action="{{ route('professor.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>
            </div>
        </section>

        <main>

            <div class="dadosAluno">
                <div class="container">
                    <div class="imgAluno">
                            <picture>
                                <img src="#" alt="">
                            </picture>
                    </div>
                    <div class="info">
                        <h3>Professor:</h3>
                        <p>Nome completo do Professor</p>
                    </div>
                </div>
            </div>

            <div class="aulasProf">
                <div class="aulas">
                  

                    <div class="aula">
                        <h4>Proxima Aula</h4>
                        <p class="numSala">Sala 3</p>
                        <p>Nome da etec</p>
                    </div>

                    <div class="aula">
                        <h4>Proxima Aula</h4>
                        <p class="numSala">Sala 5</p>
                        <p>Nome da etec</p>
                    </div>

                </div>
            </div>

            <div class="calendarioAluno">
                <div class="header">
                    <h2>Setembro 2024</h2>
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
                                <td>12/09</td>
                                <td>Aula tal</td>
                                <td>Aluno tal</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

        </main>

    </div>
</body>

</html>