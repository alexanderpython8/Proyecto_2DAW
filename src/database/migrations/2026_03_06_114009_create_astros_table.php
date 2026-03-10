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
        Schema::create('astros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique();
            $table->tinyInteger('tipo');
            $table->tinyInteger('estado')->default(0);
            $table->string('historia', 200);
            $table->string('caracteristicas', 200);
            $table->Integer('explotacion')->default(100);
            $table->Integer('precio');
            $table->string('img', 255)->default("default.png");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astros');
    }
};
