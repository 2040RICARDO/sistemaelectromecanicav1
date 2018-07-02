<?php

namespace sistemaE\Http\Requests;

use sistemaE\Http\Requests\Request;

class DocenteFormRequest extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        
            'nombre'=>'required|max:50|regex:/^[A-z ]+$/i',
            'direccion'=>'required|max:50',
            'celular'=>'required|numeric',
            'especialidad'=>'required|max:50',

        ];
    }
}
