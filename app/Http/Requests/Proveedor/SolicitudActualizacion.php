<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudActualizacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre'=>'required|string|max:255',
            'email'=>'required|email|string|unique:proveedors,email,'.$this->route('proveedor')->id.'|max:255',
            'ruc_numero'=>'required|string|min:11|unique:proveedors,ruc_numero,'.$this->route('proveedor')->id.'|max:255',
            'direccion'=>'nullable|string|max:255',
            'telefono'=>'nullable|string|min:8|unique:proveedors,telefono,'.$this->route('proveedor')->id.'|max:8',
        ];
    }
    public function messages(){
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo permite 255 caracteres.',

            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electronico.',
            'email.string'=>'El valor no es el correcto.',
            'email.max'=>'Solo se permiten 255 caracteres.',
            'email.unique'=>'Ya se encuentra registrado.',

            'ruc_numero.required'=>'Este campo es requerido.',
            'ruc_numero.min'=>'Se requiere de 11 caracteres.',
            'ruc_numero.string'=>'El valor no es el correcto.',
            'ruc_numero.max'=>'Solo se permiten 11 caracteres.',
            'ruc_numero.unique'=>'Ya se encuentra registrado.',

            'direccion.string'=>'El valor no es el correcto.',
            'direccion.max'=>'Solo se permiten 11 caracteres.',

            'telefono.required'=>'Este campo es requerido.',
            'telefono.email'=>'No es un correo electronico.',
            'telefono.string'=>'El valor no es el correcto.',
            'telefono.max'=>'Solo se permiten 8 caracteres.',
            'telefono.min'=>'Se requiere de 8 caracteres.',
            'telefono.unique'=>'Ya se encuentra registrado.',
        ];
    }
}
