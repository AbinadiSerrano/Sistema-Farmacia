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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->date('fecha_vencimiento');
            $table->string('indicaciones',500)->nullable();
            $table->integer('estado')->default(1);
            $table->foreignId('laboratorio_id')->constrained('laboratorios')->cascadeOnUpdate();
            $table->foreignId('presentacion_id')->constrained('presentaciones')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
