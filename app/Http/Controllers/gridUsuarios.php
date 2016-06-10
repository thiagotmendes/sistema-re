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
    $tipo_usuario = Session::get('tipoUsuario');
    return view('forms/cadastro-user',[ 'nome_usuario' => $usuario,'tipoUsuario' => $tipo_usuario ]);
  }
  //REALIZA O CADASTRO DOS USUARIOS VIA POST COM BULD->INSERT
  public function postForm(Request $formUsuario)
  {
    $nome         = $formUsuario->nome;
    $email        = $formUsuario->email;
    $empresa      = $formUsuario->empresa;
    $telefone     = $formUsuario->telefone;
    $usuario      = $formUsuario->usuario;
    $tipoUsuario  = $formUsuario->tipoUsuario;
    $senha        = $formUsuario->senha;
    if ($formUsuario->_token) {
      DB::table('usuarios')->insert(
        [
          'nome'        => $nome,
          'email'       => $email,
          'empresa'     => $email,
          'telefone'    => $telefone,
          'usuario'     => $usuario,
          'senha'       => $senha,
          'tipoUsuario' => $tipoUsuario,
          'created_at'  =>  DB::raw('now()')
        ]
      );
      // FAZ O REDIRECIONAMENTO PARA O FORMULARIO PASSANDO O PARAMETRO MSG PARA SUCESSO
      return redirect()->route('cadastrar-usuarios',['msg' => 1]);
    }
  }
  // gera o formulario de edição de usuário
  public function form_edita_user($id)
  {
    $usuario = Session::get('usuario');
    $tipo_usuario = Session::get('tipoUsuario');
    $dados_user = DB::select('select * from res_usuarios where idusuario = :idusuario and tipoUsuario <> 2 order by created_at desc', ['idusuario' => $id]);
    //var_dump($dados_user);

    return view('forms/cadastro-user',[ 'nome_usuario' => $usuario,'tipoUsuario' => $tipo_usuario, 'dados_user' => $dados_user ]);
  }


  // GERA O GRID COM ALISTA DOS USUARIOS
  public function grid_user()
  {
    $usuario = Session::get('usuario');
    $tipo_usuario = Session::get('tipoUsuario');
    $lista_user = DB::select('select * from res_usuarios');
    return view('grid/grid_usuarios',[ 'nome_usuario' => $usuario, 'tipoUsuario' => $tipo_usuario, 'lista_usuarios' => $lista_user ]);
  }

}
