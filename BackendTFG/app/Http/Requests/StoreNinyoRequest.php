<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Rol;

class StoreNinyoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return in_array($user->rol, [Rol::Admin, Rol::Junta]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'curso' => 'required|string|max:100',
            'numero_contacto' => 'nullable|string|max:20',
            'nombre_padres' => 'nullable|string|max:255',
            'enfermedades_alergias' => 'nullable|string',
            'correo_id' => 'required|email|exists:users,email',
            'desactivado' => 'nullable|boolean',
        ];
    }
}
