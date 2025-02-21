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
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->foreign(['participante_id'], 'inscripciones_ibfk_1')->references(['id'])->on('participantes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['curso_id'], 'inscripciones_ibfk_2')->references(['id'])->on('cursos')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropForeign('inscripciones_ibfk_1');
            $table->dropForeign('inscripciones_ibfk_2');
        });
    }
};
