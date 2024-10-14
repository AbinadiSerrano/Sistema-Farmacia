<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorioRequest extends FormRequest
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
            'direccion' => 'max:100|',
            'correo' => 'nullable|max:100|email',
            'telefono' => 'max:10|',
            'pais' => 'required|max:30|regex:/^[a-zA-Z\s]+$/|',
            'ciudad' => 'required|max:100|regex:/^[a-zA-Z\s]+$/|',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de 100 caracteres.',
            'direccion.max' => 'El campo direccion no puede tener más de 100 caracteres.',
            'correo.max' => 'El campo correo no puede tener más de 100 caracteres.',
            'correo.email' => 'El email no es valido',
            'telefono.max' => 'El campo nombre no puede tener más de 10 numeros.',
            'pais.required' => 'El campo pais es obligatorio.',
            'pais.max' => 'El campo pais no puede tener mas de 30 caracteres.',
            'pais.regex' => 'El campo pais solo puede contener letras.',
            'ciudad.required' => 'El campo ciudad es obligatorio.',
            'ciudad.max' => 'El campo ciudad no puede tener mas de 100 caracteres.',
            'ciudad.regex' => 'El campo ciudad solo puede contener letras.',
            
           
            // Agrega más mensajes personalizados según sea necesario
        ];
    }
}
