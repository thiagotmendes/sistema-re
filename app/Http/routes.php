<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*Route::get('/', function () {
    return view('welcome');
});*/

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
    return View('/', [ 'erro' => 'Impossivel logar' ]);
  }
});

// ROTA PARA O FORMULARIO DE CADASTRO DE USUARIOS
Route::get('cadastrar-usuarios', ['as' => 'cadastrar-usuarios', 'uses' => 'gridUsuarios@form_cadastro']);

// rota para o cadastro de USUARIOS
Route::post('cadastrar-usuarios/executa-cadastro', ['as' => 'cadastrar-usuarios/executa-cadastro', 'uses' => 'gridUsuarios@postForm']);
Route::get('cadastrar-usuarios/{ok?}',['as' => 'cadastrar-usuarios/{ok?}', 'uses' => 'gridUsuarios@form_cadastro']);

Route::get('lista-usuarios', ['as' => 'lista-usuarios', 'uses' => 'gridUsuarios@grid_user']);
