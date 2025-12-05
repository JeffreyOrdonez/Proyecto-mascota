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


    protected $table = 'usuarios';

    /**
     * Truco para que Breeze funcione con 'nombre' en lugar de 'name'.
     * Cuando alguien pida $user->name, devolverá $user->nombre.
     */
    public function getNameAttribute()
    {
        return $this->nombre;
    }

    // SOLO AGREGA ESTO SI TU COLUMNA EN BD NO SE LLAMA 'email'
    public function username()
    {
        return 'correo'; // o como se llame tu columna de login
    }

    protected $fillable = [
        'role_id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'password',
        'estado',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function refugios()
    {
        return $this->hasMany(Refugio::class);
    }


    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
