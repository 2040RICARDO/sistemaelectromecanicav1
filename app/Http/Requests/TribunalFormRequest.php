<?php

namespace sistemaE\Http\Requests;

use sistemaE\Http\Requests\Request;

class TribunalFormRequest extends Request
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
           
            'iddocente'=>'required',
            'nombre_tri1'=>'required',
            'nombre_tri2'=>'required',
            'fecha_aprobacion'=>'required'
          
        ];
    }
}
