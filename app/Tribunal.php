<?php

namespace sistemaE;

use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    protected $table='tribunal';

    protected $primaryKey='idtribunal';

    public $timestamps=false;


    protected $fillable =[
 		'idtema_perfil',
 		'titulo_tema',
 		'idpostulante',
 		'iddocente',
 		'nombre_tri1',
 		'nombre_tri2',
 		'fecha_aprobacion'
 
 		
    ];

    protected $guarded =[

    ];
}
