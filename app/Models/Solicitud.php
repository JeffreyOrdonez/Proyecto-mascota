<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

  
    protected $fillable = [
        'user_id',
        'mascota_id',
        'estado', 
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}