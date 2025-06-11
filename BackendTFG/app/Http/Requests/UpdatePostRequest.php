<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Rol;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return in_array($user->rol, [Rol::Admin, Rol::Monitor, Rol::Junta, Rol::Usuario]);    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fecha'       => ['required', 'date'],
            'contenido'   => ['required', 'string'],
            'desactivado' => ['boolean'],
        ];
    }
}
