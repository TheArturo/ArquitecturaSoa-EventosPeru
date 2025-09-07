<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('servicio_id')->constrained('servicios');
            $table->string('titulo', 120);
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_evento');
            $table->string('ubicacion')->nullable();
            $table->enum('estado', ['borrador','pendiente','confirmado','en_ejecucion','cerrado','cancelado'])->default('borrador');
            $table->decimal('costo_estimado', 10, 2)->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('eventos');
    }
};
