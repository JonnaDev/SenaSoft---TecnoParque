<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semillero_id')->nullable()->constrained('semilleros')->nullOnDelete();
            $table->foreignId('responsable_id')->nullable()->constrained('users')->nullOnDelete();           
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->enum('fase_actual', ['propuesta', 'analisis', 'diseño', 'desarrollo', 'prueba', 'implantacion'])->default('propuesta');
            $table->date('fecha_inicio')->default(now());
            $table->date('fecha_fin')->nullable(); // se completa en implantación
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};