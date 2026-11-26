<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use Illuminate\Http\Request;



class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $buscar = trim($request->input('buscar', ''));

    $estudiante = Estudiante::create($request->validated());

return redirect()->route('estudiantes.show', $estudiante)
    ->with('ok', 'Estudiante registrado correctamente.');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('estudiantes.create', ['estudiante' => new Estudiante()]);
}

public function store(StoreEstudianteRequest $request)
{
    Estudiante::create($request->validated());

    return redirect()->route('estudiantes.index')
        ->with('ok', 'Estudiante registrado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
{
    $matriculas = $estudiante->matriculas()
        ->with(['gradoSeccion', 'docente'])
        ->latest('fecha_hora')
        ->take(5)
        ->get();

    return view('estudiantes.show', compact('estudiante', 'matriculas'));
}

public function edit(Estudiante $estudiante)
{
    return view('estudiantes.edit', compact('estudiante'));
}

public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
{
    $estudiante->update($request->validated());

    return redirect()->route('estudiantes.show', $estudiante)
        ->with('ok', 'Datos del estudiante actualizados.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
{
    if ($estudiante->matriculas()->exists()) {
        return back()->with('error',
            'No se puede eliminar: el estudiante tiene matrículas registradas.');
    }

    $estudiante->delete();

    return redirect()->route('estudiantes.index')
        ->with('ok', 'Estudiante eliminado correctamente.');
}
}
