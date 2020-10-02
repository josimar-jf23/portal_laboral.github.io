<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Empresa;
use App\Puesto;

class EmpleosController extends Controller
{
    public function index(Request $request){
        $puesto_id=$request->get('puesto_id');
        $empresa_id=$request->get('empresa_id');
        $fecha_convocatoria=$request->get('fecha_convocatoria');
        //dd($request);  
        $empleos=Publicacion::where('estado','1')
                ->orderBy('id', 'desc')
                ->puesto_id($puesto_id)
                ->empresa_id($empresa_id)
                ->fecha_convocatoria($fecha_convocatoria)
                ->paginate(6)
                ->setPath(route('empleos.index'));
        $puestos=Puesto::all();
        $empresas=Empresa::all();
        return view('empleos.index',compact('empleos','puestos','empresas','fecha_convocatoria','puesto_id','empresa_id'));
    }
    public function show($id)
    {
        //dd($id);
        $empleo=Publicacion::where('id',$id)->first();
        return view('empleos.show',compact('empleo'));
    }
}
