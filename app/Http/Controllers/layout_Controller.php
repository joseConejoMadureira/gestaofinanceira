<?php

namespace App\Http\Controllers;

use App\api\FlagApi;
use App\Funcoes\LogsE;


class layout_Controller extends Controller
{
    function home() {
        LogsE::escrever("saldo funcão get saldo atualizado " );
        $flag = new FlagApi();
        $flag->atualizaGraficoPatrimomnio();
        
        return view ('layout');
    } 
    
    function atualizar() {
        
        return redirect("/");
    }
}
