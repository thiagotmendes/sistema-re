@extends('layout.master')

@section('title', 'Cadastro de Usuários')
@section('container')
  <div class="formulario-class">
    <form class="" action="<?= route('cadastrar-usuarios/executa-cadastro') ?>" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="">
            <?= csrf_field(); ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" class="form-control" id="empresa" placeholder="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="">
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-6">
            <div class="form-group">
              <label for="usuario">Usuário</label>
              <input type="text" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="text" name="senha" class="form-control" id="" placeholder="">
            </div>
          </div>
        </div>
      </div>

      <button type="subimit" name="button">Salvar</button>

    </form>
  </div>
@endsection
