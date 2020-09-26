<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Departamento;
use App\Ciudad;
use App\SubArea;
use App\Puesto;
use App\Contacto;

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
    public function fetch_areas(Request $request){
        $resul="";
        $opc=$request->accion;
        switch ($opc) {
            case '0':
                $ar=$request->valor;
                $subareas=SubArea::where('area_id',$ar)->get();
                if(isset($subareas)){
                    $resul.='<option value="">Seleccionar</option>';
                    foreach ($subareas as $r) {
                        $resul.='<option value="'.$r->id.'">'.$r->nombre.'</option>';
                    }
                }else{
                    $resul.='<option value="">Sin Valor</option>';
                }               
                break;
            case '1':
                $pu=$request->valor;
                $em=$request->empresa;
                $puesto=Puesto::where('subarea_id',$pu)->where('empresa_id',$em)->get();
                if(isset($puesto)){
                    $resul.='<option value="">Seleccionar</option>';
                    foreach ($puesto as $r) {
                        $resul.='<option value="'.$r->id.'">'.$r->nombre.'</option>';
                    }
                }else{
                    $resul.='<option value="">Sin Valor</option>';
                } 
                break;
            case '2':
                $em=$request->valor;
                $contacto=Contacto::where('empresa_id',$em)->get();
                if(isset($contacto)){
                    $resul.='<option value="">Seleccionar</option>';
                    foreach ($contacto as $r) {
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
