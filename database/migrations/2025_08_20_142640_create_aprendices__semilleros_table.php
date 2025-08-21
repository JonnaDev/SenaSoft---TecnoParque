<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aprendices_semilleros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('semillero_id')->constrained('semilleros')->onDelete('cascade');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->date('fecha_ingreso')->default(now());
            $table->date('fecha_salida')->nullable(); //Cuando se elimina desde el CRUD Directora o DirectorGrupo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aprendices_semilleros');
    }
};