<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('s_reunion', function (Blueprint $table) {
            $table->text('calendario')->nullable()->after('motivo');
        });
    }

    public function down(): void
    {
        Schema::table('s_reunion', function (Blueprint $table) {
            $table->dropColumn('calendario');
        });
    }
};
