<?php

namespace sistemaE\Http\Requests;

use sistemaE\Http\Requests\Request;

class TemaperfilFormRequest extends Request
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
            'idpostulante'=>'required',
            'iddocente'=>'required',
            'titulo_tema'=>'required|max:350|regex:/^[A-Z ]+$/i',
            
            //'institucion'=>'required|max:50|regex:/^[A-z ]+$/i',
            'observacion'=>'max:50',
            'fecha_aprobacion'=>'required'
        ];
    }
}
