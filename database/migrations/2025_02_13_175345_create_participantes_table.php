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
        Schema::create('participantes', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('N')->nullable();
            $table->string('NombredelPostulante');
            $table->string('Correo');
            $table->string('Telefono');
            $table->string('Edad');
            $table->string('Direccion');
            $table->string('Escolaridad');
            $table->string('Curp');
            $table->string('RazonSocial', 200);
            $table->string('Empresa');
            $table->string('RFCEmpresa', 100);
            $table->string('Puesto');
            $table->string('Pago')->nullable();
            $table->string('EstadoDePago')->default('Pendiente');
            $table->string('FechadelCurso');
            $table->boolean('estatus')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};
