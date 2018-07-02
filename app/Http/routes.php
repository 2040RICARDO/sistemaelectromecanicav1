<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


*/
/*Route::get('/', function () {
    return view('auth/login');
});*/


Route::get('/','HomeController@welcome');
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::resource('uno/docente','DocenteController');
Route::resource('uno/postulante','PostulanteController');
Route::resource('uno/tema_perfil','TemaperfilController');
Route::resource('uno/tribunal','TribunalController');
Route::resource('uno/acta_defensa','ActadefensaController');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('uno/backup','BackupController');
Route::auth();

Route::get('/home', 'HomeController@index');

//reportes
Route::get('reportedocentes', 'DocenteController@reporte');
Route::get('reportepostulantes', 'PostulanteController@reporte');
Route::get('reportetema_perfils', 'TemaperfilController@reporte');
Route::get('reportetema_perfil', 'TemaperfilController@reportec');

Route::get('reportetema_perfill', 'TemaperfilController@reporteCC');
Route::get('reportetribunals', 'TribunalController@reporte');
Route::get('reporteacta_defensas', 'ActadefensaController@reporte');
Route::get('reporteacta_defensa/{id}', 'ActadefensaController@reportec');
//REPORTE TEMA_PERFIL
Route::get('vista_reporte_perfil','TemaperfilController@vista_reporte_perfil');
Route::post('reporte_gestion', 'TemaperfilController@reporte_gestion');
Route::get('reporte_generalperfil', 'TemaperfilController@reporte_generalperfil');


Route::resource('tema','AnulartemaController');
Route::get('estadoss/{sd}','AnulartemaController@estadoss');

Route::get('backup/download/{nombre}', 'BackupController@download');
Route::get('reporte_principal', 'HomeController@reporte');
Route::get('archi', 'HomeController@disenio');
Route::post('control','TemaperfilController@auto');
Route::post('econtrol','TemaperfilController@eauto');
Route::get('autocomplete','TemaperfilController@autocomplete');
Route::get('asignartribunal/{id}','TribunalController@registrar');
Route::get('manual','UsuarioController@manual');

Route::get('/{slug?}', 'HomeController@index');

