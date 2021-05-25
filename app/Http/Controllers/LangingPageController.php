<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangingPageController extends Controller
{
    public function get_home(){
        return view('home.index');
    }
    public function get_carrito(){
        return view('home.carrito');
    }
}
