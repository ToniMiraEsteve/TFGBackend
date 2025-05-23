<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePDFRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'datos_form' => ['required', 'json'],
            'ruta_pdf' => ['required', 'string'],
            'fecha_envio' => ['nullable', 'date'],
            'estado' => ['required', 'string'],
            'desactivado' => ['boolean'],
        ];
    }
}
