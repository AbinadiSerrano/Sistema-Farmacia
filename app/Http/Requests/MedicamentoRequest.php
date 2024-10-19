<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentoRequest extends FormRequest
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
            'nombre' => 'required|max:255|',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'fecha_vencimiento' => 'required|date|',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'indicaciones' => 'max:255|',
            'laboratorio_id' => 'required|',
            'presentacion_id' => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio solo puede contener numeros y punto como decimal.',
            'precio.regex' => 'No se permite el uso de la coma como decimal',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'inserte un tipo de dato fecha valido.',
            'indicaciones.required' => 'El campo indicaciones no puede tener mas de 255 caracteres',
            'laboratorio_id.required'=> 'Selecciona un Laboratorio.',
            'presentacion_id.required'=> 'Selecciona una presentacion.',

           
            // Agrega más mensajes personalizados según sea necesario
        ];
    }
}
