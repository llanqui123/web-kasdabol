<?php

namespace App\Http\Requests\Producto;

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
            'nombre'=>'string|required|unique:productos,nombre,'.$this->route('producto')->id.'|max:255',
            'precio_venta'=>'required|',
            'id_categoria'=>'integer|required|exists:App\Categoria,id',
            'id_proveedor'=>'integer|required|exists:App\Proveedor,id',
        ];
    }

    public function messages(){
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.unique'=>'El producto ya esta registrado.',
            'nombre.max'=>'Solo permite 50 caracteres.',
            
            'precio_venta.required'=>'Este campo es requerido.',

            'id_categoria.required'=>'Este campo es requerido.',
            'id_categoria.integer'=>'El valor tiene que ser entero.',
            'id_categoria.exists'=>'La categoria no existe.',

            'id_proveedor.required'=>'Este campo es requerido.',
            'id_proveedor.integer'=>'El valor tiene que ser entero.',
            'id_proveedor.exists'=>'El proveedor no existe.',
        ];
    }
}
