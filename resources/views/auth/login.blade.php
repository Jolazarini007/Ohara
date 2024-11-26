<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/escolhaLogin.css') }}">
    <title>Escolha seu acesso</title>
</head>
<body>
<header>
    <H1>Escolha seu meio de acesso</H1>
</header>
<div class="container">

    <div >
        <form action="{{ route('aluno.login') }}" method="GET">
            <button type='submit' class="aluno"></button>
        </form>
        <h2>Aluno</h2>
    </div>
    <div >
        <form action="{{ route('professor.login') }}" method="GET">
            <button type='submit' class="professor"></button>
        </form>
        <h2>Professor</h2>
    </div>
    <div >
        <form action="{{ route('gestao.login') }}" method="GET">
            <button type='submit' class="gestao"></button>
        </form>
        <h2>Gestão</h2>
    </div>
</div>
</body>
</html>