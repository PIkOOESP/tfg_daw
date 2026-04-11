<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MiniDeleteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "asignacion_id" => "required|integer|min:1",
            "aula_id" => "required|integer|min:1",
            "curso_id" => "required|integer|min:1"
        ];
    }

    public function messages(): array
    {
        return [
            'asignacion_id.required' => 'No se ha podido identificar la asignación a borrar.',
            'asignacion_id.integer'  => 'El formato de la asignación es incorrecto.',
        ];
    }
}
