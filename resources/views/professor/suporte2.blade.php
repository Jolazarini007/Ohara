<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/alunos/suporte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuLateral.css') }}">
    <title>Ohara</title>
</head>
<body>
    <div class="container">
    @include('professor.layouts.sidebar')

        <main>
            
            <h1>Suporte</h1>

            <form action="post" id="formDuv">

                <div id="dvNm">
                    <label for="nmSupo">Nome:</label> <br>
                    <input type="text" name="nmSupo" id="nmSupo" maxlength="20" minlength="5" required placeholder="digite seu primeiro nome">
                </div>


                <div id="dvSlc">
                    <label for="slcSupo">Qual seu Curso?</label><br>
                    <select name="slcSupo" id="slcSupo">
                        <option value="cur1">DS</option>
                        <option value="cur2">ADM</option>
                        <option value="cur3">Logística</option>
                    </select>
                </div>
            

                <div id="dvRm">
                    <label for="rmSupo">RM:</label><br>
                    <input type="number" name="rmSupo" id="rmSupo">
                </div>


                <div id="dvDuv">
                    <label for="duvSupo">Qual a sua Dúvida?</label><br>
                    <textarea name="duvSupo" id="duvSupo" cols="30" rows="7"></textarea>
                </div>
            </form>
            <div class='botoes'>
                <a type="button" class="botao" id="btVolta" href="{{ route('professor.suporte') }}">Voltar</a>
                <a type="button" class="botao" id="btEnv" form="formDuv">Enviar</a>
            </div>
        </main>
    </div>
</body>
</html>