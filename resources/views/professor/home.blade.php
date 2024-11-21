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
                        <p>Victor Hugo Aguilar</p>
                    </div>
                </div>
            </div>

            <div class="aulasProf">
                <div class="aulas">
                  

                    <div class="aula">
                        <h4>Proxima Aula</h4>
                        <p class="numSala">Sala 3</p>
                        <p>Etec Juscelino Kubitschek</p>
                    </div>

                    <div class="aula">
                        <h4>Proxima Aula</h4>
                        <p class="numSala">Sala 5</p>
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