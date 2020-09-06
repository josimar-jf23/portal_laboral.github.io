<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empresa;

class EmpresasController extends Controller
{
    public function index(){
        $empresas=Empresa::where('estado',1)
                    ->orderBy('nombre','asc')->get();
        //dd($usuarios->empresa);
        return view('admin.empresas.index',compact('empresas'));
    }
    public function create()
    {        
        return view('admin.empresas.create');
    }
}
