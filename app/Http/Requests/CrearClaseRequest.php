<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearClaseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "asignaciones" =>'required|array|min:1',
            "asignaciones.*.alumno_curso_id" => "required|integer|min:1",
            "curso_id" => "required|integer|min:1",
            "clase_id" => "required|integer|min:1",
            "asignaciones.*.ordenador_clase_id" => "required|integer|min:1"
        ];
    }
}
