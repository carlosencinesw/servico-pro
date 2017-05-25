<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'cod_orcamento',
        'cliente',
        'orcamento'
    ];
}
