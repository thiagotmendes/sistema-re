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
  // GERA O FORMULARIO DE CADASTRO DO USUARIO E PASSA A SESSÃO
  public  function form_cadastro()
  {
    $usuario = Session::get('usuario');
    return view('forms/cadastro-user',[ 'nome_usuario' => $usuario ]);
  }
  //REALIZA O CADASTRO DOS USUARIOS VIA POST COM BULD->INSERT
  public function postForm(Request $formUsuario)
  {
    $nome     = $formUsuario->nome;
    $email    = $formUsuario->email;
    $empresa  = $formUsuario->empresa;
    $telefone = $formUsuario->telefone;
    $usuario  = $formUsuario->usuario;
    $senha    = $formUsuario->senha;
    if ($formUsuario->_token) {
      DB::table('usuarios')->insert(
        [
          'nome'        => $nome,
          'email'       => $email,
          'empresa'     => $email,
          'telefone'    => $telefone,
          'usuario'     => $usuario,
          'senha'       => $senha,
          'created_at'  =>  DB::raw('now()')
        ]
      );
      // FAZ O REDIRECIONAMENTO PARA O FORMULARIO PASSANDO O PARAMETRO MSG PARA SUCESSO
      return redirect()->route('cadastrar-usuarios',['msg' => 1]);
    }
  }

  // GERA O GRID COM ALISTA DOS USUARIOS
  public function grid_user()
  {
    $usuario = Session::get('usuario');
    $lista_user = DB::select('select * from res_usuarios');
    return view('grid/grid_usuarios',[ 'nome_usuario' => $usuario, 'lista_usuarios' => $lista_user ]);
  }

}
