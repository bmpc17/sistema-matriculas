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
        Schema::create('seguimientos_academicos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('matricula_id')->unique()->constrained()->restrictOnDelete(); // RN05
    $table->decimal('nota_final', 4, 2);
    $table->unsignedInteger('total_asistencias')->default(0);
    $table->unsignedInteger('total_faltas')->default(0);
    $table->text('observaciones')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos_academicos');
    }
};
