<?php

namespace App\api;

use App\Models\Custo;
use Illuminate\Support\Facades\DB;

class CustoAPi
{
    function getCustos()
    {
        $custos = Custo::all()->sortByDesc('id');
        return $custos;
    }
    function registraDespesas($valor, $descricao)
    {
        $custos = new Custo();
        $custos->data_registro =date("Y/m/d");
        $custos->valor =$valor;
        $custos->descricao =$descricao;
        $custos->save();
    }
    function getTotal()
    {
        $query =  $this->getCustos();
        $total = 0;
        foreach ($query as $value) {
            $total += $value->valor;
        }
        return $total;
    }
    function DeletaDepesas($id)
    {
        $custos = new Custo();
        $custos = $custos->find($id);
        $custos->delete(); 
    }
}
