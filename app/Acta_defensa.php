<?php

namespace sistemaE;

use Illuminate\Database\Eloquent\Model;

class Acta_defensa extends Model
{
     protected $table='acta_defensa';

    protected $primaryKey='idacta_defensa';

    public $timestamps=false;


    protected $fillable =[
 		'idpostulante',
 		'idtema_perfil',
 		'fecha_defensa',
 		'hora_defensa',
 		'modalidad',
 		'puntaje',
 		'valoracion',
 		'obs_recomendaciones',
 		'estadoss'
 		
    ];

    protected $guarded =[

    ];
}
