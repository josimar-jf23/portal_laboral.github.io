<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;

class EmpleosController extends Controller
{
    public function index(){
        $empleos=Publicacion::where('estado','1')->paginate(12);
        //dd($usuarios->paises);
        return view('empleos.index',compact('empleos'));
    }
    public function show($id)
    {
        //dd($id);
        $empleo=Publicacion::where('id',$id)->first();
        return view('empleos.show',compact('empleo'));
    }
}
