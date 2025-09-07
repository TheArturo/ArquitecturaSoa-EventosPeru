<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos');
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->dateTime('fecha_reserva');
            $table->enum('estado', ['asignado','confirmado','rechazado','cancelado'])->default('asignado');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('reservas');
    }
};
