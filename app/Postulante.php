<?php

namespace sistemaE;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table='postulante';

    protected $primaryKey='idpostulante';

    public $timestamps=false;


    protected $fillable =[
    	'iddocente',
    	'ci',
    	'nombresapellidos',
    	'direccion',
        'celular',
    	'email',
        'estado'

    ];

    protected $guarded =[

    ];
}
