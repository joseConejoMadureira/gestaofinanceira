<?php

namespace App\api;

use App\Models\Investimentos;
use Illuminate\Support\Facades\DB;
use App\Models\Saldo;
use PhpParser\Node\Stmt\Foreach_;
use  App\Funcoes\LogsE;
use Illuminate\Support\Facades\Log;

class SaldoApi
{
    function getSaldoAtualizado()
    {
        $saldo = Saldo::all()->sortByDesc('id')->take(1);  
        //Logs  
        
        Log::debug('Saldo log: '. strval(Saldo::all()));
        Log::debug('Saldo: '. strval($saldo->pluck("valor_atualizado")->first()));
        
        return $saldo->pluck("valor_atualizado")->first();
    }
    function getListaSaldo()
    {
        $ano = date("Y");
        $saldos = Saldo::whereYear('data_registro', '=', $ano)->get();
        $saldos = $saldos->sortByDesc('id'); 
        return $saldos;
    }

    function atualizaSaldo($valor, $descricao, $modalidade, $data_regi)
    {
    
        $valor_atualizado =   doubleval($this->getSaldoAtualizado()); 
        $valor_atualizado += $valor; 
        if ($data_regi != 0) {
            $data_regi = $data_regi;
        } else {
            $data_regi =  date("Y/m/d");
        }
        $saldo = new Saldo();
        $saldo->valor = $valor;
        $saldo->descricao = $descricao;
        $saldo->modalidade = $modalidade;
        $saldo->valor_atualizado = $valor_atualizado;
        $saldo->data_registro = $data_regi;
        $saldo->save();

        $patrimonioApi =  new PatrimonioApi();
        $patrimonioApi->atualizaPatrimonio();
    }

    function saldoMensal()
    {

        $resultado = 0;
        $mes = date("m");
        $ano = date("Y");

        $saldoMes =   Saldo::whereYear('data_registro', '=', $ano)
        ->whereMonth('data_registro', '=', $mes)                       
        ->get();

        foreach ($saldoMes as $value) {
            $resultado += $value->valor;
        }

        return $resultado;
    }

    function saldoAno()
    {
        
        $resultado = 0;
        $ano = date("Y");
        $saldoAno = Saldo::whereYear('data_registro', '=', $ano)->get();
        foreach ($saldoAno as $value) {
            $resultado += $value->valor;
        }
        return $resultado;
    }

    function graficoSaldo()
    {
        $mes = date("m");
        $ano = date("Y");
        $row = array();
        $valorAtualizado = 0;

        for ($i = 0; $i <= $mes; $i++) {
            $saldo =  Saldo::whereYear('data_registro', '=', $ano)
            ->whereMonth('data_registro', '=', $i )                       
            ->get();
            
            foreach ($saldo as $value) {
                $valorAtualizado += $value->valor;
            }
            array_push($row, $valorAtualizado);
            $valorAtualizado = 0;
        }

        return  $row;
    }

    function graficoSaldoInvestimentos()
    {
        $mes = date("m");
        $ano = date("Y");
        $row = array();
        $valorAtualizado = 0;

        for ($i = 0; $i <= $mes; $i++) {
            //$saldo = SaldInoDB::Select("SELECT valor FROM investimentos WHERE EXTRACT(MONTH FROM data_registro) = $i and EXTRACT(YEAR FROM data_registro) = $ano");
            $saldo =  Investimentos::whereYear('data_registro', '=', $ano)
            ->whereMonth('data_registro', '=', $i )                       
            ->get();
        
            foreach ($saldo as $value) {
                $valorAtualizado += $value->valor;
            }
            array_push($row, $valorAtualizado);
            $valorAtualizado = 0;
        }

        return  $row;
    }
//verificar depois
    function livre()
    {

        $meta = new MetaApi();
        $custoAPi = new CustoAPi();
        $soma = 0;
        $imposto = 0;

        $livre = ceil($this->saldoMensal());

        $soma += $meta->getMetaMes();
        $soma += $imposto;
        $soma += $custoAPi->getTotal();


        $livre -= ceil($soma);

        return ceil($livre);
    }
    function investir()
    {

        $custoAPi = new CustoAPi();
        $soma = 0;
        $imposto = 0;

        $livre = ceil($this->saldoMensal());

        $soma += $imposto;
        $soma += $custoAPi->getTotal();

        $livre -= ceil($soma);

        return ceil($livre);
    }
}
