<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTableClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function(Blueprint $t){
            $t->increments('id');
            $t->string('nome', 45);
            $t->string('endereco_entrega', 50);
            $t->string('numero', 5);
            $t->string('cidade', 45);
            $t->string('bairro', 30);
            $t->string('referencia');
            $t->string('telefone', 15);
            $t->string('telefone2', 15);
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
        Schema::drop('clientes');
    }
}
