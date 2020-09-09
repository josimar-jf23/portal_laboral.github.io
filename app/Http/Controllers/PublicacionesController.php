<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
