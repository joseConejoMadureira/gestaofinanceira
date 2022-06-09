<?php

namespace App\api;

use App\Models\Investimentos;
use Illuminate\Support\Facades\DB;

class InvestimentosApi
{

    //
    function getInvestimentos()
    {
        $investimento = Investimentos::all()->sortByDesc('id')->take(1);    
        return $investimento->pluck("valor_atualizado")->first();
        
    }
    function getInvestimentosAll()
    {
        $investimento = Investimentos::all()->sortByDesc('id');    
        return $investimento;
        
    }
    //aplica
    function aplicaInvestimento($valor_aplica)
    {

        $valor_atualizado = $this->getInvestimentos();
        $valor_atualizado += $valor_aplica;
        $investimento = new Investimentos();
        
        $investimento->data_registro = date("Y/m/d");
        $investimento->valor= $valor_aplica;
        $investimento->modalidade= "aplicacao";
        $investimento->valor_atualizado= $valor_atualizado;
        $investimento->save();
        /*
        DB::insert(
            'insert   into "Investimento"  (data_registro,valor,modalidade ,valor_atualizado) values (?,?,?,?)',
            array(date("Y/m/d"), $valor_aplica, "aplicacao", $valor_atualizado)
        );
        */

        $saldo = new SaldoApi();
        $valor_aplica = $valor_aplica * -1;
        $saldo->atualizaSaldo($valor_aplica, 'Investimentos', 'aplicacao', 0);
    }
    //resgaste
    function ResgateInvestimento($valor_resgate)
    {

        $valor_atualizado = $this->getInvestimentos();
        $valor_atualizado -= $valor_resgate;

       
        $investimento = new Investimentos();
        
        $investimento->data_registro = date("Y/m/d");
        $investimento->valor= $valor_resgate * -1;
        $investimento->modalidade= "resgate";
        $investimento->valor_atualizado= $valor_atualizado;
        $investimento->save();
        


        $saldo = new SaldoApi();
        $valor_aplica = $valor_resgate;
        $saldo->atualizaSaldo($valor_resgate, 'resgate ', 'resgate', 0);
    }
    //desvalorizacao

    function InvestimentoDesvalorizacao($valor_desvalorizacao)
    {

        $valor_atualizado = $this->getInvestimentos();
        $valor_atualizado -= $valor_desvalorizacao;
        $valor_desvalorizacao_investimentos = $valor_desvalorizacao * -1;

        $investimento = new Investimentos();
        
        $investimento->data_registro = date("Y/m/d");
        $investimento->valor= $valor_desvalorizacao_investimentos;
        $investimento->modalidade= "desvalorizacao investimentos";
        $investimento->valor_atualizado= $valor_atualizado;
        $investimento->save();

        $patrimonioApi =  new PatrimonioApi();
        $patrimonioApi->atualizaPatrimonio();
    }
    //valorizacao

    function InvestimentoValorizacao($valor_valorizacao)
    {

        
        $investimento = new Investimentos();
        
        $investimento->data_registro = date("Y/m/d");
        $investimento->valor= $valor_valorizacao;
        $investimento->modalidade= "valorização investimentos";
        $investimento->valor_atualizado=  $this->getInvestimentos() + $valor_valorizacao;
        $investimento->save();

        $patrimonioApi =  new PatrimonioApi();
        $patrimonioApi->atualizaPatrimonio();
    }
    

    function graficoInvestimentos()
    {
        $mes = date("m");
        $ano = date("Y");
        $row = array();
        $valorAtualizado = 0;

        for ($i = 0; $i <= $mes; $i++) {
            $saldo = DB::Select('SELECT valor,modalidade FROM "Investimento"  WHERE EXTRACT(MONTH FROM data_registro) =' . $i . 'and EXTRACT(YEAR FROM data_registro) =' . $ano);

            foreach ($saldo as $value) {
                if ($value->modalidade == 'resgate') {
                    $value->valor = $value->valor * -1;
                }
                $valorAtualizado += $value->valor;
            }
            array_push($row, $valorAtualizado);
            $valorAtualizado = 0;
        }

        return  $row;
    }
}
