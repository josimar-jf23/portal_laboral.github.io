<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Detalle_Publicacion;
use App\Publicacion;
use Session;

class Detalle_PublicacionesController extends Controller
{
    public function index(){
        if(!empty(Session::get('publicacion_id'))){
            $publicacion=Publicacion::where('id',Session::get('publicacion_id'))->first();
            $detalle_publicaciones = Detalle_Publicacion::where('publicacion_id',Session::get('publicacion_id'))->get();
            return view('admin.detalle_publicaciones.index',compact('publicacion','detalle_publicaciones'));
        }
    }
    public function create(){
        return view('admin.detalle_publicaciones.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'caracteristica' => 'required',
            'orden' => 'required'
        ]);
        $detalle_publicacion=new Detalle_Publicacion($request->all());
        $detalle_publicacion->publicacion_id=Session::get('publicacion_id');
        $detalle_publicacion->save();
        return redirect()->route('admin.detalle_publicaciones.index');

    }
    public function v_previa(Request $request){
        $resul="";
        $ar=$request->valor;
        $detalle_publicacion=Detalle_Publicacion::where('id',$ar)->first();       
        $resul=$detalle_publicacion->caracteristica;
        echo $resul;
    }
    public function edit($id){
        $detalle_publicacion=Detalle_Publicacion::where('id',$id)->first();
        return view('admin.detalle_publicaciones.edit',compact('detalle_publicacion'));
    }
    public function update(Request $request,$id){
        $detalle_publicacion=Detalle_Publicacion::findOrFail($id);
        $request->validate([
            'caracteristica' => 'required',
            'orden' => 'required'
        ]);
        //dd($request);
        $detalle_publicacion->caracteristica=$request->caracteristica;
        $detalle_publicacion->orden=$request->orden;
        $detalle_publicacion->save();
        return redirect()->route('admin.detalle_publicaciones.index');
    }
    public function destroy($id)
    {
        $detalle_publicacion=Detalle_Publicacion::findOrFail($id);
        try{
            $detalle_publicacion->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar'));
        }    
        return redirect()->route('admin.detalle_publicaciones.index');
    }
}
