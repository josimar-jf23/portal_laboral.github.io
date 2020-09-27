<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Area;

class AreasController extends Controller
{

    public function index(){
        $areas=Area::all();
        //dd($areas);
        return view('admin.areas.index',compact('areas'));
    }
    public function show($id)
    {
        Session::put('area_id',$id);
        return redirect('/admin/subareas');
    }
    public function create()
    {       
        return view('admin.areas.create');
    }
    
    public function store(Request $request)
    {        
        $request->validate([
            'nombre' => 'required|unique:areas,nombre'
        ]);
        //$request->$timestamps = false;
        //dd($request);
        $area=new Area($request->all());
        //$area->nombre=$request->nombre;
        //dd($area);
        $area->save();
        return redirect()->route('admin.areas.index');
    }

    public function edit($id){
        $area=Area::where('id',$id)->first();       
        //dd($ciudades);
        return view('admin.areas.edit',compact('area'));
    }

    public function update(Request $request,$id){
        $area=Area::findOrFail($id);
        $request->validate([
            'nombre' => 'required|unique:areas,nombre,'.$area->id
        ]);
        $area->nombre=$request->nombre;
        $area->save();
        return redirect()->route('admin.areas.index');
        //dd($request);
    }
    public function destroy($id)
    {
        $area=Area::findOrFail($id);
        try{
            $area->delete();
        }catch (\Illuminate\Database\QueryException $e){
            return back()->with('error', ('Error no se puede eliminar a '.$area->nombre));
        }    
        return redirect()->route('admin.areas.index');
    }
}
