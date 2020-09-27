<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rubro;

class RubrosController extends Controller
{
    public function index(){
        $rubros=Rubro::all();
        //dd($usuarios->paises);
        return view('admin.rubros.index',compact('rubros'));
    }
    public function create()
    {       
        return view('admin.rubros.create');
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|unique:rubros,nombre'
        ]);
        $rubro=new Rubro();
        $rubro->nombre=$request->nombre;
        //dd($pais);
        $rubro->save();
        return redirect()->route('admin.rubros.index');
    }

    public function edit($id){
        $rubro=Rubro::where('id',$id)->first();       
        //dd($ciudades);
        return view('admin.rubros.edit',compact('rubro'));
    }

    public function update(Request $request,$id){
        $rubro=Rubro::findOrFail($id);
        $request->validate([
            'nombre' => 'required|unique:rubros,nombre,'.$rubro->id
        ]);
        //dd($request);
        $rubro->nombre=$request->nombre;
        $rubro->descripcion=$request->descripcion;
        $rubro->estado=$request->estado;
        $rubro->save();
        return redirect()->route('admin.rubros.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $rubro=Rubro::findOrFail($id);
        try{
            $rubro->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$rubro->nombre));
        }    
        return redirect()->route('admin.rubros.index');
    }
}
