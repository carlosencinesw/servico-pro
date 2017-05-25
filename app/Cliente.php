<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'numero',
        'cidade',
        'bairro',
        'referencia',
        'telefone',
        'telefone2'
    ];

    public function servico()
    {
        return $this->hasMany('App\Servico');
    }
}
