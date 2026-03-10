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
        Schema::create('astros_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('astros_id')->constrained()->onDelete('cascade');
            $table->foreignId('usuarios_id')->constrained()->onDelete('cascade');
            $table->timestamp('fechaInicio')->useCurrent();
            $table->timestamp('fechaFin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astros_usuarios');
    }
};
