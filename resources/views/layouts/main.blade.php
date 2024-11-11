<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Importa o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgb(169, 250, 191); display: flex; flex-direction: column; min-height: 100vh; margin: 0;">
    <style>
        a {
            color: darkgreen;
            text-decoration: none;
        }
        a:hover {
            color: darkgreen;
            text-decoration: none;
        }
        main {
            flex: 1;
        }
        footer {
            background-color: white;
            color: green;
        }
    </style>

    <!-- Barra de Navegação -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="color: green;">@yield('pagina')</span>
            <div class="d-flex">
                <!-- Links de Navegação à Esquerda -->
                <div class="me-auto">
                    @yield('nav1')
                </div>
                <!-- Links de Navegação à Direita -->
                <div>
                    @yield('nav2')
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da Página com Espaçamento -->
    <main class="container mt-5">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="bg-white text-green text-center py-3">
        <p>&copy; {{ date('Y') }} - Todos os direitos reservados</p>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
