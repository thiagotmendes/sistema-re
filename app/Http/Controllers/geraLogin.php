<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// ADDONS PARA FUNCIONAMENTO COMPLETO DO SISTEMA
use Session;
use DB;
use App\Quotation;
// objeto geraLogin
class geraLogin extends Controller
{
    // função para logar no sistema
    public function userLogin(Request $request)
    {
      if ($request->input('_token')):
        $nome = $request->input('nome');
        $senha = $request->input('senha');
        $resultado = DB::select('select * from res_usuarios where usuario = :nome and senha = :senha', ['nome' => $nome, 'senha' => $senha]);
        if(!empty($nome)){
          if(!empty($senha)){
            $nome_resultado =  $resultado[0]->nome;
            if ($nome_resultado) {
              // Obtém algum dado da sessão...
              Session::put('usuario', ['nome' => $nome]);
              Session::put('tipoUsuario', ['tipouser' => $resultado[0]->tipoUsuario]);
              if ($resultado[0]->tipoUsuario == 2) {
                return redirect('/home');
              } else {
                return redirect('/dashuser');
              }
            }
          } else {
            return redirect('/?msg=erro');
          }
        } else {
          return redirect('/?msg=erro');
        }
      endif;
    }

    public function desloga_sistema()
    {
      Session::flush();
      return redirect('/');
    }
}
