<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\GastosApi;

class gastos_Controller extends Controller
{
    function gastos() {
        $gasto = new GastosApi();
        
        return view ('gastos')->with('gastos',$gasto->getGasto());
    }
    
    function gastos_ano() {
        $gasto = new GastosApi();
        
        return $gasto->gastoAno();
    }
    function gastoGrafico() {
        $gasto = new GastosApi();
        return json_encode($gasto->graficoGastos());
        
    }
    
}
