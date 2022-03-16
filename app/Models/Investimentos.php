<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investimentos extends Model
{
    use HasFactory;
    protected  $table = 'investimentos';
    public $timestamps = false;
}
