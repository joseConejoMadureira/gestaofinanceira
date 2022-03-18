<?php

namespace App\api;

use Illuminate\Support\Facades\DB;
use App\Models\Patrimonio;
use App\api\CustoAPi;
use App\Funcoes\LogsE;

class PatrimonioApi
{
    function getPatrimonio()
    {
        $patrimonio = Patrimonio::all()->sortByDesc('id')->take(1);
        
        $patrimonio =$patrimonio->pluck("valor")->first();
        $resultado = 0;
        $resultado = str_replace(",", "", strval(number_format($patrimonio, 0)));
        return $resultado;
    }
    function getPatrimonioView()
    {
        $ano = date("Y");
        $patrimonio = Patrimonio::whereYear('data_registro', '=', $ano)->get();
        $patrimonio = $patrimonio->sortByDesc('id');         
        return $patrimonio;
    }
    function atualizaPatrimonio()
    {

        $patrimonioAdd = 0;
        $saldoApi = new SaldoApi();
        $investimentosApi = new InvestimentosApi();
        $patrimonioAdd += $saldoApi->getSaldoAtualizado();
        $patrimonioAdd += $investimentosApi->getInvestimentos();
        $patrimonio = new Patrimonio();
        $patrimonio->data_registro = date("Y/m/d");
        $patrimonio->valor = $patrimonioAdd;
        $patrimonio->save();
        LogsE::escrever("funcao atualizaPatrimonio()".strval($patrimonio));
    }

    function getInvestimentos()
    {

        $investimentosApi = new InvestimentosApi();


        $patrimonio = 0;
        $patrimonio += $investimentosApi->getInvestimentos();


        return $patrimonio;
    }

    function anos()
    {
        $custoAPi   = new CustoAPi();
        $total_custos = $custoAPi->getTotal();
        $total = $this->getPatrimonio() / ($total_custos * 12);
        return number_format($total, 2);
    }

    function graficoPatrimonio()
    {

        $mes = date("m");
        $ano = date("Y");
        $row = array();
        $valorAtualizado = 0;

        for ($i = 0; $i <= $mes; $i++) {
            $saldoPatrimonio =   Patrimonio::whereYear('data_registro', '=', $ano)
            ->whereMonth('data_registro', '=', $i )                       
            ->get()
            ->sortByDesc('id')
            ->take(1);

            foreach ($saldoPatrimonio as $value) {
                $valorAtualizado += str_replace(",", "", strval(number_format($value->valor, 2)));;
            }
            array_push($row, $valorAtualizado);
            $valorAtualizado = 0;
        }

        return  $row;
    }
    function equiFim()
    {
        $meta = new MetaApi();


        return $this->getPatrimonio() - $meta->getequifim();
    }
    function getmetaAbc()
    {
        $meta = new MetaApi();

        return $this->getPatrimonio() - $meta->getObjetivo();
    }
}
