<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_comercial', 150);
            $table->string('ruc', 11)->nullable();
            $table->string('contacto')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('especialidad')->nullable();
            $table->decimal('calificacion_promedio', 4, 2)->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('proveedores');
    }
};
