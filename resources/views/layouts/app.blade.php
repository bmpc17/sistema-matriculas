<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Inicio') · {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f4f6f9; display: flex; flex-direction: column; min-height: 100vh; }
        .navbar-colegio { background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%); }
        main { flex: 1; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-colegio shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('inicio') }}">
                <i class="bi bi-mortarboard-fill me-2"></i>{{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto gap-1">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('inicio') }}"><i class="bi bi-house-door me-1"></i>Inicio</a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}" href="{{ route('estudiantes.index') }}">
        <i class="bi bi-people me-1"></i>Estudiantes
    </a>
</li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-door-open me-1"></i>Grados y Secciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-journal-check me-1"></i>Matrículas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-clipboard-data me-1"></i>Notas y Asistencias</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
    @if (session('ok'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('ok') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('contenido')
</main>

    <footer class="bg-white border-top py-3 mt-auto text-center text-muted">
        <small>DSI406 · Tecnología Backend · IES Túpac Amaru &mdash; Desarrollado por Bruno Manuel Pauccar Condori</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>