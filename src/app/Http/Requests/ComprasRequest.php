<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprasRequest extends FormRequest
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
        $compraId = $this->route('compras');

        return [
            'usuarios_id' => 'required|integer|exists:usuarios,id',
            'astros_id'   => 'required|integer|exists:astros,id',
        ];
    }

    public function messages(): array
    {
        return [
            'usuarios_id.required' => 'El cliente es obligatorio',

            'astros_id.required'   => 'El astro es obligatorio',
        ];
    }
}
