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

    $estudiantes = Estudiante::query()
        ->when($buscar, function ($consulta, $buscar) {
            $consulta->where('dni', 'like', "$buscar%")
                     ->orWhere('apellidos', 'ilike', "%$buscar%");
        })
        ->orderBy('apellidos')
        ->orderBy('nombres')
        ->paginate(10)
        ->withQueryString();

    return view('estudiantes.index', compact('estudiantes', 'buscar'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
