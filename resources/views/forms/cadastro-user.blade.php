@extends('layout.master')

@section('title', 'Cadastro de Usuários')
@section('container')
  <div class="formulario-class">
    <?php if (isset($_GET['msg'])): ?>
      <div class="alert alert-success">
        Usuário cadastrado com sucesso.
      </div>
    <?php endif; ?>
    <form class="" action="<?= route('cadastrar-usuarios/executa-cadastro') ?>" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" value=" @if(!empty($dados_user[0])) {{ $dados_user[0]->nome }} @endif " placeholder="">
            <?= csrf_field(); ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value=" @if(!empty($dados_user[0])) {{ $dados_user[0]->email }} @endif " placeholder="">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" class="form-control" id="empresa" value=" @if(!empty($dados_user[0])) {{ $dados_user[0]->empresa }} @endif " placeholder="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" value=" @if(!empty($dados_user[0])) {{ $dados_user[0]->telefone }} @endif " placeholder="">
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-6">
            <div class="form-group">
              <label for="usuario">Usuário</label>
              <input type="text" name="usuario" class="form-control" id="" value=" @if(!empty($dados_user[0])) {{ $dados_user[0]->usuario }} @endif " placeholder="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="text" name="senha" class="form-control" id="" value=" @if(!empty($dados_user[0])) {{ $dados_user[0]->senha }} @endif " placeholder="">
            </div>
          </div>
        </div>
      </div>

      <button type="subimit" name="button" class="btn btn-info">Salvar</button>

    </form>
  </div>
@endsection
