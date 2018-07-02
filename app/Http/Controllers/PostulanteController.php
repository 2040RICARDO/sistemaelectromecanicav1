<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;
use sistemaE\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistemaE\Http\Requests\PostulanteFormRequest;
use sistemaE\Postulante;
use DB;
use Fpdf;

use Illuminate\Support\Collection;

class PostulanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$postulantes=DB::table('postulante as p')
    		->select('p.*')
            ->where('estado','=','Activo')
    		->orderBy('p.idpostulante','desc')
    		->get();
    		return view('uno.postulante.index',["postulantes"=>$postulantes,"searchText"=>$query]);

    		

    	}
    }
    public function create()
    {
    	$docentes=DB::table('docente')->where('condicion','=','1')->get();
    	return view("uno.postulante.create",["docentes"=>$docentes]);
    }
    public function store(PostulanteFormRequest $request)
    {
    	$postulante=new Postulante;
    	$postulante->ci=$request->get('ci');
    	$postulante->nombresapellidos=$request->get('nombresapellidos');
    	$postulante->direccion=$request->get('direccion');
        $postulante->modalidad=$request->get('modalidad');
        /*if ($request->get('modalidad') == "PROYECTO DE GRADO"  || $request->get('modalidad')=="TESIS DE GRADO") {
           $postulante->institucion="NULL";
        }else{
            $postulante->institucion=$request->get('institucion');
        }*/
        $postulante->celular=$request->get('celular');
    	$postulante->email=$request->get('email');
    	$postulante->estado='Activo';
    	$postulante->save();
    	return Redirect::to('uno/postulante');

    }
    public function show($id)
    {
    	return view("uno.postulante.show",["postulante"=>Postulante::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$postulante=Postulante::findOrFail($id);
    	return view("uno.postulante.edit",["postulante"=>$postulante]);
    }
    public function update(PostulanteFormRequest $request,$id)
    {
    	$postulante=Postulante::findOrFail($id);

    	$postulante->ci=$request->get('ci');
    	$postulante->nombresapellidos=$request->get('nombresapellidos');


        $postulante->modalidad=$request->get('modalidad');
        /*if($request->get('modalidad') == 'TRABAJO DIRIGIDO1'){
            $postulante->modalidad="TRABAJO DIRIGIDO";
        }else if($request->get('modalidad') == 'PROYECTO DE GRADO1'){
            $postulante->modalidad="PROYECTO DE GRADO";
        }else if($request->get('modalidad') == 'TESIS DE GRADO1'){
            $postulante->modalidad="TESIS DE GRADO";
        }else{
            $postulante->modalidad=$request->get('modalidad');
        }
        //$tema_perfil->modalidad=$request->get('modalidad');
        if ($request->get('modalidad') == "PROYECTO DE GRADO" || $request->get('modalidad')=="TESIS DE GRADO" || $request->get('modalidad')=="PROYECTO DE GRADO1" || $request->get('modalidad')=="TESIS DE GRADO1") {
           $postulante->institucion="NULL";
        }else if($request->get('modalidad')=="TRABAJO DIRIGIDO"){
            $postulante->institucion=$request->get('institucionn');
        }else if($request->get('modalidad')=="TRABAJO DIRIGIDO1"){
            $postulante->institucion=$request->get('institucion');
        }*/
    	$postulante->direccion=$request->get('direccion');
        $postulante->celular=$request->get('celular');
    	$postulante->email=$request->get('email');
        $postulante->estado='Activo';

    	$postulante->update();
    	return Redirect::to('uno/postulante');
    }
    public function destroy($id)
    {
    	$postulante=Postulante::findOrFail($id);
         $postulante->Estado='Inactivo';
    	$postulante->update();
    	return Redirect::to('uno/postulante');
    }
    public function reporte()
    {
        $registros=DB::table('postulante as p')
        ->select('p.*')
        ->where ('estado','=','Activo')
        ->orderBy('p.ci','asc')
        ->get();

        $vistareporte="uno.postulante.reporte_postulantes";
        $data=$registros;
        $date = date('Y-m-d');
        $view = \View::make($vistareporte, compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper([0, 0,612, 935.433071]);
        //$filename = "reporte_comensal_carrera_".$date.'.pdf';
        //file_put_contents($filename, $pdf);
        return $pdf->stream("reporte.pdf"); 
         /*$pdf = new Fpdf();
         $pdf::AddPage();
         $pdf::SetTextColor(35,56,113);
         $pdf::SetFont('Arial','B',11);
         $pdf::Cell(0,10,utf8_decode("Listado Postulantes"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(30,8,utf8_decode("Ci"),1,"","L",true);
         $pdf::cell(80,8,utf8_decode("Nombres/Apellidos"),1,"","L",true);
         $pdf::cell(70,8,utf8_decode("Docente/Tutor"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(30,6,utf8_decode($reg->ci),1,"","L",true);
            $pdf::cell(80,6,utf8_decode($reg->nombresapellidos),1,"","L",true);
            $pdf::cell(70,6,utf8_decode($reg->docente),1,"","L",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;*/
    }


}
