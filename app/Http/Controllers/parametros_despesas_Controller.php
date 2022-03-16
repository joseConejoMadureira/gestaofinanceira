<?php

namespace App\Http\Controllers;

use App\api\CustoAPi;

class parametros_despesas_Controller extends Controller
{    
    
    function getDespesas() {
        $despeas =  new CustoAPi();
         
         return view('parametros_despesas')->with('despesas',$despeas->getCustos());
    }
    function registraDespesas() {
        $valor = request('valor', 0);
        $descricao = request('descricao', 0);
        
        $valor =  str_replace(".","",request('valor', 0));
        $valor = str_replace(",",".",$valor);
        
        
        $despeas =  new CustoAPi();
        $despeas->registraDespesas($valor, $descricao);
        
        return redirect('parametros_despesas');
    }
    function getTotal() {
        $despeas =  new CustoAPi();
        
        return $despeas->getTotal();
    }
    function deletaDepesas() {
        $id_ac  = request('id', 0);
        $despeas =  new CustoAPi();
        $despeas->DeletaDepesas($id_ac);
        
        return redirect('parametros_despesas');
    }
}
