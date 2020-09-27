<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pais;

class PaisesController extends Controller
{

      
    public function index(){
        $paises=Pais::all();
        //dd($usuarios->paises);
        return view('admin.paises.index',compact('paises'));
    }
    public function create()
    {       
        return view('admin.paises.create');
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'abrev' => 'required|max:10|unique:paises,abrev',
            'nombre' => 'required|unique:paises,nombre'
        ]);
        //$request->$timestamps = false;
        //dd($request);
        $pais=new Pais();
        $pais->abrev=$request->abrev;
        $pais->nombre=$request->nombre;
        //dd($pais);
        $pais->save();
        return redirect()->route('admin.paises.index');
    }

    public function edit($id){
        $pais=Pais::where('id',$id)->first();       
        //dd($ciudades);
        return view('admin.paises.edit',compact('pais'));
    }

    public function update(Request $request,$id){
        $pais=Pais::findOrFail($id);
        $request->validate([
            'abrev' => 'required|max:10|unique:paises,abrev,'.$pais->id,
            'nombre' => 'required|unique:paises,nombre,'.$pais->id
        ]);
        $pais->abrev=$request->abrev;
        $pais->nombre=$request->nombre;
        $pais->save();
        return redirect()->route('admin.paises.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $pais=Pais::findOrFail($id);
        try{
            $pais->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$pais->nombre));
        }    
        return redirect()->route('admin.paises.index');
    }
}
