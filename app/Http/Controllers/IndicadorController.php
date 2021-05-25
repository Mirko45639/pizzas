<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    public function get_home(){
        return view('graficos.index');
    }
}
