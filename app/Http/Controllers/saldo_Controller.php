<?php

namespace App\Http\Controllers;


use App\api\SaldoApi;

class saldo_Controller extends Controller
{
    function saldo() {

        $saldoApi =  new SaldoApi();
        $saldo = $saldoApi->getListaSaldo();

        return view ('saldo')->with('saldo',$saldo);
    }

    function saldoAtualizado() {
        $saldoApi =  new SaldoApi();

        return $saldoApi->getSaldoAtualizado();
    }
    function saldoMes() {
        $saldoApi =  new SaldoApi();

        return $saldoApi->saldoMensal();
    }
    function saldoAno() {
        $saldoApi =  new SaldoApi();

        return $saldoApi->saldoAno();
    }
    function saldoGrafico() {
        $saldoApi =  new SaldoApi();
        $saldoApi->graficoSaldoInvestimentos();

        $dados = array(
            "saldo"   => $saldoApi->graficoSaldo(),
            "investimentos"  => $saldoApi->graficoSaldoInvestimentos()
        );

        return json_encode($dados);

    }


    function mesOK() {
        $saldoApi =  new SaldoApi();
        return $saldoApi->mesOK();

    }
    function livre() {
        $saldoApi =  new SaldoApi();
        return $saldoApi->livre();

    }
    function investir() {
        $saldoApi =  new SaldoApi();
        //return $saldoApi->investir();
        return 0;
    }
}
