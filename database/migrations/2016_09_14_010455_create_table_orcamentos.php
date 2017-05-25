<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTableOrcamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamentos', function(Blueprint $t){
            $t->increments('id');
            $t->integer('cod_orcamento');
            $t->string('cliente', 45);
            $t->text('orcamento'); //PDF contendo o orçamento em detalhes
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
        Schema::drop('orcamentos');
    }
}
