<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio_base', 10, 2);
            $table->integer('duracion_estimada_min');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('servicios');
    }
};
