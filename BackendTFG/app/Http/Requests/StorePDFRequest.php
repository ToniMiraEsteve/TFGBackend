<?php

namespace App\Http\Requests;
use App\Enums\Rol;

use Illuminate\Foundation\Http\FormRequest;

class StorePDFRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return in_array($user->rol, [Rol::Admin, Rol::Monitor, Rol::Junta, Rol::Usuario]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'datos_form' => ['required', 'array'],
            'fecha_envio' => ['nullable', 'date'],
            'estado' => ['required', 'string'],
            'desactivado' => ['boolean'],
        ];
    }
}
