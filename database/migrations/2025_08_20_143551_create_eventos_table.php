<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_evento');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->enum('visibilidad', ['general', 'semillero'])->default('general');
            $table->foreignId('semillero_id')->nullable()->constrained('semilleros')->onDelete('cascade'); // si visibilidad es semillero
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
