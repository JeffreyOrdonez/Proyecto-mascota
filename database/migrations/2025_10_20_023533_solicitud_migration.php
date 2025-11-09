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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('usuarios')
                ->onDelete('cascade'); 
            $table->foreignId('mascota_id')
                ->constrained('mascotas')
                ->onDelete('cascade'); 
            $table->string('estado', 20)->default('pendiente');
            $table->timestamps();
            $table->unique(['user_id', 'mascota_id']);
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
