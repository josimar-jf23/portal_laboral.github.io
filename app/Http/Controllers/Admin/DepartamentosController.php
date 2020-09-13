<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use App\Pais;

class DepartamentosController extends Controller
{

   
    public function index(){
        $departamentos=Departamento::all();
        //dd($usuarios->paises);
        return view('admin.departamentos.index',compact('departamentos'));
    }
    public function create()
    {
        $paises=Pais::all();
        return view('admin.departamentos.create',compact('paises'));
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required'
        ]);
        //dd($request);
        $departamento=new Departamento();
        $departamento->nombre=$request->nombre;
        $departamento->ubigeo=$request->ubigeo;
        $departamento->pais_id=$request->pais_id;
        //dd($pais);
        $departamento->save();
        return redirect()->route('admin.departamentos.index');
    }

    public function edit($id){
        $departamento=Departamento::where('id',$id)->first();
        $paises=Pais::all();     
        //dd($ciudades);
        return view('admin.departamentos.edit',compact('departamento','paises'));
    }

    public function update(Request $request,$id){
        $departamento=Departamento::findOrFail($id);
        $request->validate([
            'nombre' => 'required'
        ]);
        //$departamento->fill($request);
        $departamento->nombre=$request->nombre;
        $departamento->ubigeo=$request->ubigeo;
        $departamento->pais_id=$request->pais_id;
        $departamento->save();
        return redirect()->route('admin.departamentos.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $departamento=Departamento::findOrFail($id);
        try{
            $departamento->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$departamento->nombre));
        }    
        return redirect()->route('admin.departamentos.index');
    }
}
