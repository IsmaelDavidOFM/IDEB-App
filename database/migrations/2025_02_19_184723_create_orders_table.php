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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario
            $table->decimal('total_amount', 8, 2); // Monto total de la orden
            $table->string('status')->default('pendiente'); // Estado de la orden
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
