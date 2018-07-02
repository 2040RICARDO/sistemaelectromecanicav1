<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;

use sistemaE\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sistemaE\Tema_perfil;
use DB;


class AnulartemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }
    public function estadoss($sd)
    {
       return view('uno.tema_perfil.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tema_perfil=Tema_perfil::findOrFail($id);
        $tema_perfil->estados='defendido';
        $tema_perfil->update();
        $date = date('Y-m-d');
        
        return Redirect::to('uno/tema_perfil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "si";
    }
    public function edit($id)
    {

    
        $tema_perfil=Tema_perfil::findOrFail($id);
        $tema_perfil->estados='vencido';
        $tema_perfil->update();

        
            
       return Redirect::to('uno/tema_perfil');
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
