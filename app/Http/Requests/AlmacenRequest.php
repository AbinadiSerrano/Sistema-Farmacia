<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlmacenRequest extends FormRequest
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
            'nombre' => 'required|max:100|',
            'ubicacion' => 'required|max:100|',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de 100 caracteres.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'ubicacion.max' => 'El campo ubicacion no puede tener más de 100 caracteres.',
           
            // Agrega más mensajes personalizados según sea necesario
        ];
    }
}
