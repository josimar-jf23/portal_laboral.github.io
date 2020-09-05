<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Empresa;

class UsuariosController extends Controller
{
    public function index(){
        //$usuarios=DB::table('users')>join('empresas','users.empresas_id','=','empresas.id')->get();
        $usuarios=User::all();
        //dd($usuarios->empresa);
        return view('admin.usuarios.index',compact('usuarios'));
    }
   
    public function create()
    {
        $empresas=Empresa::where('estado','1')->get();
        //dd($empresas);
        return view('admin.usuarios.create',compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'min:6|confirmed|required_with:password_confirmed',
            'empresa_id' => 'required'
        ]);
        $usuario=new User($request->all());
        $usuario->password =Hash::make($usuario->password);
        //dd($usuario);
        $usuario->save();
        return redirect()->route('admin.usuarios.index');
    }

    public function edit($id){
        $usuario=User::where('id',$id)->first();
        $empresas=Empresa::where('estado','1')->get();
        return view('admin.usuarios.edit',compact('usuario','empresas'));
    }
    public function update(Request $request,$id){
        $user=User::findOrFail($id);
       //$user=User::where('id',$id)->first();
        $request->validate([
            'name' => 'required|max:255|unique:users,name,'.$user->id,
            'email' => 'required|max:255|unique:users,email,'.$user->id,
            'empresa_id' => 'required',
        ]);
        $user->fill($request->all());
        //dd($user);
        $user->estado=($request->estado!='')?'1':'0';
        /*
        if($request->estado){
            $user->estado=1;
        }else{
            $user->estado=0;
        }
        */
        $user->save();
        return redirect()->route('admin.usuarios.index');
    }
    public function destroy($id)
    {
        dd($id);
        /*
        $categoria=Categorias::findOrFail($id);
        $categoria->delete();
        return redirect()->route('admin.categorias.index');
        */
    }
}
