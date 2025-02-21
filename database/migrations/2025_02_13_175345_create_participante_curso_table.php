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
        Schema::create('participante_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('participante_id');
            $table->unsignedBigInteger('curso_id');
            $table->date('FechadelCurso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participante_curso');
    }
};
