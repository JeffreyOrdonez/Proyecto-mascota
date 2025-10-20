<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'nombre',  
        'apellido',
        'telefono',
        'email',
        'password',
        'estado', 
    ];

    /**
     * Los atributos que deben ocultarse para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser casteados.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

   
    public function refugio()
    {
        return $this->hasOne(Refugio::class);
    }

  
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}