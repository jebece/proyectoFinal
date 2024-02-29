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
        Schema::create('receta_models', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable()->default(null);
            $table->string('titulo');
            $table->string('ingredientes', 500);
            $table->string('pasos', 3000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_models');
    }
};
