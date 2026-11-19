@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <div class="p-4 mb-4 bg-white rounded-3 shadow-sm border-start border-primary border-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">Sistema Web de Gestión de Matrículas y Seguimiento Académico</h1>
                <p class="text-muted mb-0">Panel administrativo escolar · Nivel Primaria</p>
            </div>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                <i class="bi bi-database-check me-1"></i> BD: {{ DB::connection()->getDatabaseName() }} · Laravel {{ app()->version() }}
            </span>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Estudiantes</div>
                        <div class="h4 fw-bold mb-0">{{ \App\Models\Estudiante::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                        <i class="bi bi-journal-check fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Matrículas</div>
                        <div class="h4 fw-bold mb-0">{{ \App\Models\Matricula::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 me-3">
                        <i class="bi bi-door-open-fill fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Grados y Secciones</div>
                        <div class="h4 fw-bold mb-0">{{ \App\Models\GradoSeccion::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-info bg-opacity-10 text-info rounded-3 p-3 me-3">
                        <i class="bi bi-person-badge-fill fs-3"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Docentes</div>
                        <div class="h4 fw-bold mb-0">{{ \App\Models\Docente::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection