<?php

namespace App\api;


use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Saldo;

class GastosApi
{

    function getGasto()
    {
        $ano = date("Y");
        $gastos = Saldo::whereYear('data_registro', '=', $ano)
        ->where('modalidade', '=', 'gastos')
        ->get();
        $gastos = $gastos->sortByDesc('id'); 
        return $gastos;
    }


    function getGastoMensal()
    {
        $mes = date("m");
        $ano = date("Y");
        $resultado = 0;

        $gastoMensal = Saldo::whereYear('data_registro', '=', $ano)
        ->whereMonth('data_registro', '=', $mes)
        ->where('modalidade', '=', 'gastos')
        ->get();

        foreach ($gastoMensal as $value) {
            $resultado += $value->valor;
        }
        return $resultado;
    }



    function gastoAno()
    {
        $resultado = 0;
        $ano = date("Y");
        $gastoAno =   Saldo::whereYear('data_registro', '=', $ano)
        ->where('modalidade', '=', 'gastos')
        ->get();

        foreach ($gastoAno as $value) {
            $resultado += $value->valor;
        }

        return $resultado;
    }

    function graficoGastos()
    {
        $mes = date("m");
        $ano = date("Y");
        $row = array();
        $valorAtualizado = 0;

        for ($i = 0; $i <= $mes; $i++) {

            $gastos = Saldo::whereYear('data_registro', '=', $ano)
            ->where('modalidade', '=', 'gastos')
            ->whereMonth('data_registro', '=', $i )                       
            ->get();

            foreach ($gastos as $value) {

                $valorAtualizado += $value->valor;
            }
            array_push($row, $valorAtualizado);
            $valorAtualizado = 0;
        }
        return  $row;
    }
}
