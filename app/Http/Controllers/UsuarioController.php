<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;

use sistemaE\Http\Requests;

use sistemaE\User;
use Illuminate\Support\Facades\Redirect;
use sistemaE\Http\Requests\UsuarioFormRequest;
use DB;
use Session;
class UsuarioController extends Controller
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
            $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function manual(){
            return view('layouts.manual');
    }


    public function create()
    {
        return view("seguridad.usuario.create");
    }
    public function store (UsuarioFormRequest $request)
    {
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));


        $usuario->save();
       

        Session::flush();

        return Redirect::to('login');


    }
    public function edit($id)
    {
        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }    
    public function update(Request $request,$id)
    {
        $usuario=User::findOrFail($id);
        $usuario->tipo_user=$request->get('tipo_user');
       /* $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));*/
        $usuario->update();
        return Redirect::to('seguridad/usuario');
    }
    public function destroy($id)
    {
        $usuario = DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('seguridad/usuario');
    }

}
