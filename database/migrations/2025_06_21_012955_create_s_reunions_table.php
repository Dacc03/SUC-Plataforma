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
        Schema::create('s_reunion', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary(); // mismo ID que solicitud
            $table->unsignedBigInteger('destinatario_id');
            $table->text('motivo');
            $table->enum('prioridad', ['Alta', 'Media', 'Baja'])->default('Media');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('solicitud')->onDelete('cascade');
            $table->foreign('destinatario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_reunion');
    }
};
