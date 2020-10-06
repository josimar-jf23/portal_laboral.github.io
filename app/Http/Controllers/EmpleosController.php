<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Empresa;
use App\Puesto;
use App\Visitante;
use Illuminate\Support\Facades\DB;

class EmpleosController extends Controller
{
    public function index(Request $request){
        $puesto_id=$request->get('puesto_id');
        $empresa_id=$request->get('empresa_id');
        $fecha_convocatoria=$request->get('fecha_convocatoria');
        $mes_convocatoria=$request->get('mes_convocatoria');
        $anio_convocatoria=$request->get('anio_convocatoria');
        //dd($request);  
        $empleos=Publicacion::where('estado','1')
                ->orderBy('id', 'desc')
                ->puesto_id($puesto_id)
                ->empresa_id($empresa_id)
                ->fecha_convocatoria($fecha_convocatoria)
                ->mes_convocatoria($mes_convocatoria)
                ->anio_convocatoria($anio_convocatoria)
                ->paginate(6)
                ->setPath(route('empleos.index'));
        $puestos=DB::table('publicaciones')->select('publicaciones.puesto_id as id','puestos.nombre')->distinct() ->leftJoin('puestos', 'publicaciones.puesto_id', '=', 'puestos.id')->get();
        $fechas=DB::table('publicaciones')->select('fecha_convocatoria')->get();
        $anios=array();
        $meses=array();
        foreach($fechas as $r){
            $date_y = date("Y",strtotime($r->fecha_convocatoria));
            $date_m = date("m",strtotime($r->fecha_convocatoria));
            array_push($anios,$date_y);
            array_push($meses,$date_m);
        }
        $anios=array_unique($anios);
        $meses=array_unique($meses);
        $empresas=Empresa::all();
        return view('empleos.index',compact('empleos','puestos','empresas','fecha_convocatoria','puesto_id','empresa_id','anios','anio_convocatoria','meses','mes_convocatoria'));
    }
    public function show($id)
    {
        //dd($id);
        $empleo=Publicacion::where('id',$id)->first();
        if(Visitante::where('publicacion_id',$id)->exists()){
            $visitante=Visitante::where('publicacion_id',$id)->first();
            $visitante->contador=($visitante->contador)+1;
            $visitante->save();
        }else{
            $visitante=new Visitante();
            $visitante->contador='1';
            $visitante->publicacion_id=$id;
            $visitante->save();
        }
        return view('empleos.show',compact('empleo'));
    }
}
