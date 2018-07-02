<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;
use sistemaE\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaE\Http\Requests\TemaperfilFormRequest;
use sistemaE\Tema_perfil;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Fpdf;

class TemaperfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
public function vista_reporte_perfil(Request $request)
    {

            
            return view('uno.tema_perfil.vista_reporte');

    }



  public function auto(Request $request){
         $var = $request->input('b');
          $temacontrol=DB::table('tema_perfil')
            ->where('titulo_tema','=',$var)
            ->count();

          if($temacontrol == 0 )
          {
            return response()->json(1);
          }else if($temacontrol > 0){
            $temas=DB::table('tema_perfil')
            ->where('titulo_tema','=',$var)
            ->where('estados','defendido')
            ->count();
            if($temas > 0){
                return response()->json(3);
            }else{
             $tema=DB::table('tema_perfil')
            ->where('titulo_tema','=',$var)
            ->where('estados','vigente')
            ->count();
                if($tema > 0){
                    return response()->json(4);
                }else{
                    return response()->json(5);
                }
            }     
    }
}



 public function eauto(Request $request){
         $var1 = $request->input('c');
         $var = $request->input('b');


          $temacontrol=DB::table('tema_perfil')
            ->whereNotIn('idtema_perfil',[$var1])
            ->where('titulo_tema','=',$var)
            ->count();

          if($temacontrol == 0 )
          {
            return response()->json(1);
          }else if($temacontrol > 0){
            $temas=DB::table('tema_perfil')
            ->whereNotIn('idtema_perfil',[$var1])
            ->where('titulo_tema','=',$var)
            ->where('estados','defendido')
            ->count();
            if($temas > 0){
                return response()->json(3);
            }else{
             $tema=DB::table('tema_perfil')
             ->whereNotIn('idtema_perfil',[$var1])
            ->where('titulo_tema','=',$var)
            ->where('estados','vigente')
            ->count();
                if($tema > 0){
                    return response()->json(4);
                }else{
                    return response()->json(5);
                }
            }
            
          
    }
}


public function autocomplete(Request $request)

    {

          $term = $request->term;
          $results=array();
          $queries = DB::table('tema_perfil')
        ->where('titulo_tema', 'LIKE', '%'.$term.'%')
        ->take(3)->get();
          foreach ($queries as $data) 
              {
                    $results[]=['id'=>$data->idtema_perfil,'value'=>$data->titulo_tema];
              }
        return response()->json($results);
    }

    public function index(Request $request)
    {

            $date = date('Y-m-d');
            $consulta=Tema_perfil::all();
            foreach ($consulta as $co) {
                if ($co->fecha_limite < $date) {
                    if ($co->estados !="defendido") {
                        $co->estados = "vencido";
                        $co->save();
                    }
                }else if($co->estados != "defendido"){
                    $co->estados = "vigente";
                    $co->save();
                } 
            }
    	

    		$tema_general=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->join('docente','tema_perfil.iddocente','=','docente.iddocente')
            ->select('tema_perfil.*','nombresapellidos','modalidad','nombre')
            ->get();




    		$tema_vigente=DB::table('tema_perfil')
    		->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->join('docente','tema_perfil.iddocente','=','docente.iddocente')
            ->select('tema_perfil.*','nombresapellidos','modalidad','nombre')
            ->where('estados','vigente')
            ->get();

            $tema_defendido=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->join('docente','tema_perfil.iddocente','=','docente.iddocente')
            ->select('tema_perfil.*','nombresapellidos','modalidad','nombre')
            ->where('estados','defendido')
            ->get();

            $tema_vencido=DB::table('tema_perfil')
            ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
            ->join('docente','tema_perfil.iddocente','=','docente.iddocente')
            ->select('tema_perfil.*','nombresapellidos','modalidad','nombre')
            ->where('estados','vencido')
            ->get();
    		  

    		return view('uno.tema_perfil.index',compact('tema_vigente','tema_defendido','tema_vencido','tema_general','date'));
    	
    }
    public function create()
    {
   
        $docentes=DB::table('docente')->where('condicion','=','1')->get();
        $postulantes=DB::table('postulante')->where('estado','=','Activo')->get();
        return view("uno.tema_perfil.create",["docentes"=>$docentes,"postulantes"=>$postulantes]);
    }



    
    public function store(TemaperfilFormRequest $request)
    {
       $date = date('Y-m-d');

    	$tema_perfil=new Tema_perfil;
    	$tema_perfil->idpostulante=$request->get('idpostulante');
        $tema_perfil->iddocente=$request->get('iddocente');
    	$tema_perfil->titulo_tema=$request->get('titulo_tema');
    	$tema_perfil->observacion=$request->get('observacion');
    	$tema_perfil->fecha_aprobacion=$request->get('fecha_aprobacion');

        if ($request->get('modalidad') == "PROYECTO DE GRADO"  || $request->get('modalidad')=="TESIS DE GRADO") {
           $tema_perfil->institucion="NULL";
        }else{
            $tema_perfil->institucion=$request->get('institucion');
        }

        $dt = new Carbon($request->get('fecha_aprobacion'));
        $fecha_limit = $dt->addMonths(3);
        $tema_perfil->fecha_limite=$fecha_limit;
        $tema_perfil->estados='vigente';
    	$tema_perfil->save();
    	return Redirect::to('uno/tema_perfil');

    }
    public function show($id)
    {
    	return view("uno.tema_perfil.show",["tema_perfil"=>Tema_perfil::findOrFail($id)]);
    }



    public function edit($id)
    {
    	$tema_perfil=DB::table('tema_perfil')
        ->join('postulante','tema_perfil.idpostulante','=','postulante.idpostulante')
        ->join('docente','tema_perfil.iddocente','=','docente.iddocente')
        ->select('tema_perfil.*','modalidad')
        ->where('idtema_perfil',$id)
        ->where('condicion','=','1')
        ->first();
        $docentes=DB::table('docente')->where('condicion','=','1')->get();
    	$listapostulantes = DB::table('postulante')->where('estado','=','Activo')->get();
        return view("uno.tema_perfil.edit",["tema_perfil"=>$tema_perfil,"docentes"=>$docentes,"listapostulantes"=>$listapostulantes]);
        


    }
   


    public function update(TemaperfilFormRequest $request,$id)
    {
    	$tema_perfil=Tema_perfil::findOrFail($id);

        $tema_perfil->idpostulante=$request->get('idpostulante');  
        $tema_perfil->iddocente=$request->get('iddocente');
    	$tema_perfil->titulo_tema=$request->get('titulo_tema');






        if($request->get('modalidad') == "TRABAJO DIRIGIDO"){
           if($request->get('valorconsul') == $request->get('idpostulante')){
                $tema_perfil->institucion=$request->get('institucion1');
        }else{
            $tema_perfil->institucion=$request->get('institucion2');
         } 
        }else
        {
           $tema_perfil->institucion="NULL"; 
        }



    	$tema_perfil->observacion=$request->get('observacion');
    	$tema_perfil->fecha_aprobacion=$request->get('fecha_aprobacion');
        $dt = new Carbon($request->get('fecha_aprobacion'));
        $fecha_limit = $dt->addMonths(3);
        $tema_perfil->fecha_limite=$fecha_limit;
    	$tema_perfil->update();

        $date = date('Y-m-d');
        if ( $tema_perfil->fecha_limite < $date) {
            if ( $tema_perfil->estados !="defendido") {
                $tema_perfil->estados = "vencido";
                 $tema_perfil->save();
                }
            }else if($tema_perfil->estados != "defendido"){
                $tema_perfil->estados = "vigente";
                $tema_perfil->save();
            }
            
    
    	return Redirect::to('uno/tema_perfil');
    }
    public function destroy($id)
    {
    	$tema_perfil=Tema_perfil::findOrFail($id);
        $tema_perfil->estados='vigente';
    	$tema_perfil->update();
        $date = date('Y-m-d');
    	return Redirect::to('uno/tema_perfil');
    }

    public function reporte()
    {
        $registros=DB::table('tema_perfil as te')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
        ->join('docente as d','te.iddocente','=','d.iddocente')
        ->select('te.idtema_perfil','te.titulo_tema','te.modalidad','te.institucion','te.observacion','p.nombresapellidos as postulante','d.nombre as docente','te.fecha_aprobacion','te.estados')
       ->where ('estados','=','vigente')
        ->orderBy('te.titulo_tema','asc')
        ->get();


        $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Temas de Perfiles"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(100,8,utf8_decode("Titulo Tema"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Modalidad"),1,"","L",true);
         $pdf::cell(20,8,utf8_decode("Obs"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Postulante"),1,"","L",true);
            $pdf::cell(38,8,utf8_decode("Tutor"),1,"","L",true);
               $pdf::cell(38,8,utf8_decode("Estado"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {

            $pdf::cell(100,6,utf8_decode($reg->titulo_tema),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->modalidad),1,"","L",true);
            $pdf::cell(20,6,utf8_decode($reg->observacion),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->postulante),1,"","L",true); 
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
    }




    public function reporte_gestion(Request $request)
    {
        
        $gestion = $request->get('gestion');
        $modalidad = $request->get('modalidad');
        $estado = $request->get('estado');
        
      $vistareporte="uno.tema_perfil.reporteacta_perfil_gestion";
        
        $registros=DB::table('tema_perfil as te')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
         ->join('docente as d','te.iddocente','=','d.iddocente')
        ->select('te.idtema_perfil','te.titulo_tema','p.modalidad','te.institucion','te.observacion','p.nombresapellidos as postulante','d.nombre as docente','te.fecha_aprobacion','te.estados')
       ->whereBetween ('fecha_aprobacion',array($gestion.'01/01',$gestion.'12/31'))
       ->where ('p.modalidad','=',$modalidad)
       ->where ('te.estados','=',$estado)
       ->orderBy('te.titulo_tema','asc')
        ->get();
         

         
        $data=$registros;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date','gestion'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$filename = "reporte_comensal_carrera_".$date.'.pdf';
        //file_put_contents($filename, $pdf);
        return $pdf->download("reporte.pdf"); 
        
        /*$pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Temas de Perfiles"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(100,8,utf8_decode("Titulo Tema"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Modalidad"),1,"","L",true);
         $pdf::cell(20,8,utf8_decode("Obs"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Postulante"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {

            $pdf::cell(100,6,utf8_decode($reg->titulo_tema),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->modalidad),1,"","L",true);
            $pdf::cell(20,6,utf8_decode($reg->observacion),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->postulante),1,"","L",true); 
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;*/
    }

public function reporte_generalperfil(){
    
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
     
        return $pdf->stream("reporte.pdf"); 
}




    public function reportec()
    {
        $registros=DB::table('tema_perfil as te')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
          ->join('docente as d','te.iddocente','=','d.iddocente')
        ->select('te.idtema_perfil','te.titulo_tema','te.modalidad','te.institucion','te.observacion','p.nombresapellidos as postulante','d.nombre as docente','te.fecha_aprobacion','te.estados')
       ->where ('estados','=','vencido')
        ->orderBy('te.titulo_tema','asc')
        ->get();

        $vistareporte="uno.tema_perfil.reportetema_vencidosperfil";
        $data=$registros;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
       
        return $pdf->stream("reporte.pdf"); 

       
        /*$pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Temas de Perfiles"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(100,8,utf8_decode("Titulo Tema"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Modalidad"),1,"","L",true);
         $pdf::cell(20,8,utf8_decode("Obs"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Postulante"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {

            $pdf::cell(100,6,utf8_decode($reg->titulo_tema),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->modalidad),1,"","L",true);
            $pdf::cell(20,6,utf8_decode($reg->observacion),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->postulante),1,"","L",true); 
            $pdf::Ln(); 
         }
         $pdf::Output();
         exit;*/
    }

/*         public function reporteCC()
    {
        $registros=DB::table('tema_perfil as te')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
        ->select('te.idtema_perfil','te.titulo_tema','te.modalidad','te.institucion','te.observacion','p.nombresapellidos as postulante','te.fecha_aprobacion','te.estados')
       ->where ('modalidad','=','TRABAJO DIRIGIDO')
        ->orderBy('te.titulo_tema','asc')
        ->get();


        $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Temas de Perfiles"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(100,8,utf8_decode("Titulo Tema"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Modalidad"),1,"","L",true);
         $pdf::cell(20,8,utf8_decode("Obs"),1,"","L",true);
         $pdf::cell(38,8,utf8_decode("Postulante"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {

            $pdf::cell(100,6,utf8_decode($reg->titulo_tema),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->modalidad),1,"","L",true);
            $pdf::cell(20,6,utf8_decode($reg->observacion),1,"","L",true);
            $pdf::cell(38,6,utf8_decode($reg->postulante),1,"","L",true); 
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
    }*/



}
