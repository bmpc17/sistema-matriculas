<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use App\Models\GradoSeccion;
use App\Models\Matricula;
use App\Models\SeguimientoAcademico;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    public function run(): void
    {
        $estudiantes = Estudiante::pluck('id');
        $turnos = ['08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30'];
        $matriculados = []; // Evita matricular dos veces al mismo estudiante (RN02)

        foreach (GradoSeccion::where('activo', true)->get() as $seccion) {
            foreach (range(-3, 3) as $dia) {
                $fecha = today()->addDays($dia);
                if ($fecha->isWeekend()) {
                    continue;
                }
                foreach ($turnos as $hora) {
                    if (fake()->boolean(55)) {
                        continue; // Deja horarios libres
                    }
                    $inicio = $fecha->copy()->setTimeFromTimeString($hora);

                    // Buscar estudiantes disponibles que aún no estén matriculados (RN02)
                    $disponibles = $estudiantes->diff($matriculados);
                    if ($disponibles->isEmpty()) {
                        break 3; // Si ya se matricularon los 50 estudiantes, termina el seeder
                    }
                    $estudianteId = $disponibles->random();
                    $matriculados[] = $estudianteId;

                    $estado = $inicio->isPast()
                        ? (fake()->boolean(85) ? 'culminada' : 'cancelada')
                        : fake()->randomElement(['pendiente', 'confirmada']);

                    $matricula = Matricula::create([
                        'estudiante_id'    => $estudianteId,
                        'grado_seccion_id' => $seccion->id,
                        'docente_id'       => $seccion->docente_id,
                        'fecha_hora'       => $inicio,
                        'fecha_hora_fin'   => $inicio->copy()->addMinutes(30),
                        'estado'           => $estado,
                    ]);

                    if ($estado === 'culminada') {
                        SeguimientoAcademico::factory()->create(['matricula_id' => $matricula->id]);
                    }
                }
            }
        }
    }
}