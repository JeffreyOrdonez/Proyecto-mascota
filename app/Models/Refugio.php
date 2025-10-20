<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refugio extends Model
{
    use HasFactory;

  
    protected $table = 'refugios';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nombre_refugio',
        'descripcion',
        'direccion',
        'telefono_contacto',
        'correo_contacto',
        'estado', 
    ];


  
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }

    public function solicitudes()
    {
 
        return $this->hasManyThrough(Solicitud::class, Mascota::class);
    }
}
