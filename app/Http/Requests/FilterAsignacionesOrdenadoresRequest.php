<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterAsignacionesOrdenadoresRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "aula_id" => "required|integer|min:1",
            "curso_id" => "required|integer|min:1"
        ];
    }

    public function messages(): array
    {
        return [
            'aula_id.required' => 'Debe seleccionar un aula para filtrar.',
            'aula_id.min'      => 'Seleccione un aula válido.',
            'aula_id.integer'  => 'El identificador del aula debe ser un número.',
            'curso_id.required' => 'El curso es obligatorio para realizar la búsqueda.',
            'curso_id.min'      => 'Seleccione un curso válido.',
            'curso_id.integer'  => 'El identificador del curso debe ser un número.',
        ];
    }
}
