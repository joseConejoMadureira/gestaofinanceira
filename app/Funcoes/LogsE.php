<?php

namespace App\Funcoes;

use Exception;

class LogsE
{

    public  static function escrever($mensagem)
    {
        $logs = config('app.logs');
        if ($logs == 1) {
            try {
                $arquivo = fopen('../logs/logs.log', 'a+');
                $texto = " ";
                $texto .=  "### data log ---> " . date('d/m/y H:i:s');
                $texto .= "  >>>>> : " . $mensagem . "  >>>>> #";
                $texto .= PHP_EOL;
                fwrite($arquivo, $texto);
                fclose($arquivo);
            } catch (Exception $e) {
                $erro = '<span style="color:#FF0000;text-align:center;">';
                $erro .= $e->getMessage();
                $erro .= '</span>';
                echo $erro;
            }
        }
    }
}
