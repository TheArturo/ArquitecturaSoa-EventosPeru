<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos');
            $table->foreignId('proveedor_id')->constrained('proveedores');
            $table->tinyInteger('puntaje');
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('calificaciones');
    }
};
