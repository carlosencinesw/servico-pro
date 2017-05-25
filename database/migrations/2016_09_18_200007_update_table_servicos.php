<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateTableServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function(Blueprint $t){
            $t->string('dia_entrega')->after('quantidade');
            $t->string('turno_entrega')->after('dia_entrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function(Blueprint $t){
           $t->removeColumn('dia_entrega');
           $t->removeColumn('turno_entrega');
        });
    }
}
