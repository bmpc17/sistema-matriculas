@extends('layouts.app')

@section('titulo', 'Registrar estudiante')

@section('contenido')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-person-plus-fill me-2 text-primary"></i>Registrar estudiante
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('estudiantes.store') }}" novalidate>
                @csrf
                @include('estudiantes._form')

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i> Guardar
                    </button>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection