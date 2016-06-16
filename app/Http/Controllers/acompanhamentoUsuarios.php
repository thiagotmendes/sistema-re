<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// ADDONS PARA FUNCIONAMENTO COMPLETO DO SISTEMA
use Session;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Input;

class acompanhamentoUsuarios extends Controller
{
  // DIRECIONA PARA A TELA COM DADOS DO USUÁRIO
  public function processo_usuario($id)
  {
    $usuario = Session::get('usuario');
    $tipo_usuario = Session::get('tipoUsuario');
    $dados_user = DB::select('select * from res_anexousuario where idusuario = :idusuario order by created_at', ['idusuario' => $id]);
    return view('forms/form-anexo',[ 'nome_usuario' => $usuario, 'tipoUsuario' => $tipo_usuario, 'id' => $id, 'grid_interacoes' => $dados_user ]);
  }

  // CRIA O METODO PARA CRIAR OS PROCESSOS E ANEXAR ARQUIVOS
  public function anexaArquivo(Request $formAnexa)
  {
    $idusuario    = $formAnexa->idusuario;
    $assunto      = $formAnexa->assunto;
    $observacoes  = $formAnexa->observacoes;
    $arquivo      = $formAnexa->arquivo;

    $data_interacao = date('d-m-Y');
    // cria o caminho para o upload do arquivo
    $destinationPath = public_path() . '/arquivos/';
    // captura a extensão do arquivo
    $extension = Input::file('arquivo')->getClientOriginalExtension();
    // cria um nome para o arquivo
    $filename = 'arq-'. $data_interacao."-". rand(1111,9999) .".". $extension;

    $extencao = array('doc','pdf','txt','docx','xls','xlsx');
    if(in_array($extension,$extencao)):
      // realiza o upload do arquivo
      Input::file('arquivo')->move($destinationPath, $filename);
      // insere os dados do acompanhamento no banco de dados
      if ($formAnexa->_token) {
        DB::table('anexousuario')->insert(
          [
            'idusuario'     => $idusuario,
            'assunto'       => $assunto,
            'observacao'    => $observacoes,
            'patchArquivo'  => "/arquivos/".$filename,
            'created_at'    =>  DB::raw('now()')
          ]
        );
      }
      return redirect()->route('procedimento/{id}',['id' => $idusuario ]);
    else:
      return redirect('procedimento/'.$idusuario."?msg=anexerro");
    endif;
  }

  // cria o metodo que direciona para a área do cliente
  public function areaCliente()
  {
    $usuario = Session::get('usuario');
    $tipo_usuario = Session::get('tipoUsuario');

    if ($usuario) {
      $dados_user = DB::table('anexousuario')
                    ->join('usuarios', 'anexousuario.idusuario','=','usuarios.idusuario')
                    ->where('usuario','=',$usuario['nome'])
                    ->orderby('idanexoUsuario','desc')
                    ->get();
      return View('paginas/dashUsuario', [ 'nome_usuario' => $usuario, 'tipoUsuario' => $tipo_usuario, 'acompanhamentoUser' => $dados_user]);
    } else {
      return redirect('/');
    }
  }

  public function excluiArquivo($id)
  {
    DB::table('anexousuario')->where('idanexoUsuario', '=', $id)->delete();

  }

}
