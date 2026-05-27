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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('astros_id');
            $table->unsignedBigInteger('usuarios_id');
            $table->foreign('astros_id')->references('id')->on('astros')->onDelete('cascade');
            $table->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamp('fechaCompra')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
