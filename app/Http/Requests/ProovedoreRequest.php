<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProovedoreRequest extends FormRequest
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
             'nombre'=> 'required|regex:/^[a-zA-Z\s]+$/|max:100|',
             'pais'=> 'nullable|regex:/^[a-zA-Z\s]+$/|max:100|',
             'ciudad'=> 'nullable|regex:/^[a-zA-Z\s]+$/|max:100|',
             'direccion'=> 'nullable|regex:/^[a-zA-Z\s\-\\/\.]+$/|max:100|',
             'correo' => 'nullable|max:100|email',
             'telefono' => 'required|max:10|',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',
            'nombre.max' => 'El campo nombre no puede tener más de 100 caracteres.',
            'pais.regex' => 'El campo pais solo puede contener letras y espacios.',
            'pais.max' => 'El campo pais no puede tener más de 100 caracteres.',
            'ciudad.regex' => 'El campo ciudad solo puede contener letras y espacios.',
            'ciudad.max' => 'El campo ciudad no puede tener más de 100 caracteres.',
            'direccion.regex' => 'no se permite el uso de simbolos',
            'direccion.max' => 'El campo direccion no puede tener más de 100 caracteres.',
            'correo.max' => 'El campo correo no puede tener más de 100 caracteres.',
            'correo.email' => 'El email no es valido',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'telefono.max' => 'El campo nombre no puede tener más de 10 numeros.',
          
            // Agrega más mensajes personalizados según sea necesario
        ];
    }
}
