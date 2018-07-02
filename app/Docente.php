<?php

namespace sistemaE;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    
    protected $table='docente';

    protected $primaryKey='iddocente';

    public $timestamps=false;


    protected $fillable =[
        'ci',
    	'nombre',
    	'direccion',
        'celular',
    	'especialidad',
    	'condicion'
    ];

    protected $guarded =[

    ];


}
