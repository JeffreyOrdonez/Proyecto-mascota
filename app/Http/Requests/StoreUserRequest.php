<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir que cualquiera intente registrarse
    }

    /**
     * Obtiene las reglas de validación que aplican a la petición.
     */
    public function rules(): array
    {
        return [
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20', // 'nullable' significa que es opcional
            'email'    => 'required|string|email|max:255|unique:usuarios', // 'unique' evita emails repetidos
            'password' => ['required', 'confirmed', Password::min(8)], // 'confirmed' busca 'password_confirmation'
            
            // 👇 ¡IMPORTANTE! Asumí que 'role_id' y 'estado' son requeridos.
            
            // 'exists:roles,id' comprueba que el rol exista en una tabla 'roles'
            'role_id'  => 'required|integer|exists:roles,id', 
            
            // 'in:...' asegura que el estado solo sea uno de esos dos valores
            'estado'   => 'required|string|in:activo,inactivo', 
        ];
    }
}