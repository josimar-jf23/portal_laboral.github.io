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

    }
    public function store(Request $request)
    {

    }
    public function edit($id){

    }
    public function update(Request $request,$id){

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
