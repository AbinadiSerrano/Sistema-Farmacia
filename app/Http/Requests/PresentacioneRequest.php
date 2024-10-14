<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresentacioneRequest extends FormRequest
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
             'nombre' => 'required|regex:/^[a-zA-Z\s]+$/|max:255|',
             'categoria_id' => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.regex' => 'El campo nombre solo puede contener letras y espacios.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',

            'categoria_id.required'=> 'Selecciona una categoria '
           
            // Agrega más mensajes personalizados según sea necesario
        ];
    }
}
