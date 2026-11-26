<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateEstudianteRequest extends StoreEstudianteRequest
{
    public function rules(): array
    {
        $reglas = parent::rules();

        $reglas['dni'] = [
            'required',
            'digits:8',
            Rule::unique('estudiantes', 'dni')->ignore($this->route('estudiante')),
        ];

        return $reglas;
    }
}