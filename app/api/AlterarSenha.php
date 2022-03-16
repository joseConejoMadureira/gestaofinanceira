<?php

namespace App\api;

use App\Models\Users;
use Illuminate\Support\Facades\DB;

class AlterarSenha
{
    function alterarSenha($novaSenha)
    {
        $novaSenha =   password_hash($novaSenha, PASSWORD_BCRYPT, [12]);
        
        DB::update('update users set password = ?
        where id = 1', [$novaSenha]);
    }
}
