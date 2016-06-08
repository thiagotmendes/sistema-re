<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCamposUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('res_usuarios', function (Blueprint $table) {
          $table->string('email');
          $table->string('empresa');
          $table->string('telefone');
          $table->string('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('res_usuarios', function (Blueprint $table) {
          Schema::drop('usuario');
        });
    }
}
