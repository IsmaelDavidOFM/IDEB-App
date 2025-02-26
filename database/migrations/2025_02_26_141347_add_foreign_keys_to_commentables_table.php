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
        Schema::table('commentables', function (Blueprint $table) {
            $table->foreign(['comment_id'], 'commentables_ibfk_1')->references(['id'])->on('comments')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentables', function (Blueprint $table) {
            $table->dropForeign('commentables_ibfk_1');
        });
    }
};
