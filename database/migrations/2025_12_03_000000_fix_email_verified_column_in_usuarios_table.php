<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Añade la columna correcta si no existe
        if (! Schema::hasColumn('usuarios', 'email_verified_at')) {
            Schema::table('usuarios', function (Blueprint $table) {
                $table->timestamp('email_verified_at')->nullable()->after('password');
            });
        }

        // Si existe la columna con el nombre mal escrito, copia sus valores
        if (Schema::hasColumn('usuarios', 'email_verifired_at')) {
            DB::table('usuarios')
                ->whereNotNull('email_verifired_at')
                ->update(['email_verified_at' => DB::raw('email_verifired_at')]);
        }
    }

    public function down(): void
    {
        // En el down eliminamos la columna recién creada si existe
        if (Schema::hasColumn('usuarios', 'email_verified_at')) {
            Schema::table('usuarios', function (Blueprint $table) {
                $table->dropColumn('email_verified_at');
            });
        }
    }
};
