<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/loginAluno.css') }}">
    <title>Login Ohara</title>
</head>
<body>
    <main>
        <div class="container">
            <!-- Título -->
            <div>
                <h1>Login Aluno</h1>
            </div>

            <!-- Formulário de Login -->
            <div class="info">

                @if ($errors->has('login'))
                <div class="error">
                    <p>{{ $errors->first('login') }}</p>
                </div>
                @endif

                <form method="POST" action="{{ route('aluno.login') }}">
                    @csrf

                    <!-- RM -->
                    <div>
                        <p>RM</p>
                        <input type="number" name="rm" id='rm' value="{{ old('rm') }}" required autofocus>
                        @error('rm')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Código Etec -->
                    <div>
                        <p>Código Etec</p>
                        <input type="text" name="codigo_etec" id='codigo_etec' value="{{ old('codigo_etec') }}" required>
                        @error('codigo_etec')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div>
                        <p>Senha</p>
                        <input type="password" name="password" id='password' required>
                        @error('senha')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botão de Login -->
                    <div>
                        <button type="submit">Entrar</button>
                    </div>
                </form>
            </div>

            <!-- Links de Ação -->
            <div class="etc">
                <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                <a href="{{ route('register') }}">Fazer cadastro</a>
            </div>
        </div>
    </main>
</body>
</html>
