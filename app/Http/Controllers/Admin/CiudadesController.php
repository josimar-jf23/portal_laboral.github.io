<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ciudad;
use App\Departamento;
use App\Pais;

class CiudadesController extends Controller
{

    
    public function index(){
        $ciudades=Ciudad::all();
        //dd($usuarios->paises);
        return view('admin.ciudades.index',compact('ciudades'));
    }
    public function create()
    {
        $paises=Pais::all();        
        return view('admin.ciudades.create',compact('paises'));
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required'
        ]);
        //dd($request);
        $ciudad=new Ciudad();
        $ciudad->nombre=$request->nombre;
        $ciudad->ubigeo=$request->ubigeo;
        $ciudad->departamento_id=$request->departamento_id;
        //dd($pais);
        $ciudad->save();
        return redirect()->route('admin.ciudades.index');
    }

    public function edit($id){
        $ciudad=Ciudad::where('id',$id)->first();
        $pais_e=$ciudad->departamento->pais_id;
        $paises=Pais::all();
        $departamentos=Departamento::where('pais_id',$pais_e)->get();   
        //dd($ciudades);
        return view('admin.ciudades.edit',compact('ciudad','departamentos','paises'));
    }

    public function update(Request $request,$id){
        $ciudad=Ciudad::findOrFail($id);
        $request->validate([
            'nombre' => 'required'
        ]);
        //$departamento->fill($request);
        $ciudad->nombre=$request->nombre;
        $ciudad->ubigeo=$request->ubigeo;
        $ciudad->departamento_id=$request->departamento_id;
        $ciudad->save();
        return redirect()->route('admin.ciudades.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $ciudad=Ciudad::findOrFail($id);
        try{
            $ciudad->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$ciudad->nombre));
        }    
        return redirect()->route('admin.ciudades.index');
    }
}
