<?php

namespace App\Http\Controllers;

use App\api\MetaApi;
use App\api\PatrimonioApi;

class GaugeController extends Controller
{
    function gauge() {
        $metaApi =     new MetaApi();
        $PatrimonioApi  = new  PatrimonioApi();
        
        $dados = array(
            "equiinic"   => $metaApi->getEquiinic(),
            "equifim"  => $metaApi->getequifim(),
            "investimentos"  => $PatrimonioApi->getInvestimentos(),
            "patrimonio" => $PatrimonioApi->getPatrimonio(),
            "meta" => $metaApi->getObjetivo()
        );
        
        return json_encode($dados);
        
    } 
}
