<?php

namespace App\Http\Controllers;

use App\api\SaldoApi;

class lancamentos_ajusteMais_Controller extends Controller
{
    function lacamentos_ajustesMais_form() {
        
        
        return view('lancamentos_ajustesMais');
    }
    function lacamentos_ajustesMais() {
        $data_regi = request('data_reg', 0);
        
        $valor = request('valor', 0);
        $descricao = request('descricao', 0);
        $SaldoApi = new SaldoApi();
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $SaldoApi->atualizaSaldo($valor, $descricao, 'ajusteMais',$data_regi);
        
        return redirect('/lacamentos_ajustesMais');
    }
    
   
}
