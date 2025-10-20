<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'refugio_id',
        'nombre',
        'especie',
        'raza',
        'edad',
        'sexo',
        'descripcion',
        'url_imagen',
        'estado', 
    ];

  
    public function refugio()
    {

        return $this->belongsTo(Refugio::class);
    }


    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
