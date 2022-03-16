<?php

namespace App\Http\Controllers;

use App\api\SaldoApi;

class lancamentos_receita_Controller extends Controller
{
    function lacamentos_receita_form() {
        
        
        return view('lancamentos_receita');
    }
    function lacamentos_receita() {
        $valor = request('valor', 0);
        $data_regi = request('data_reg', 0);
        $descricao = request('descricao', 0);
        $SaldoApi = new SaldoApi();
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $SaldoApi->atualizaSaldo($valor, $descricao, 'receita',$data_regi);
        
        
        return redirect('/lancamentos_receita');
    }
    
   
}
