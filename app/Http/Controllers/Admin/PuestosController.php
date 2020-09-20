<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Puesto;
use App\Area;
use App\Empresa;
use App\SubArea;

class PuestosController extends Controller
{
    public function index(){
        $puestos=Puesto::all();
        //dd($usuarios->paises);
        return view('admin.puestos.index',compact('puestos'));
    }
    public function create()
    {
        $areas=Area::all(); 
        $empresas=Empresa::all();       
        return view('admin.puestos.create',compact('empresas','areas'));
    }
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required',
            'empresa_id' => 'required',
            'subarea_id' => 'required'
        ]);
        //dd($request);
        $puesto=new Puesto();
        $puesto->nombre=$request->nombre;
        $puesto->descripcion=$request->descripcion;
        $puesto->empresa_id=$request->empresa_id;
        $puesto->subarea_id=$request->subarea_id;
        //dd($pais);
        $puesto->save();
        return redirect()->route('admin.puestos.index');
    }
    public function edit($id){
        $puesto=Puesto::where('id',$id)->first();
        $area_e=$puesto->subarea->area_id;
        $areas=Area::all();
        $empresas=Empresa::all();
        $subareas=SubArea::where('area_id',$area_e)->get();   
        //dd($ciudades);
        return view('admin.puestos.edit',compact('puesto','subareas','areas','empresas'));
    }
    public function update(Request $request,$id){
        $puesto=Puesto::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'empresa_id' => 'required',
            'subarea_id' => 'required'
        ]);
        //$departamento->fill($request);
        $puesto->nombre=$request->nombre;
        $puesto->descripcion=$request->descripcion;
        $puesto->empresa_id=$request->empresa_id;
        $puesto->subarea_id=$request->subarea_id;
        $puesto->save();
        return redirect()->route('admin.puestos.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $puesto=Puesto::findOrFail($id);
        try{
            $puesto->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$puesto->nombre));
        }    
        return redirect()->route('admin.puestos.index');
    }
}
