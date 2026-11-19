<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeguimientoAcademico extends Model
{
    use HasFactory;

    protected $table = 'seguimientos_academicos';

    protected $fillable = [
        'matricula_id', 'nota_final', 'total_asistencias',
        'total_faltas', 'observaciones',
    ];

    public function matricula(): BelongsTo
    {
        return $this->belongsTo(Matricula::class);
    }
}