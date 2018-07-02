<?php

namespace sistemaE\Http\Controllers;

use sistemaE\Http\Requests;
use Illuminate\Http\Request;
use sistemaE\Tema_perfil;
use DB;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    { 
       return view('home');
    }
    public function welcome(){
        

            $date = date('Y-m-d');

            $tema_general=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->select('tema_perfil.*','nombresapellidos','modalidad')
            ->get();

            $tema_vigente=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->select('tema_perfil.*','nombresapellidos','modalidad')
            ->where('estados','vigente')
            ->get();

            $tema_defendido=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->select('tema_perfil.*','nombresapellidos','modalidad')
            ->where('estados','defendido')
            ->get();

            $tema_vencido=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->select('tema_perfil.*','nombresapellidos','modalidad')
            ->where('estados','vencido')
            ->get();
              
         return view('layouts.welcome',compact('tema_vigente','tema_defendido','tema_vencido','tema_general','date'));
    }
    
    public function reporte(){
    
      $vistareporte="uno.tema_perfil.reporteacta_perfil_general";
        
        $registros=DB::table('tema_perfil as te')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
         ->join('docente as d','te.iddocente','=','d.iddocente')
        ->select('te.idtema_perfil','te.titulo_tema','p.modalidad','te.institucion','te.observacion','p.nombresapellidos as postulante','d.nombre','te.fecha_aprobacion','te.estados')
       ->orderBy('te.titulo_tema','asc')
        ->get();
         
        $data=$registros;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$filename = "reporte_comensal_carrera_".$date.'.pdf';
        //file_put_contents($filename, $pdf);
        return $pdf->stream("reporte.pdf"); 
}

public function disenio(){

         $rutaarchivo= "../storage/reglamento.pdf";
         return response()->download($rutaarchivo);
}


}
