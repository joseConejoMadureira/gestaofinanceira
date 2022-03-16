<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\api\InvestimentosApi;

class investimento_Controller extends Controller
{
    function investimento()
    {
        $investimentos = new InvestimentosApi();
        
        return view('investimento')->with('investimentos', $investimentos->getInvestimentosAll());
    }
    function getInvestimentoAtualizado()
    {
        $investimentos = new InvestimentosApi();
        
        return $investimentos->getInvestimentos();
    }
    function aplica_resgate()
    {
        
        $valor = strtoupper(request('valor', 0));
        $modalidade = request('modalidade', 0);
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $investimento = new InvestimentosApi();
        if ($modalidade =='aplicar'){
            $investimento->aplicaInvestimento($valor);
        }else if($modalidade =='resgate'){
            $investimento->ResgateInvestimento($valor);
            
        }else if($modalidade =='valorizacao'){
            $investimento->InvestimentoValorizacao($valor);
            
        }else if($modalidade =='desvalorizacao'){
            $investimento->InvestimentoDesvalorizacao($valor);
            
        }
        
       
        return redirect('/investimento');
    }
    

    function InvestimentoGrafico() {
        $grafico =  new InvestimentosApi();
        return json_encode($grafico->graficoInvestimentos());
        
    }
    
    
}
