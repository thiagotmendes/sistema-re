<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuarios', function(Blueprint $table){
        $table->increments('idusuario');
        $table->string('nome');
        $table->string('email');
        $table->string('empresa');
        $table->string('telefone');
        $table->string('usuario');
        $table->string('senha');
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
      Schema::drop('usuario');
    }
}
