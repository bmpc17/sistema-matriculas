@extends('layouts.app')

@section('titulo', 'Estudiantes')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Estudiantes</h1>
            <p class="text-muted mb-0">{{ $estudiantes->total() }} estudiantes encontrados</p>
        </div>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-1"></i> Registrar estudiante
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('estudiantes.index') }}" class="row g-2" role="search">
                <div class="col-md-10">
                    <input type="search" name="buscar" value="{{ $buscar }}" class="form-control"
                           placeholder="Buscar por DNI o apellidos...">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="bi bi-search me-1"></i> Buscar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>DNI</th>
                        <th>Apellidos y nombres</th>
                        <th>Edad</th>
                        <th>Celular apoderado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($estudiantes as $estudiante)
                        <tr>
                            <td class="fw-semibold">{{ $estudiante->dni }}</td>
                            <td>{{ $estudiante->apellidos }}, {{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->fecha_nacimiento->age }} años</td>
                            <td>{{ $estudiante->telefono_apoderado ?? '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-eye me-1"></i> Ver
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                No se encontraron estudiantes.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($estudiantes->hasPages())
            <div class="card-footer bg-white">
                {{ $estudiantes->links('pagination::simple-bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection