<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Publicacion;
use App\Empresa;
use App\Area;
use App\Puesto;
use App\SubArea;
use App\Contacto;
use Session;

class PublicacionesController extends Controller
{
    public function index(){
        $publicaciones=Publicacion::all()->sortByDesc('estado');
        //dd($usuarios->paises);
        return view('admin.publicaciones.index',compact('publicaciones'));
    }
    public function show($id)
    {
        Session::put('publicacion_id',$id);
        return redirect('/admin/detalle_publicaciones');
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
    public function edit($id){
        $publicacion=Publicacion::where('id',$id)->first();
        $empresa_e  =$publicacion->empresa_id;
        $puesto_e   =$publicacion->puesto_id;
        $contacto_e =$publicacion->contacto_id;
        $subarea_e  =$publicacion->puesto->subarea_id;
        $area_e     =$publicacion->puesto->subarea->area_id;
        $empresas=Empresa::all();
        $areas=Area::all();
        $contactos=Contacto::where('empresa_id',$empresa_e)->get();        
        $subareas=SubArea::where('area_id',$area_e)->get();
        $puestos=Puesto::where('empresa_id',$empresa_e)->where('subarea_id',$subarea_e)->get();      
        //dd($ciudades);
        return view('admin.publicaciones.edit',compact('publicacion','empresas','areas','subareas','contactos','puestos'));
    }
    public function update(Request $request,$id){
        $publicacion=Publicacion::findOrFail($id);
        $request->validate([
            'empresa_id' => 'required',
            'vacantes' => 'required',
            'fecha_convocatoria' => 'required',
            'puesto_id' => 'required',
            'contacto_id' => 'required'
        ]);
        $publicacion->update($request->all());
        //$publicacion->fill($request);
        //$publicacion->save();
        return redirect()->route('admin.publicaciones.index');
        //dd($request);
    }
    public function cambiar_estado($id){
        $publicacion=Publicacion::findOrFail($id);
        $publicacion->estado=($publicacion->estado=='1')?'0':'1';
        $publicacion->save();
        return redirect()->route('admin.publicaciones.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $publicacion=Publicacion::findOrFail($id);
        try{
            $publicacion->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$publicacion->puesto->nombre));
        }    
        return redirect()->route('admin.publicaciones.index');
    }
}
