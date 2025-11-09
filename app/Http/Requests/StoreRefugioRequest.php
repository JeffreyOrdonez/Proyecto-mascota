<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRefugioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id'           => ['required', 'integer', 'exists:usuarios,id'],
            'nombre_refugio'    => ['required', 'string', 'max:150'],
            'descripcion'       => ['nullable', 'string'],
            'direccion'         => ['required', 'string'], // Usé 'required' de tu 2do controlador
            'telefono_contacto' => ['nullable', 'string', 'max:30'], // Usé 'max:30'
            'correo_contacto'   => ['nullable', 'email', 'max:150'], // Usé 'email'
            'estado'            => ['required', 'in:activo,inactivo'], // Usé 'required'
        ];
    }
}
