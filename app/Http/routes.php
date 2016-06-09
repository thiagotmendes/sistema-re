<?php
/* ARUIVO PARA EXECUÇÃO DE ROTAS */
###################################################################################################################
// CAMINHO PARA O FORMULÁRIO DE LOGIN
Route::get('/', function () {
    return view('forms/login');
});

//  LOGA NO SISTEMA
Route::post('geralogin', ['as' => 'geralogin', 'uses' => 'geraLogin@userLogin']);
// DESLOGA DO SISTEMA
route::get('deslogar', ['as' => 'deslogar', 'uses' => 'geraLogin@desloga_sistema']);

// direciona para home enviando a sessão
Route::get('home', function()
{
  $usuario = Session::get('usuario');
  if ($usuario) {
    return View('paginas/home', [ 'nome_usuario' => $usuario ]);
  } else {
    return redirect('/');
  }
});

// ROTA PARA O FORMULARIO DE CADASTRO DE USUARIOS
Route::get('cadastrar-usuarios', ['as' => 'cadastrar-usuarios', 'uses' => 'gridUsuarios@form_cadastro']);

// rota para o cadastro de USUARIOS
Route::post('cadastrar-usuarios/executa-cadastro', ['as' => 'cadastrar-usuarios/executa-cadastro', 'uses' => 'gridUsuarios@postForm']);
Route::get('cadastrar-usuarios/{ok?}',['as' => 'cadastrar-usuarios/{ok?}', 'uses' => 'gridUsuarios@form_cadastro']);
Route::get('editar-usuarios/{id?}',['as' => 'editar-usuarios/{id?}', 'uses' => 'gridUsuarios@form_edita_user']);

// ROTA PARA O GRID DE USUARIOS
Route::get('lista-usuarios', ['as' => 'lista-usuarios', 'uses' => 'gridUsuarios@grid_user']);

// EXECUTA O FORM PARA ANEXO DE ARQUIVOS
Route::get('procedimento/{id}',['as' => 'procedimento/{id}', 'uses' => 'acompanhamentoUsuarios@processo_usuario']);

Route::post('anexa-arquivo', ['as' => 'anexa-arquivo', 'uses' => 'acompanhamentoUsuarios@anexaArquivo']);
