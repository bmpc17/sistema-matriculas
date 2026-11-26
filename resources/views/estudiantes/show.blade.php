@extends('layouts.app')

@section('titulo', 'Ficha del Estudiante')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">{{ $estudiante->apellidos }}, {{ $estudiante->nombres }}</h1>
            <p class="text-muted mb-0">
                <span class="badge bg-primary">DNI: {{ $estudiante->dni }}</span>
                <span class="ms-2">{{ $estudiante->fecha_nacimiento->age }} años</span>
            </p>
        </div>
        <div class="d-flex gap-2">
    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">
        <i class="bi bi-pencil-square me-1"></i> Editar
    </a>

    <form method="POST" action="{{ route('estudiantes.destroy', $estudiante) }}"
          onsubmit="return confirm('¿Está seguro de eliminar a este estudiante?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="bi bi-trash me-1"></i> Eliminar
        </button>
    </form>

    <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Volver al listado
    </a>
</div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-person-vcard me-2 text-primary"></i>Datos Personales
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-muted d-block">Fecha de nacimiento</small>
                    <strong>{{ $estudiante->fecha_nacimiento->format('d/m/Y') }}</strong>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Sexo</small>
                    <strong>{{ $estudiante->sexo === 'F' ? 'Femenino' : 'Masculino' }}</strong>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Celular del apoderado</small>
                    <strong>{{ $estudiante->telefono_apoderado ?? '—' }}</strong>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Dirección</small>
                    <strong>{{ $estudiante->direccion ?? '—' }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-journal-bookmark me-2 text-success"></i>Últimas Matrículas
        </div>
        <div class="card-body">
            @forelse ($matriculas as $matricula)
                <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                    <div>
                        <strong>{{ $matricula->gradoSeccion->grado }} "{{ $matricula->gradoSeccion->seccion }}"</strong>
                        <span class="text-muted ms-2">({{ $matricula->gradoSeccion->turno }})</span>
                        <div class="small text-muted">
                            Tutor: {{ $matricula->docente->apellidos }}, {{ $matricula->docente->nombres }} · 
                            Fecha: {{ $matricula->fecha_hora->format('d/m/Y H:i') }}
                        </div>
                    </div>
                    <span class="badge bg-secondary text-uppercase">{{ $matricula->estado }}</span>
                </div>
            @empty
                <p class="text-muted mb-0">Este estudiante no tiene matrículas registradas.</p>
            @endforelse
        </div>
    </div>
@endsection