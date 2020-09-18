<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ContactosController extends Controller
{
    public function index(){
        //dd(Auth::user());
        $contactos=new Contacto::all();
        return view('admin.contactos.index',compact('contactos'));
    }
}
