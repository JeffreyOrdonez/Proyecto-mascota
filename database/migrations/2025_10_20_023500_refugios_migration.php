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
    Schema::create('refugios', function (Blueprint $table) {
            
          
            $table->id();
            $table->foreignId('user_id')
                  ->unique() 
                  ->constrained('users')
                  ->onDelete('cascade'); 
            $table->string('nombre_refugio', 150);
            $table->text('descripcion')->nullable();
            $table->text('direccion')->nullable();
            $table->string('telefono_contacto', 20)->nullable();
            $table->string('correo_contacto', 255)->nullable();
            $table->string('estado', 25)->default('pendiente_aprobacion');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::dropIfExists('refugios');
    }
};
