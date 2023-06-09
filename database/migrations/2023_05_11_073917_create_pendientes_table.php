<?php

use Carbon\Carbon;
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
        Schema::create('pendientes', function (Blueprint $table) {
            $table->id();
            $table->integer('turno');
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'user_id'
            );
            $table->string('pendiente');
            $table->string('prioridad');
            $table->foreignId('departamento_id')->constrained(
                table: 'departamentos', indexName: 'departamento_id'
            );
            $table->string('status')->default('PENDIENTE');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendientes');
    }
};
