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
        Schema::create('grados_secciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('docente_id')->constrained('docentes')->restrictOnDelete();
    $table->string('codigo_aula', 20)->unique(); // RN01
    $table->string('grado', 30); // Ej: 1ro Primaria
    $table->string('seccion', 10); // Ej: A, B
    $table->enum('turno', ['Mañana', 'Tarde']); // RF08
    $table->unsignedInteger('vacantes_disponibles')->default(30); // RN04
    $table->boolean('activo')->default(true); // RF09
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grados_secciones');
    }
};
