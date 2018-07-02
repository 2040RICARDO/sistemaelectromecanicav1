<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;
use sistemaE\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaE\Http\Requests\ActadefensaFormRequest;
use sistemaE\Acta_defensa;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Fpdf;

class ActadefensaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));




            $acta_defensas=DB::table('acta_defensa as a')
            ->join('tema_perfil as te','a.idtema_perfil','=','te.idtema_perfil')
            ->join('postulante as p','te.idpostulante','=','p.idpostulante')
            ->select('a.idacta_defensa','p.nombresapellidos as postulante','te.titulo_tema as tema_perfil','a.fecha_defensa','a.hora_defensa','p.modalidad','a.puntaje','a.valoracion','a.obs_recomendaciones','a.estadoss')
            ->where('a.puntaje','LIKE','%'.$query.'%')
            ->where('a.estadoss','a')
            ->orderBy('a.idacta_defensa','desc')
            ->get();

            return view('uno.acta_defensa.index',["acta_defensas"=>$acta_defensas,"searchText"=>$query]);
        }
    }
    public function create()

    {   

        $titulos=DB::table('tribunal as tri')
        ->join('docente as d','tri.iddocente','=','d.iddocente') 
        ->join('tema_perfil as te','tri.idtema_perfil','=','te.idtema_perfil')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
        ->select('tri.*','te.titulo_tema','te.idtema_perfil','d.nombre','p.nombresapellidos as nombres','p.idpostulante','p.modalidad')
        ->where('te.estados','defendido')
        ->where('te.asignaciontribunal',1)
        ->get();


        return view("uno.acta_defensa.create",["titulos"=>$titulos]);  
    }


    public function store (ActadefensaFormRequest $request)
    {
      	$acta_defensa=new Acta_defensa;

    	$acta_defensa->idtema_perfil=$request->get('idtema_perfil');
    	$acta_defensa->fecha_defensa=$request->get('fecha_defensa');
        $acta_defensa->hora_defensa=$request->get('hora_defensa');
    	$acta_defensa->puntaje=$request->get('puntaje');
    	$acta_defensa->valoracion=$request->get('valoracion');
    	$acta_defensa->obs_recomendaciones=$request->get('obs_recomendaciones');
        $acta_defensa->estadoss='a';
    	$acta_defensa->save();
    	return Redirect::to('uno/acta_defensa');
    }

    public function show($id)
    {
        return view("uno.acta_defensa.show",["acta_defensa"=>Acta_defensa::findOrFail($id)]);
    }
    public function edit($id)
    {
      
        $acta_defensa=DB::table('acta_defensa as a')
        ->join('tema_perfil as te','a.idtema_perfil','=','te.idtema_perfil')
        ->join('postulante as p','te.idpostulante','=','p.idpostulante')
        ->select('a.*','te.titulo_tema','te.idtema_perfil','p.nombresapellidos as nombres','p.modalidad')
        ->where('idacta_defensa',$id)
        ->first();
        return view("uno.acta_defensa.edit",["acta_defensa"=>$acta_defensa]);
    }
    


    
    public function update(ActadefensaFormRequest $request,$id)
    {
        $acta_defensa=Acta_defensa::findOrFail($id);
    	$acta_defensa->idtema_perfil=$request->get('idtema_perfil');
    	$acta_defensa->fecha_defensa=$request->get('fecha_defensa');
        $acta_defensa->hora_defensa=$request->get('hora_defensa');
    	$acta_defensa->puntaje=$request->get('puntaje');
    	$acta_defensa->valoracion=$request->get('valoracion');
    	$acta_defensa->obs_recomendaciones=$request->get('obs_recomendaciones');
        $acta_defensa->estadoss='a';
    	$acta_defensa->save();
    	return Redirect::to('uno/acta_defensa');
        
    }
    public function destroy($id)
    {
        $acta_defensa=Acta_defensa::findOrFail($id);
         $acta_defensa->estadoss='x';
        $acta_defensa->update();
        return Redirect::to('uno/acta_defensa');
    }

    public function reportec($id)
    {


            $acta_defensas=DB::table('acta_defensa as a')
            ->join('tema_perfil as te','a.idtema_perfil','=','te.idtema_perfil')
            ->join('postulante as p','te.idpostulante','=','p.idpostulante')
            ->join('tribunal as tri','te.idtema_perfil','=','tri.idtema_perfil')
            ->join('docente as d','tri.iddocente','=','d.iddocente')
            ->select('te.titulo_tema','a.fecha_defensa','p.modalidad','a.puntaje','a.hora_defensa','a.obs_recomendaciones','p.nombresapellidos','d.nombre','tri.nombre_tri1','tri.nombre_tri2')
            ->where('idacta_defensa',$id)
            ->first();

        $fechaliteral = $acta_defensas->fecha_defensa;
        $fechaliterall =new Carbon($fechaliteral);
        setlocale(LC_TIME, '');
        $fechaliteralll = $fechaliterall->formatLocalized('%A %d de %B de %Y'); 

        $vistareporte="uno.acta_defensa.reporteacta_defensa";
        $data=$acta_defensas;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date','fechaliteralll'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$filename = "reporte_comensal_carrera_".$date.'.pdf';
        //file_put_contents($filename, $pdf);
        return $pdf->stream("reporte.pdf"); 

        /*$registros=DB::table('acta_defensa as a')
            ->join('tema_perfil as te','a.idtema_perfil','=','te.idtema_perfil')
            ->join('postulante as p','a.idpostulante','=','p.idpostulante')
           ->select('a.idacta_defensa','p.nombresapellidos as postulante','te.titulo_tema as tema_perfil','a.fecha_hora_defensa','a.modalidad','a.puntaje','a.valoracion','a.obs_recomendaciones','a.estadoss')
           ->where ('estadoss','=','a')
           ->orderBy('a.puntaje','asc')
        ->get();


        $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',9);
         $pdf::Cell(0,10,utf8_decode("UNIVERSIDAD NACIONAL SIGLO XX"),0,"","C");
          $pdf::Ln();
         $pdf::Cell(0,10,utf8_decode("ÁREA DE TECNOLOGÍA"),0,"","C");
          $pdf::Ln();
         $pdf::Cell(0,10,utf8_decode("CARRERA INGENIERÍA ELECTROMECÁNICA"),0,"","C");
          $pdf::Ln();
         $pdf::Cell(0,10,utf8_decode("----------------------------------------------------------------------------------------------------------------------------------------------------------"),0,"","C");
          $pdf::Ln();
          $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("ACTA DE CALIFICACIÒN DE PERFIL"),0,"","C");
         $pdf::Ln();
      
        $pdf::SetTextColor(0,0,0);
        $pdf::SetFont('Arial','B',9);
        $pdf::Cell(0,10,utf8_decode("POSTULANTE:.............................................................................................................................................................................."));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("TITULO DEL PROYECTO:"));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("......................................................................................................................................................................................................"));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("......................................................................................................................................................................................................."));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("FECHA/HORA:.............................................................................................................................................................................."));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("AREA........................................................................CARRERA................................................................................................."));
        $pdf::Ln();
        
        $pdf::Cell(0,10,utf8_decode("Habiendo el/la postulante realizado la elaboracion documemtal de su proyecto de los motivos, objetivos y alcances "));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("del proyecto a realizar; obtuvo una calificación de ................... puntos, correspondiente a la escala de valoración:"));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("Hasta 50 puntos 
            Reprobado"),0,"","C");
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("De 51 a 60 puntos 
            Regular Aprobado"),0,"","C");
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("De 61 a 70 puntos 
            Bueno Aprobado"),0,"","C");
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("De 71 a 80 puntos
         Muy Bueno Aprobado"),0,"","C");
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("De 81 a 90 puntos 
            Distinguido Aprobado"),0,"","C");
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("De 91 a 100 puntos 
            Sobresaliente Aprobado"),0,"","C");
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("OBSERVACIONES/O RECOMENDACIONES"));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("a)."));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("b)."));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("c)."));
        $pdf::Ln();
        $pdf::Cell(0,10,utf8_decode("......................................................
            .......................................................
            ......................................................."));
        $pdf::Ln();
        
        $pdf::Cell(0,10,utf8_decode("       Tribunal
                                                            Tribunal
                                                            Tribunal"));
        $pdf::Ln();
         $pdf::Cell(0,10,utf8_decode("       Nombre:
                                                            Nombre:
                                                            Nombre:"));
        $pdf::Ln();
        
       
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190  




         $pdf::Output();
         exit;*/

    }
     




    public function reporte()
    {
        $registros=DB::table('acta_defensa as a')
            ->join('tema_perfil as te','a.idtema_perfil','=','te.idtema_perfil')
            ->join('postulante as p','te.idpostulante','=','p.idpostulante')
           ->select('a.idacta_defensa','p.nombresapellidos as postulante','te.titulo_tema as tema_perfil','a.hora_defensa','p.modalidad','a.puntaje','a.valoracion','a.obs_recomendaciones','a.estadoss')
             ->where ('estadoss','=','a')
           ->orderBy('a.puntaje','asc')
        ->get();

        $vistareporte="uno.acta_defensa.reporteacta_defensa_general";
        $data=$registros;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$filename = "reporte_comensal_carrera_".$date.'.pdf';
        //file_put_contents($filename, $pdf);
        return $pdf->stream("reporte.pdf"); 
       /* $pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Acta de Defensa"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190  
         $pdf::cell(25,8,utf8_decode("Postulante"),1,"","L",true);
         $pdf::cell(60,8,utf8_decode("Titulo Tema"),1,"","L",true);
         $pdf::cell(30,8,utf8_decode("Modalidad"),1,"","L",true);
         $pdf::cell(15,8,utf8_decode("Puntaje"),1,"","L",true); 
         $pdf::cell(40,8,utf8_decode("valoracion"),1,"","L",true);
         $pdf::cell(25,8,utf8_decode("Obs/Rec."),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",7);
         
         foreach ($registros as $reg)
         {

            $pdf::cell(25,6,utf8_decode($reg->postulante),1,"","L",true);
            $pdf::cell(60,6,utf8_decode($reg->tema_perfil),1,"","L",true);
            $pdf::cell(30,6,utf8_decode($reg->modalidad),1,"","L",true);
            $pdf::cell(15,6,utf8_decode($reg->puntaje),1,"","L",true); 
            $pdf::cell(40,6,utf8_decode($reg->valoracion),1,"","L",true); 
            $pdf::cell(25,6,utf8_decode($reg->obs_recomendaciones),1,"","L",true); 
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;
*/
    }
     
    
}
