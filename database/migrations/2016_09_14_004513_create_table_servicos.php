<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTableServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function(Blueprint $t){
            $t->increments('id');
            $t->integer('cod_os');
            $t->integer('clientes_id', false, true);
            $t->integer('produtos_id', false, true);
            $t->integer('quantidade');
            $t->char('status_pagamento', 1);
            $t->char('status_entrega', 1);
            $t->string('observacoes');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicos');
    }
}
