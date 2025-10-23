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
        Schema::create('mascotas', function (Blueprint $table) {
            
          
            $table->id();
            $table->foreignId('refugio_id')
                  ->constrained('refugios')
                  ->onDelete('cascade'); 
            $table->string('nombre', 100);
            $table->string('especie', 50);
            $table->string('raza', 100)->nullable();
            $table->unsignedSmallInteger('edad')->nullable();
            $table->string('sexo', 10); 
            $table->text('descripcion')->nullable();
            $table->string('url_imagen', 255)->nullable();
            $table->string('estado', 20)->default('disponible');
            $table->timestamps(); 
        });
    }

   
    public function down(): void
    {
    Schema::dropIfExists('mascotas');
    }
};
