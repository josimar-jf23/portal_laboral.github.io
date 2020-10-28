<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\SubArea;
use App\Area;

class SubAreasController extends Controller
{

    
    public function index(){
        if(!empty(Session::get('area_id'))){
            $area=Area::where('id',Session::get('area_id'))->first();
            $subareas = SubArea::where('area_id',Session::get('area_id'))->get();
            return view('admin.subareas.index',compact('subareas','area'));
        }
    }
    public function create()
    {       
        return view('admin.subareas.create');
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required'
        ]);
        $subarea=new SubArea($request->all());
        $subarea->area_id=Session::get('area_id');
        //dd($subarea);   
        //dd($area);
        $subarea->save();
        return redirect()->route('admin.subareas.index');
    }

    public function edit($id){
        $subarea=SubArea::where('id',$id)->first();       
        //dd($ciudades);
        return view('admin.subareas.edit',compact('subarea'));
    }

    public function update(Request $request,$id){
        $subarea=SubArea::findOrFail($id);
        $request->validate([
            'nombre' => 'required'
        ]);
        $subarea->nombre=$request->nombre;
        $subarea->descripcion=$request->descripcion;
        
        $subarea->save();
        return redirect()->route('admin.subareas.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $subarea=SubArea::findOrFail($id);
        try{
            $subarea->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$subarea->nombre));
        }    
        return redirect()->route('admin.subareas.index');
    }
}
