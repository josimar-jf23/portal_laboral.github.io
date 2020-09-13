<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empresa;
use App\Rubro;
use App\Pais;
use App\Departamento;
use App\Ciudad;

class EmpresasController extends Controller
{

    
    public function index(){
        $empresas=Empresa::where('estado',1)
                    ->orderBy('nombre','asc')->get();
        //dd($usuarios->empresa);
        return view('admin.empresas.index',compact('empresas'));
    }
    public function create()
    {     
        $paises=Pais::all();
        $rubros=Rubro::all();   
        return view('admin.empresas.create',compact('paises','rubros'));
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|max:255|unique:users,name',
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'ciudad_id' => 'required',
            'rubro_id' => 'required'
        ]);
        
        $request=$request->except('pais_id','departamento_id');
        //dd($request);
        $empresa=new Empresa($request);
        //dd($empresa);
        $empresa->save();
        return redirect()->route('admin.empresas.index');
    }

    public function edit($id){
        $empresa=Empresa::where('id',$id)->first();
        $pais_e=$empresa->ciudad->departamento->pais_id;
        $depa_e=$empresa->ciudad->departamento_id;
        $paises=Pais::all();
        $departamentos=Departamento::where('pais_id',$pais_e)->get();
        $ciudades=Ciudad::where('departamento_id',$depa_e)->get();
        $rubros=Rubro::all();        
        //dd($ciudades);
        return view('admin.empresas.edit',compact('empresa','rubros','paises','departamentos','ciudades'));
    }

    public function update(Request $request,$id){
        $empresa=Empresa::findOrFail($id);
        $request->validate([
            'nombre' => 'required|max:255|unique:empresas,nombre,'.$empresa->id,
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'ciudad_id' => 'required',
            'rubro_id' => 'required'
        ]);
        $request=$request->except('pais_id','departamento_id');
        $empresa->fill($request);
        $empresa->save();
        return redirect()->route('admin.empresas.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $empresa=Empresa::findOrFail($id);
        $empresa->estado=($empresa->estado=='1')?'0':'';
        $empresa->save();
        //dd($id);        
        return redirect()->route('admin.empresas.index');
    }
    
}
