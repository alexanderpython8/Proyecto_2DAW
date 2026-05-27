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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compras_id')->nullable();
            $table->foreign('compras_id')->references('id')->on('compras')->onDelete('cascade');
            $table->unsignedBigInteger('astros_usuarios_id')->nullable();
            $table->foreign('astros_usuarios_id')->references('id')->on('astros_usuarios')->onDelete('cascade');
            $table->enum('tipo', ['compra', 'alquiler']);
            $table->decimal('monto', 15, 2);
            $table->integer('dias_alquiler')->nullable();
            $table->timestamp('fechaPago')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};