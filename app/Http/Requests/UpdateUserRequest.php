<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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

        $userId = $this->route('user');

        return [
            'nombre' => 'sometimes|string|max:255',
            'apellido' => 'sometimes|string|max:255',
            'telefono' => 'sometimes|nullable|string|max:20',

            'email' => 'sometimes|email|max:255|unique:usuarios,email,' . $userId,

            'password' => ['sometimes', 'confirmed', Password::min(8)],
            'role_id' => 'sometimes|integer|exists:roles,id',
            'estado' => 'sometimes|string|in:activo,inactivo',
        ];
    }
}
