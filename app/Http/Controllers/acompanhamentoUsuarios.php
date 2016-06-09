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
  public function processo_usuario($id)
  {
    $usuario = Session::get('usuario');
    $dados_user = DB::select('select * from res_anexousuario where idusuario = :idusuario', ['idusuario' => $id]);

    return view('forms/form-anexo',[ 'nome_usuario' => $usuario, 'id' => $id, 'grid_interacoes' => $dados_user ]);
  }

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
    // realiza o upload do arquivo
    Input::file('arquivo')->move($destinationPath, $filename);
    // insere os dados do acompanhamento no banco de dados
    if ($formAnexa->_token) {
      DB::table('anexousuario')->insert(
        [
          'idusuario'   => $idusuario,
          'assunto'     => $assunto,
          'observacao'  => $observacoes,
          'patchArquivo'       => $destinationPath.$filename,
          'created_at'  =>  DB::raw('now()')
        ]
      );
    }
    return redirect()->route('procedimento/{id}',['id' => $idusuario ]);
  }
}
