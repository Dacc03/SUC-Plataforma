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
        Schema::create('s_postulacion', function (Blueprint $table) {
        $table->unsignedBigInteger('id')->primary();
        $table->text('motivacion')->nullable();
        $table->text('usu_interes')->nullable();
        $table->text('compromiso')->nullable();
        $table->string('archivo_cv')->nullable();
        $table->timestamps();

        $table->foreign('id')
            ->references('id')
            ->on('solicitud')
            ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_postulacion');
    }
};
