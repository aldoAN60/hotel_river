<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class facturasController extends Controller
{
    public function mostrar_facturas(){
        return view('facturas');
    }
}
