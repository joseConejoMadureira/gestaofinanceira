<?php

namespace App\api;

use App\Models\Flag;
use Illuminate\Support\Facades\DB;

class FlagApi
{
    function atualizaGraficoPatrimomnio()
    {

        $saldo = new SaldoApi();
        $flag = Flag::all()->sortByDesc('id')->take(1);
        $flagId =  $flag->pluck("id")->first();
        $flagData  = $flag->pluck("data_registro")->first();
        $mes = date("m");
        $partes = explode("-", $flagData);
        $mesBanco = $partes[1];
        if ($mesBanco != $mes) {           
            $saldo->atualizaSaldo(1, 'Atualiza Grafico Patrimonio', 'Atualiza Grafico Patrimonio', 0);
            $saldo->atualizaSaldo(-1, 'Atualiza Grafico Patrimonio', 'Atualiza Grafico Patrimonio', 0);
            $flag->data_registro = date("Y/m/d"); 
            $flag->save();    
        }
    }
}
