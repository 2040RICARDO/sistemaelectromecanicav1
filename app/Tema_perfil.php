<?php

namespace sistemaE;

use Illuminate\Database\Eloquent\Model;

class Tema_perfil extends Model
{
    protected $table='tema_perfil';

    protected $primaryKey='idtema_perfil';

    public $timestamps=false;


    protected $fillable =[
 		'idpostulante',
 		'iddocente',
 		'titulo_tema',
 		'modalidad',
 		'institucion',
 		'observacion',
 		'fecha_aprobacion',
 		'estados'
    ];

    protected $guarded =[

    ];
}
