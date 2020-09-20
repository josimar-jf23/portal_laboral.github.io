<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Suscriptor;

class SuscriptoresController extends Controller
{
    public function index(){
        $suscriptores=Suscriptor::all();
        //dd($usuarios->paises);
        return view('admin.suscriptores.index',compact('suscriptores')); 
    }
}
