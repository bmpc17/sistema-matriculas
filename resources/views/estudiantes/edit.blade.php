@extends('layouts.app')

@section('titulo', 'Editar Estudiante')

@section('contenido')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-pencil-square me-2 text-warning"></i>Editar Estudiante
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('estudiantes.update', $estudiante) }}" novalidate>
                @csrf
                @method('PUT')
                
                @include('estudiantes._form')

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i> Guardar cambios
                    </button>
                    <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-outline-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection