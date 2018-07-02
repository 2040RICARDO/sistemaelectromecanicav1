<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;
use sistemaE\Http\Requests;
use sistemaE\Docente;
use Illuminate\Support\Facades\Redirect;
use sistemaE\Http\Requests\DocenteFormRequest;
use DB;

use Fpdf;

class DocenteController extends Controller
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
    		$docentes=DB::table('docente')
            ->where('nombre','LIKE','%'.$query.'%')
    		->where ('condicion','=','1')
    		->orderBy('iddocente','desc')
    		->get();
    		return view('uno.docente.index',["docentes"=>$docentes,"searchText"=>$query]);

    		

    	}
    }
    public function create()
    {
    	return view("uno.docente.create");
    }
    public function store(DocenteFormRequest $request)
    {
    	$docente=new Docente;
    	$docente->nombre=$request->get('nombre');
    	$docente->direccion=$request->get('direccion');
        $docente->celular=$request->get('celular');
    	$docente->especialidad=$request->get('especialidad');
    	$docente->condicion='1';
    	$docente->save();
    	return Redirect::to('uno/docente');

    }
    public function show($id)
    {
    	return view("uno.docente.show",["docente"=>Docente::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("uno.docente.edit",["docente"=>Docente::findOrFail($id)]);
    }
    public function update(DocenteFormRequest $request,$id)
    {
    	$docente=Docente::findOrFail($id);
    	$docente->nombre=$request->get('nombre');
    	$docente->direccion=$request->get('direccion');
        $docente->celular=$request->get('celular');
    	$docente->especialidad=$request->get('especialidad');
    	$docente->update();
    	return Redirect::to('uno/docente');
    }
    public function destroy($id)
    {
    	$docente=Docente::findOrFail($id);
    	$docente->condicion='0';
    	$docente->update();
    	return Redirect::to('uno/docente');
    }
    public function reporte()
    {
       $registros=DB::table('docente')
       ->where ('condicion','=','1')
       ->orderBy('nombre','asc')
       ->get();
        $vistareporte="uno.docente.reporte_docente";
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
         $pdf::Cell(0,10,utf8_decode("Listado Docentes/Tutores"),0,"","C");
         $pdf::Ln();
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(206, 246, 245); // establece el color del fondo de la celda 
         $pdf::SetFont('Arial','B',10); 
         //El ancho de las columnas debe de sumar promedio 190        
         $pdf::cell(80,8,utf8_decode("Nombre"),1,"","L",true);
         $pdf::cell(50,8,utf8_decode("Direccion"),1,"","L",true);
         $pdf::cell(60,8,utf8_decode("Especialidad"),1,"","L",true);
         
         $pdf::Ln();
         $pdf::SetTextColor(0,0,0);  // Establece el color del texto 
         $pdf::SetFillColor(255, 255, 255); // establece el color del fondo de la celda
         $pdf::SetFont("Arial","",9);
         
         foreach ($registros as $reg)
         {
            $pdf::cell(80,6,utf8_decode($reg->nombre),1,"","L",true);
            $pdf::cell(50,6,utf8_decode($reg->direccion),1,"","L",true);
            $pdf::cell(60,6,utf8_decode($reg->especialidad),1,"","L",true);
            $pdf::Ln(); 
         }

         $pdf::Output();
         exit;*/
    }



}
