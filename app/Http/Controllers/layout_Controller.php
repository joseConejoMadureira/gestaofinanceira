<?php

namespace App\Http\Controllers;

use App\api\FlagApi;



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
