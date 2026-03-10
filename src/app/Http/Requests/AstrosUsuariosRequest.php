<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AstrosUsuariosRequest extends FormRequest
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
        'usuarios_id' => 'required|integer|exists:usuarios,id',
        'astros_id'   => 'required|integer|exists:astros,id',
        'fechaInicio' => 'required|date|after:yesterday',
        'fechaFin'    => 'required|date|after:fechaInicio',
    ];
}

public function messages(): array
{
    return [
        'usuarios_id.required' => 'El cliente es obligatorio'

        'astros_id.required'   => 'El astro es obligatorio'

        'fechaInicio.required' => 'La fecha de inicio es obligatoria',
        'fechaInicio.date'     => 'La fecha de inicio debe ser una fecha válida',
        'fechaInicio.after'    => 'La fecha de inicio no puede ser anterior a hoy',

        'fechaFin.required'    => 'La fecha de fin es obligatoria',
        'fechaFin.date'        => 'La fecha de fin debe ser una fecha válida',
        'fechaFin.after'       => 'La fecha de fin debe ser al menos un día después de la fecha de inicio',
    ];
}
}
