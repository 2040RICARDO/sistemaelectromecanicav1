<?php

namespace sistemaE\Http\Requests;

use sistemaE\Http\Requests\Request;

class ActadefensaFormRequest extends Request
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
       
            'idtema_perfil'=>'required',
            'fecha_defensa'=>'required',
            'hora_defensa'=>'required',
            'puntaje'=>'required|max:3',
            'valoracion'=>'required|max:50',
            'obs_recomendaciones'=>'max:200'
        ];
    }
}
