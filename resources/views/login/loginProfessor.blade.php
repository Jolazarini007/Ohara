<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/loginProfessor.css') }}">
    <title>Login Ohara</title>
</head>
<body>
    <main>
        <div class="container">
            <!-- Título -->
            <div>
                <h1>Login Professor</h1>
            </div>

            <!-- Formulário de Login -->
            <div class="info">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- RM -->
                    <div>
                        <p>RM</p>
                        <input type="text" name="rm" value="{{ old('rm') }}" required autofocus>
                        @error('rm')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Código Etec -->
                    <div>
                        <p>Código Etec</p>
                        <input type="text" name="codigo_etec" value="{{ old('codigo_etec') }}" required>
                        @error('codigo_etec')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <p>Email</p>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div>
                        <p>Senha</p>
                        <input type="password" name="password" required>
                        @error('password')
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
