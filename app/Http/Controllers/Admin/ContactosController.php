<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Contacto;
use App\Empresa;

class ContactosController extends Controller
{
    public function index(){
        //dd(Auth::user());
        $contactos=Contacto::all();
        return view('admin.contactos.index',compact('contactos'));
    }
    public function create()
    {
        $empresas=Empresa::all();
        return view('admin.contactos.create',compact('empresas'));
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required',
            'celular' => 'required',
            'empresa_id' => 'required'
        ]);
        //dd($request);
        $contacto=new Contacto();
        $contacto->nombre=$request->nombre;
        $contacto->email=$request->email;
        $contacto->celular=$request->celular;
        $contacto->empresa_id=$request->empresa_id;
        //dd($pais);
        $contacto->save();
        return redirect()->route('admin.contactos.index');
    }

    public function edit($id){
        $contacto=Contacto::where('id',$id)->first();
        $empresas=Empresa::all();     
        //dd($ciudades);
        return view('admin.contactos.edit',compact('contacto','empresas'));
    }

    public function update(Request $request,$id){
        $contacto=Contacto::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'celular' => 'required',
            'empresa_id' => 'required'
        ]);
        //$departamento->fill($request);
        $contacto->nombre=$request->nombre;
        $contacto->email=$request->email;
        $contacto->celular=$request->celular;
        $contacto->empresa_id=$request->empresa_id;
        $contacto->save();
        return redirect()->route('admin.contactos.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $contacto=Contacto::findOrFail($id);
        try{
            $contacto->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$contacto->nombre));
        }    
        return redirect()->route('admin.contactos.index');
    }
}
