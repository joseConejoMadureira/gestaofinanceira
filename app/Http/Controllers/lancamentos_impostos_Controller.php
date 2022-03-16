<?php

namespace App\Http\Controllers;

use App\api\SaldoApi;

class lancamentos_impostos_Controller extends Controller
{
    function lacamentos_impostos_form() {
        
        
        return view('lancamentos_impostos');
    }
    function lacamentos_impostos() {
        $data_regi = request('data_reg', 0);
        
        $valor = request('valor', 0);
        $descricao = request('descricao', 0);
        $SaldoApi = new SaldoApi();
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $valor = $valor * -1;
        $SaldoApi->atualizaSaldo($valor, $descricao, 'imposto',$data_regi);
        
        
        return redirect('/lancamentos_impostos');
    }
}
