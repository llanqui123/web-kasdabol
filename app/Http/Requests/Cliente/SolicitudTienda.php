<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudTienda extends FormRequest
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
            'nombre'=>'string|required||max:255',
            'ci'=>'string|required|unique:clientes|max:8',
            'ruc'=>'string|required|unique:clientes|max:11',
            'direccion'=>'string|required|max:255',
            'telefono'=>'string|required|unique:clientes|max:8',
            'email'=>'string|required|unique:clientes|max:255|email:rfc,dns',
        ];
    }

    public function messages(){
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo permite 50 caracteres.',

            'ci.required'=>'Este campo es requerido.',
            'ci.string'=>'El valor no es correcto.',
            'ci.unique'=>'El CI ya esta registrado.',
            'ci.max'=>'Solo permite 8 caracteres.',

            'ruc.string'=>'El valor no es correcto.',
            'ruc.unique'=>'El numero de ruc ya esta registrado.',
            'ruc.max'=>'Solo permite 11 caracteres.',

            'direccion.string'=>'El valor no es correcto.',
            'direccion.max'=>'Solo permite 255 caracteres.',

            'telefono.string'=>'El valor no es correcto.',
            'telefono.unique'=>'El producto ya esta registrado.',
            'telefono.max'=>'Solo permite 8 caracteres.',

            'ci.email'=>'No es un correo electronico.',
            'ci.string'=>'El valor no es correcto.',
            'ci.unique'=>'El Email ya esta registrado.',
            'ci.max'=>'Solo permite 8 caracteres.',
            
        ];
    }
}
