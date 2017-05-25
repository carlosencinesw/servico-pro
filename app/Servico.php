<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'cod_os',
        'clientes_id',
        'produtos_id',
        'quantidade',
        'status_pagamento',
        'status_entrega',
        'observacoes'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'clientes_id');
    }


}
