<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detalle_disponibilidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora');
            $table->boolean('disponible')->default(true);
            $table->timestamps();

            $table->unique(['user_id', 'fecha', 'hora']); // Previene duplicados
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_disponibilidad');
    }
};
