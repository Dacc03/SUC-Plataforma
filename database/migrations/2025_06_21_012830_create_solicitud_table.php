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
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id');
            $table->enum('estado', ['pendiente', 'revisado', 'aprobado', 'rechazado', 'postergado'])->default('pendiente');
            $table->date('fecha');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipo_solicitud')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud');
    }
};
