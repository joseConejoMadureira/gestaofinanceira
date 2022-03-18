<?php

namespace App\Funcoes;
 
 class LogsE   {
     
    public  static function escrever($mensagem){
        $logs = config('app.logs');
        if($logs == 1){
            $arquivo = fopen('../logs/logs.log','a+'); 
            $texto = " " ;
            $texto .=  "### data log ---> ".date('d/m/y H:i:s');
            $texto .="  >>>>> : ". $mensagem ."  >>>>> #";
            $texto .= PHP_EOL;
            fwrite($arquivo, $texto);
            fclose($arquivo);        
        }    
    }

}