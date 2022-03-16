<?php

namespace App\Http\Controllers;

use App\api\Flagapi;
use App\api\InvestimentosApi;
use App\api\PatrimonioApi;

class PatrimonioController extends Controller
{
    function getPatrimonio() {
        
        $patrimonio = new PatrimonioApi();
        return $patrimonio->getPatrimonio();
    
    }
    function getPatrimonioView() {
        
        return view ('patrimonio');
    }
    
    function getInvestimentos() {
        
        $patrimonio = new PatrimonioApi();
        return $patrimonio->getInvestimentos();
        
    }
    function anos() {
        $patrimonio = new PatrimonioApi();
        return $patrimonio->anos();
        
    }
    
    function graficoPatrimonio() {
        
        $patrimonio = new PatrimonioApi();
        return $patrimonio->graficoPatrimonio();
        
    }
    function getInicFim() {
        
        $patrimonio = new PatrimonioApi();
        return $patrimonio->equiFim();
        
    }
    function getMetaAbc() {
        
        $patrimonio = new PatrimonioApi();
        return $patrimonio->getmetaAbc();
        
    }
    
}

