<?php

namespace App\Http\Controllers;

use App\api\GastosApi;
use App\api\SaldoApi;

class lancamentos_ajustesMenos_Controller extends Controller
{
    function lacamentos_ajustesMenos_form() {
        
        
        return view('lancamentos_ajustesMenos');
    }
    function lacamentos_ajustesMenos() {
        $data_regi = request('data_reg', 0);
        
        $valor = request('valor', 0);
        $descricao = request('descricao', 0);
        $SaldoApi = new SaldoApi();
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        $valor = $valor * -1;
        $SaldoApi->atualizaSaldo($valor, $descricao, 'ajustesMenos',$data_regi);
        
        
        return redirect('/lacamentos_ajustesMenos');
    }
    
}
