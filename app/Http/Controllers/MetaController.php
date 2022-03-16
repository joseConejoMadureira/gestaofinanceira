<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\api\MetaApi;

class MetaController extends Controller
{
    
    function getMeta() {
        $meta = new MetaApi();
   $dados =       $meta->getMeta();
   return view('parametros_ajustes')->with('meta',$dados);
    }
    
    function getMetaMes() {
        $meta = new MetaApi();
        return $meta->getMetaMes();
    }
    function getObjetivo() {
        $meta = new MetaApi();
        return $meta->getObjetivo();
    }
    
    function getEquiinic() {
        $meta = new MetaApi();
        return $meta->getEquiinic();
    }
    function getEquifim() {
        $meta = new MetaApi();
        return $meta->getequifim();
    }
    
    
    function DeletaMeta() {
        $id = request('id', 0);
        $meta = new MetaApi();
        $meta->DeletaMeta($id);
        return redirect('/parametros_ajustes');
    }
    function registraMesMeta() {
        
        $valor =  str_replace(".","",request('meta', 0));
        $valor = str_replace(",",".",$valor);
        
        
        $mes =  str_replace(".","",request('mes', 0));
        $mes = str_replace(",",".",$mes);
        
        $equiinic =  str_replace(".","",request('equiinic', 0));
        $equiinic = str_replace(",",".",$equiinic);
     
        $equifim =  str_replace(".","",request('equifim', 0));
        $equifim = str_replace(",",".",$equifim);
        
        
        
        $meta = new MetaApi();
        
        $meta->registraMeta($valor, $mes,$equiinic,$equifim);
     return   redirect('/parametros_ajustes');
    }
    
}
