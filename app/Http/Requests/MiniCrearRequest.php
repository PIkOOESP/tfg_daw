<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MiniCrearRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "alumno_id" => "required|integer|min:1",
            "ordenador_id" => "required|integer|min:1"
        ];
    }

    public function messages(): array
    {
        return [
            'alumno_id.required' => 'Es necesario seleccionar un alumno.',
            'ordenador_id.required' => 'Debe asignar un ordenador al alumno.',
            'ordenador_id.min' => 'El ordenador seleccionado no es válido.',
        ];
    }
}
