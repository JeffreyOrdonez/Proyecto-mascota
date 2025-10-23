<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table){
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('telefono', 20);
            $table->string('email', 150)->unique();
            $table->string('password');
            $table->timestamp('email_verifired_at')->nullable();
            $table->string('estado', 20)->default('activo');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
