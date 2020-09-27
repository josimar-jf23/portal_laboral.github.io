<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suscriptor;
use Session;

class SuscriptoresController extends Controller
{
    public function store(Request $request)
    {        
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:suscriptores,dni,'.$request->publicacion_id,
            'celular' => 'required',
        ]);
        $suscriptor=new Suscriptor($request->all());
        $suscriptor->save();
        Session::flash('flash_message','La postulacion se registro correctamente');
        return redirect()->route('empleos.index');

    }
}
