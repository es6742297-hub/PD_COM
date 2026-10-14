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
        Schema::create('nomina_semanals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('podologo_id')->constrained('podologos')->restrictOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedInteger('total_servicios')->default(0);
            $table->decimal('total_ventas', 10, 2)->default(0);
            $table->decimal('total_comisiones', 10, 2)->default(0);
            $table->decimal('bonos', 10, 2)->default(0);
            $table->decimal('descuentos', 10, 2)->default(0);
            $table->decimal('total_pagar', 10, 2)->default(0);
            $table->string('estado', 30)->default('pendiente');
            $table->dateTime('pagado_en')->nullable();
            $table->timestamps();

            $table->unique(['podologo_id', 'fecha_inicio']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomina_semanals');
    }
};
