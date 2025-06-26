<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('s_reunion', function (Blueprint $table) {
            $table->dateTime('fecha_hora_inicio')->nullable()->after('prioridad');
            $table->integer('duracion_minutos')->default(30)->after('fecha_hora_inicio');
        });
    }

    public function down(): void
    {
        Schema::table('s_reunion', function (Blueprint $table) {
            $table->dropColumn(['fecha_hora_inicio', 'duracion_minutos']);
        });
    }
};
