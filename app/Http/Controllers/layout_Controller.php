<?php

namespace App\Http\Controllers;

use App\api\FlagApi;
use App\Funcoes\LogsE;


class layout_Controller extends Controller
{
    function home() {
        $flag = new FlagApi();
        $flag->atualizaGraficoPatrimomnio();
        
        return view ('layout');
    } 
    
    function atualizar() {
        
        return redirect("/");
    }
}
