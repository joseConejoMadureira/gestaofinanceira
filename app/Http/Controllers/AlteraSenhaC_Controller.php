<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\AlterarSenha;

class AlteraSenhaC_Controller extends Controller
{
    function alteraSenha($param) {
        return view('alteraSenha');
    }
    
    function alterarSenhaMe(){
        $novaSenha = request('password', 0);
       
        
        $altera = new AlterarSenha();
        $altera->alterarSenha($novaSenha);
        
        return view('alteraSenha');
    }
}
