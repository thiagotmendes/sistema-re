<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// ADDONS PARA FUNCIONAMENTO COMPLETO DO SISTEMA
use Session;
use DB;
use App\Quotation;

class gridUsuarios extends Controller
{
  public  function form_cadastro(){
    $usuario = Session::get('usuario');
    return view('forms/cadastro-user',[ 'nome_usuario' => $usuario ]);
  }
}
