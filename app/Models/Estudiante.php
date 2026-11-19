<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni', 'nombres', 'apellidos', 'fecha_nacimiento',
        'sexo', 'telefono_apoderado', 'direccion',
    ];

    protected function casts(): array
    {
        return ['fecha_nacimiento' => 'date'];
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }

    // Historial académico (RF14): notas y asistencias a través de sus matrículas
    public function seguimientosAcademicos(): HasManyThrough
    {
        return $this->hasManyThrough(SeguimientoAcademico::class, Matricula::class);
    }
}