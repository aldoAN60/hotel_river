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
        Schema::create('seguimiento_facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('habitacion');
            $table->string('nombre');
            $table->bigInteger('telefono');
            $table->string('RFC')->default('XAXX010101123');
            $table->string('razon_social')->default('PUBLICO EN GENERAL');
            $table->integer('numero_noches')->default(1);
            $table->foreignId('id_tipo_reservacion')->constrained(
                table: 'tipo_reservacion', indexName: 'id_tipo_reservacion'
            );
            $table->foreignId('id_metodo_pago')->constrained(
                table: 'metodo_pago', indexName: 'id_metodo_pago'
            );
            $table->char('ult_4_digitos',4)->default('NA');
            $table->float('tarifa',8,2);
            $table->float('tarifa_sin_imp',8,2)->nullable();
            $table->string('status')->default('PENDIENTE');
            $table->foreignId('id_usuario_captura')->constrained(
                table: 'users', indexName: 'id_usuario_captura'
            );
            $table->foreignId('id_usuario_timbra')->constrained(
                table: 'users', indexName: 'id_usuario_timbra'
            );
            $table->char('folio_factura',10)->default('NA');
            $table->string('correo')->default('SIN CORREO');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_facturas');
    }
};
