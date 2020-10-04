<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Suscriptor;
use App\Publicacion;
use Session;

class SuscriptoresController extends Controller
{
    public function index(){
       // $suscriptores=Suscriptor::all();
        //dd($usuarios->paises);
        //return view('admin.suscriptores.index',compact('suscriptores')); 
        if(!empty(Session::get('publicacion_id'))){
            $publicacion=Publicacion::where('id',Session::get('publicacion_id'))->first();
            $suscriptores = Suscriptor::where('publicacion_id',Session::get('publicacion_id'))->get();
            return view('admin.suscriptores.index',compact('publicacion','suscriptores'));
        }else{
            return back();
        }
    }
}
