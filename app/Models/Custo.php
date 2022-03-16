<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    use HasFactory;
    protected  $table = 'custos';
    public $timestamps = false;
}
