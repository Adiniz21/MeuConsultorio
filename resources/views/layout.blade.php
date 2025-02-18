<!DOCTYPE html>
<html>

<head>
    <title>Meu Consultório</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">

            <!-- Botão que abre a Offcanvas (apenas no mobile) -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNav" aria-controls="offcanvasNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo / Marca -->
            <a class="navbar-brand ms-2" href="/">Meu Consultório</a>

            <!-- Menu visível apenas em telas grandes (desktop) -->
            <ul class="navbar-nav ms-auto d-none d-lg-flex flex-row">
                <li class="nav-item me-3">
                    <a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="{{ route('medicos.index') }}">Médicos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('atendimentos.index') }}">Atendimentos</a>
                </li>
            </ul>


        </div>
    </nav>

    <!-- Offcanvas Lateral (só aparece no mobile, pois é aberto pelo botão acima) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavLabel">Meu Consultório</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <!-- Conteúdo do menu lateral -->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('pacientes.index') }}">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('medicos.index') }}">Médicos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('atendimentos.index') }}">Atendimentos</a></li>
            </ul>
        </div>
    </div>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
