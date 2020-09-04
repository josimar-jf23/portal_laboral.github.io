<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsuariosController extends Controller
{
    public function index(){
        //$usuarios=DB::table('users')>join('empresas','users.empresas_id','=','empresas.id')->get();
        $usuarios=User::all();
        //dd($usuarios->empresa);
        return view('admin.usuarios.index',compact('usuarios'));
    }
}
