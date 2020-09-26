<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Publicacion;
use App\Empresa;
use App\Area;

class PublicacionesController extends Controller
{
    public function index(){
        $publicaciones=Publicacion::all();
        //dd($usuarios->paises);
        return view('admin.publicaciones.index',compact('publicaciones'));
    }
    public function create()
    {
        $empresas=Empresa::all();
        $areas=Area::all();        
        return view('admin.publicaciones.create',compact('empresas','areas'));
    }
    public function store(Request $request)
    {        
        $request->validate([
            'empresa_id' => 'required',
            'vacantes' => 'required',
            'fecha_convocatoria' => 'required',
            'puesto_id' => 'required',
            'contacto_id' => 'required'
        ]);
        //dd($request);
        $publicacion=new Publicacion();
        $publicacion->adicional=$request->adicional;
        $publicacion->fecha_convocatoria=$request->fecha_convocatoria;
        $publicacion->vacantes=$request->vacantes;
        $publicacion->sueldo=$request->sueldo;
        $publicacion->empresa_id=$request->empresa_id;
        $publicacion->puesto_id=$request->puesto_id;
        $publicacion->contacto_id=$request->contacto_id;
        //dd($pais);
        $publicacion->save();
        return redirect()->route('admin.publicaciones.index');
    }
}
