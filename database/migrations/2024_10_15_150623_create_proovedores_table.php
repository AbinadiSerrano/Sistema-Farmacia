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
        Schema::create('proovedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('pais',100)->nullable();
            $table->string('ciudad',100)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('correo',100)->nullable();
            $table->string('telefono',10);
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proovedores');
    }
};
