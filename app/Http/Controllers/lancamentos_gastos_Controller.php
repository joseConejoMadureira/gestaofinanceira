<?php

namespace App\Http\Controllers;

use App\api\GastosApi;
use App\api\SaldoApi;

class lancamentos_gastos_Controller extends Controller
{
    function lacamentos_gastos_form() {
        
        
        return view('lancamentos_gastos');
    }
    function lacamentos_gastos() {
        
        $valor = request('valor', 0);
        $descricao = request('descricao', 0);
        $data_regi = request('data_reg', 0);
        
        $SaldoApi = new SaldoApi();
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $valor = $valor * -1;
        $SaldoApi->atualizaSaldo($valor, $descricao, 'gastos',$data_regi);
        
        
        return redirect('/lancamentos_gastos');
    }
    
    function gastos_mensal() {
        $gastoApi = new GastosApi();
        $gastoMensal =  $gastoApi->getGastoMensal();
        
        return $gastoMensal;
    }
}

