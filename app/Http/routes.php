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

Route::post('geralogin', ['as' => 'geralogin', 'uses' => 'geraLogin@userLogin']);

Route::get('home', function()
{
  $usuario = Session::get('usuario');
  return View('paginas/home', [ 'nome_usuario' => $usuario ]);
});

Route::get('cadastrar-usuarios', ['as' => 'cadastrar-usuarios', 'uses' => 'gridUsuarios@form_cadastro']);
