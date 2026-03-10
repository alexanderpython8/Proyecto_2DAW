<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AstrosRequest extends FormRequest
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
        $astrosId = $this->route('astros')
        return [
            'nombre' => 'required|string|max:255|unique:astros,nombre,' . $astrosId,
            'tipo' => 'required|in:0,1,2',
            'historia' => 'required|string|max:1000',
            'caracteristicas' => 'required|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'img' => $astrosId ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.string' => 'El nombre debe ser texto',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres',
            'nombre.unique' => 'Este nombre de astro ya existe',
            'tipo.required' => 'El tipo es obligatorio',
            'tipo.in' => 'El tipo debe ser Planeta, Sistemas estelares o Agujeros negros',
            'historia.required' => 'La historia es obligatoria',
            'historia.string' => 'La historia debe ser texto',
            'historia.max' => 'La historia no puede exceder 1000 caracteres',
            'caracteristicas.required' => 'Las características son obligatorias',
            'caracteristicas.string' => 'Las características deben ser texto',
            'caracteristicas.max' => 'Las características no pueden exceder 1000 caracteres',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio no puede ser negativo',
            'img.required' => 'La imagen es obligatoria',
            'img.image' => 'El archivo debe ser una imagen',
            'img.mimes' => 'La imagen debe ser jpeg, png, jpg o gif',
            'img.max' => 'La imagen no puede exceder 2MB'
        ];
    }
}
