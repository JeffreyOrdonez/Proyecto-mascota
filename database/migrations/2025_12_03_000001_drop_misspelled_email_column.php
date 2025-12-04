<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('usuarios', 'email_verifired_at')) {
            Schema::table('usuarios', function (Blueprint $table) {
                $table->dropColumn('email_verifired_at');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('usuarios', 'email_verifired_at')) {
            Schema::table('usuarios', function (Blueprint $table) {
                $table->timestamp('email_verifired_at')->nullable()->after('password');
            });
        }
    }
};
