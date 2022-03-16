<?php

namespace App\api;

use App\Models\Meta;
use Illuminate\Support\Facades\DB;

class MetaApi
{
    function getMeta()
    {
        $meta = Meta::all()->sortByDesc('id')->take(1);

        return $meta;

    }
    function getMetaMes()
    {
        $meta = Meta::all()->sortByDesc('id')->take(1);
        return $meta->pluck("mes")->first();
    }
    function getObjetivo()
    {
        $meta = Meta::all()->sortByDesc('id')->take(1);
        return $meta->pluck("objetivo")->first();
    }

    function getEquiinic()
    {
        $meta = Meta::all()->sortByDesc('id')->take(1);
        return $meta->pluck("equiinic")->first();

    }

    function getequifim()
    {
        $meta = Meta::all()->sortByDesc('id')->take(1);
        return $meta->pluck("equifim")->first();

        
    }

    function registraMeta($objetivo, $mes, $equinic, $equifim)
    {     
        
        $meta = new Meta();
        $meta->objetivo = $objetivo;
        $meta->mes = $mes;
        $meta->equiinic = $equinic;
        $meta->equifim = $equifim; 
        $meta->save();
    }
    function DeletaMeta($id)
    {
        $meta = Meta::find($id);
        $meta->delete();
        
    }
}
