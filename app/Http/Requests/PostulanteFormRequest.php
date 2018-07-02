<?php

namespace sistemaE\Http\Requests;

use sistemaE\Http\Requests\Request;

class PostulanteFormRequest extends Request
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
        
            'ci'=>'required|numeric',
            'modalidad'=>'required',
            'nombresapellidos'=>'required|max:100|regex:/^[A-z ]+$/i',
            'direccion'=>'max:50',
            'celular'=>'numeric',
            'email'=>'max:50'
        ];
    }
}
