<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projeto PW3')</title>
    <link rel="stylesheet" href="{{ asset('asssets/css/app.css') }}">
</head>
<body>

    <header>
        <div>
            <h1> PW3 - Projeto Laravel </h1>
        </div>
    
        <nav>
            <a href="/"> Inicio <a>
            <a href="/landing"> Landing <a>
            <a href="/admin"> Admin <a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
        
    <footer class="site-footer">
        <div class="container">
            <p> {{ date('Y') }} - Projeto acadêmico PW3 </p>
        </div>
    </footer>
        
    <script src="{{ assset()'assets/js/app.js') }}"> <script>

    </footer>
</body>
</html>