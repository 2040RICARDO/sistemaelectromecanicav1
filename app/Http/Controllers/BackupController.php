<?php

namespace sistemaE\Http\Controllers;

use Illuminate\Http\Request;

use sistemaE\Http\Requests;

use Alert;
use Artisan;
use Log;
use Storage;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
class BackupController extends Controller
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
    $directory = storage_path('app/backups');
       $files = File::allFiles($directory);
       $backups = [];
         foreach ($files as $file)
             { 
             $backups[] = [
               'nombre' => $file->getFilename(),
             ];


            }
            return view('uno.backup.index',compact('backups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
            $fecha = $now->toDateString();
     
            // start the backup process
          //  Artisan::call('backup:mysql-dump', array('theara.sql'));
            Artisan::call('backup:mysql-dump',['filename' => 'dbelectro_'.$fecha]);
            //Artisan::call('backup:mysql-dump/'+"ssdf");
             return Redirect::to('uno/backup');
    }
  public function download($nombre)
    {
        ini_set('max_execution_time',900);
       Artisan::call('backup:mysql-restore',['--filename' => $nombre,'--yes' => '--yes']);

      return Redirect::to('uno/backup');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
