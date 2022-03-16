<?php

namespace App\Http\Controllers;

use App\api\SaldoApi;

class lancamentos_despesas_Controller extends Controller
{
    function lacamentos_despesas_form() {
        
   
        return view('lancamentos_despesas');
    }
    function lacamentos_despesas_a() {
        $data_regi = request('data_reg', 0);
        
        $valor = request('valor', 0);
        $descricao = request('descricao', 0);
        $SaldoApi = new SaldoApi();
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $valor = $valor * -1;
        $SaldoApi->atualizaSaldo($valor, $descricao, 'despesas',$data_regi);
        
        
        return redirect('/lancamentos_despesas');
    }
    
    
}
