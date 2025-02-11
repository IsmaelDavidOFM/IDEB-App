<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('course_info', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Ejemplo: 'Flayers y anuncios', 'Promociones'
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable(); // Ruta de la imagen
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('course_info');
    }
};
