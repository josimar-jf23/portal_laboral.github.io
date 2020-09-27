<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome');});
//Route::get('/', 'PublicacionesController@index')->name('inicio');
Route::group(['prefix' => 'admin','middleware'=>['auth','preventBackHistory']], function () {
    Route::resource('/dashboard', 'Admin\DashboardController',['as'=>'admin']);
    Route::resource('/usuarios', 'Admin\UsuariosController',['as'=>'admin']);
    Route::resource('/empresas', 'Admin\EmpresasController',['as'=>'admin']);
    Route::resource('/paises', 'Admin\PaisesController',['as'=>'admin']);
    Route::resource('/departamentos', 'Admin\DepartamentosController',['as'=>'admin']);
    Route::resource('/ciudades', 'Admin\CiudadesController',['as'=>'admin']);
    Route::resource('/areas', 'Admin\AreasController',['as'=>'admin']);
    Route::resource('/subareas', 'Admin\SubAreasController',['as'=>'admin']);
    Route::resource('/rubros', 'Admin\RubrosController',['as'=>'admin']);
    Route::resource('/contactos', 'Admin\ContactosController',['as'=>'admin']);
    Route::resource('/puestos', 'Admin\PuestosController',['as'=>'admin']);
    Route::resource('/suscriptores', 'Admin\SuscriptoresController',['as'=>'admin']);
    Route::post('/detalle_publicaciones/v_previa', 'Admin\Detalle_PublicacionesController@v_previa')->name('admin.detalle_publicaciones.v_previa'); 
    Route::resource('/detalle_publicaciones', 'Admin\Detalle_PublicacionesController',['as'=>'admin']);
    Route::match(['put', 'patch'],'/publicaciones/cambiar_estado/{publicacione}', 'Admin\PublicacionesController@cambiar_estado')->name('admin.publicaciones.cambiar_estado');
    //Route::put('/publicaciones/cambiar_estado', 'Admin\Detalle_PublicacionesController@cambiar_estado')->name('admin.publicaciones.cambiar_estado'); 
    Route::resource('/publicaciones', 'Admin\PublicacionesController',['as'=>'admin']);
    //Route::resource('/portadas', 'Admin\PortadasController',['as'=>'admin']);
    
});
Auth::routes();
//publicos
Route::resource('/empleos', 'EmpleosController');
//Route::get('/empleos', 'EmpleosController@index')->name('empleos.index');
Route::post('/dynamics/fetch','PaisDepartamentoCiudadController@fetch')->name('dynamics.fetch');
Route::post('/dynamics/fetch_areas','PaisDepartamentoCiudadController@fetch_areas')->name('dynamics.fetch_areas');
//Route::get('/home', 'HomeController@index')->name('home');
