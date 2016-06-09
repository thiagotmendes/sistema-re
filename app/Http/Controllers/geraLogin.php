<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// ADDONS PARA FUNCIONAMENTO COMPLETO DO SISTEMA
use Session;
use DB;
use App\Quotation;



class geraLogin extends Controller
{
    public function userLogin(Request $request)
    {
      if ($request->input('_token')):
        $nome = $request->input('nome');
        $senha = $request->input('senha');

        $resultado = DB::select('select * from res_usuarios where usuario = :nome and senha = :senha', ['nome' => $nome, 'senha' => $senha]);
        //$resultado = DB::table('usuarios')->where('nome','=', '$nome')->get();

        $nome_resultado =  $resultado[0]->nome;
        //Session::forget('usuario');
        //$usuario = Session::get('usuario');
        if ($nome_resultado) {
          // Obtém algum dado da sessão...
          Session::put('usuario', ['nome' => $nome, 'senha' => $senha]);

          return redirect('/home');
        }
      endif;
    }

    public function desloga_sistema()
    {
      Session::flush();
      return redirect('/');
    }
}
