<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnexosUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('anexoUsuario',function(Blueprint $table){
        $table->increments('idanexoUsuario');
        $table->string('idusuario');
        $table->string('assunto');
        $table->string('observacao');
        $table->string('patchArquivo');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('anexoUsuario');
    }
}
