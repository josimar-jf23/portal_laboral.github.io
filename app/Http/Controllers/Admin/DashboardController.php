<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Suscriptor;
use Carbon;

class DashboardController extends Controller
{
    public function index(){
        $contador_suscripciones=Suscriptor::select(DB::raw('count(*) as total'), DB::raw('EXTRACT(YEAR FROM created_at) as anios'), DB::raw('EXTRACT(MONTH FROM created_at) as meses'))        
        ->groupBy('anios','meses')->get();
        //dd($contador_suscripciones);
        return view('admin.dashboard.index',compact('contador_suscripciones'));
    }
}
