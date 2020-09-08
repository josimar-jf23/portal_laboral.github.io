<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empresa;
use App\Rubro;
use App\Pais;

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
            'nombre' => 'required|max:255',
            'tipo_doc' => 'required',
            'num_doc' => 'required',
            'ciudad_id' => 'required',
            'rubro_id' => 'required'
        ]);
        
        $request=$request->except('pais_id');
        //dd($request);
        $empresa=new Empresa($request);
        //dd($empresa);
        $empresa->save();
        return redirect()->route('admin.empresas.index');
    }

    public function edit($id){
        $empresa=Empresa::where('id',$id)->first();
        $paises=Pais::all();
        return view('admin.empresas.edit',compact('empresa','paises'));
    }
    
}
