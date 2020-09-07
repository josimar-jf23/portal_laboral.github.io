<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Departamento;
use App\Ciudad;

class PaisDepartamentoCiudadController extends Controller
{
    public function fetch(Request $request){
        $resul="";
        $opc=$request->accion;
        switch ($opc) {
            case '0':
                $pa=$request->valor;
                $depart=Departamento::where('pais_id',$pa)->get();
                if(isset($depart)){
                    $resul.='<option value="">Seleccionar</option>';
                    foreach ($depart as $r) {
                        $resul.='<option value="'.$r->id.'">'.$r->nombre.'</option>';
                    }
                }else{
                    $resul.='<option value="">Sin Valor</option>';
                }                
                break;
            case '1':
                $de=$request->valor;
                $ciuda=Ciudad::where('departamento_id',$de)->get();
                if(isset($ciuda)){
                    $resul.='<option value="">Seleccionar</option>';
                    foreach ($ciuda as $r) {
                        $resul.='<option value="'.$r->id.'">'.$r->nombre.'</option>';
                    }
                }else{
                    $resul.='<option value="">Sin Valor</option>';
                } 
                break;
            default:
                
                break;
        }
        echo $resul;
    }
}
