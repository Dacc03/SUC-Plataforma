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
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('dni', 20)->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono', 20)->nullable();
            $table->text('direccion')->nullable();
            $table->string('genero', 20)->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
