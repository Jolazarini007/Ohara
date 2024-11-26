<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Eba, essa é a Home da Gestão</h1>
    <form method="POST" action="{{ route('gestao.logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Logout</button>
    </form>
</body>
</html>