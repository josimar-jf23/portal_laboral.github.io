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
        //$puestos=Puesto::all();
        $puestos=DB::table('publicaciones')->select('publicaciones.puesto_id as id','puestos.nombre')->distinct() ->leftJoin('puestos', 'publicaciones.puesto_id', '=', 'puestos.id')->get();
        //$anios=DB::table('publicaciones')->selectRaw('YEAR(fecha_convocatoria) as anio')->distinct()->get();
        //$anios=DB::select(DB::raw('select distinct date_format(fecha_convocatoria, "%Y") as anio from publicaciones'))->get();
        $anios=DB::select('select distinct YEAR(fecha_convocatoria) as anio from publicaciones');
        $meses=DB::select('select distinct MONTH(fecha_convocatoria) as mes from publicaciones');
        //$meses=Publicacion::select(DB::raw('MONTH(fecha_convocatoria) as mes'))->distinct()->get();
        //$meses=DB::table('publicaciones')->selectRaw('MONTH(fecha_convocatoria) as mes')->distinct()->get();
        //dd($meses);
        //dd($puestos);
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
