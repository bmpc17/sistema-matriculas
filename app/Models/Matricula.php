<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id', 'grado_seccion_id', 'docente_id',
        'fecha_hora', 'fecha_hora_fin', 'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_hora'     => 'datetime',
            'fecha_hora_fin' => 'datetime',
        ];
    }

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function gradoSeccion(): BelongsTo
    {
        return $this->belongsTo(GradoSeccion::class);
    }

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }

    public function seguimientoAcademico(): HasOne
    {
        return $this->hasOne(SeguimientoAcademico::class);
    }
}