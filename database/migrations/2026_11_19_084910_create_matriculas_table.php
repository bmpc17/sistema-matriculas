<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('estudiante_id')->constrained()->restrictOnDelete(); // RF07
    $table->foreignId('grado_seccion_id')->constrained('grados_secciones')->restrictOnDelete();
    $table->foreignId('docente_id')->constrained('docentes')->restrictOnDelete();
    $table->dateTime('fecha_hora'); // inicio cita matrícula
    $table->dateTime('fecha_hora_fin'); // inicio + 30 min (RN02)
    $table->enum('estado', ['pendiente', 'confirmada', 'culminada', 'cancelada'])
          ->default('pendiente'); // RF11
    $table->timestamps();

    $table->index(['grado_seccion_id', 'fecha_hora']); // Para validar RN02
    $table->index(['docente_id', 'fecha_hora']); // Para agenda RF12
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
